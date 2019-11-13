<?php

/*
 * What php team is that is 'one thing, a team, work together'
 */

namespace App\Exceptions;

use Dingo\Api\Exception\ResourceException;
use Dingo\Api\Exception\ValidationHttpException;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\UnauthorizedException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * @desc
     *
     * @param Exception $exception
     *
     * @return mixed|void
     *
     * @throws Exception
     */
    public function report(Exception $exception)
    {
//        dd($exception);
        if (!app()->isLocal() && !isset($GLOBALS['error'])) {
            logger()->error('handler error as follows：');
            logger()->error($exception);
            $GLOBALS['error'] = 1;
            // 验证规则不通过
            if ($exception instanceof ValidationException) {
                $GLOBALS['error_handle'] = $this->_responseResourceError(['message' => current($exception->errors())[0], 'errors' => $exception->errors()]);
            } elseif ($exception instanceof ValidationHttpException || $exception instanceof ResourceException) {
                // 验证规则不通过
                $GLOBALS['error_handle'] = $this->_responseResourceError(['message' => $exception->getErrors()->first(), 'errors' => $exception->getErrors()]);
            } elseif ($exception instanceof UnauthorizedException) {
                // 权限不足
                $GLOBALS['error_handle'] = $this->_responseHttpError(['status_code' => 403, 'message' => trans('system.authentication_failure')]);
            } elseif ($exception instanceof UnauthorizedHttpException) {
                // 授权失败
                $GLOBALS['error_handle'] = $this->_responseHttpError(['status_code' => 401, 'message' => trans('system.unauthenticated')]);
            } elseif ($exception instanceof NotFoundHttpException) {
                // 请求方法不存在
                throw new HttpException('404', trans('system.route_not_exists'));
            } elseif ($exception instanceof MethodNotAllowedHttpException) {
                // 请求方法不存在
                throw new HttpException('405', trans('system.route_method_not_exists'));
            } elseif ($exception instanceof ModelNotFoundException) {
                // 查询数据不存在
                $GLOBALS['error_handle'] = $this->_responseHttpError(['status_code' => 404, trans('system.data_error')]);
            } elseif ($exception instanceof \PDOException) {
                // 数据库连接失败
                $GLOBALS['error_handle'] = $this->_responseHttpError(['status_code' => 500, 'message' => trans('system.database_error')]);
            } elseif ($exception instanceof CustomException) {
                // 抛出自定义错误
                $GLOBALS['error_handle'] = $this->_responseHttpError(['status_code' => $this->_getErrorCode($exception), 'message' => $exception->getMessage()]);
            } else {
                // 捕获其它错误 $exception instanceof HttpException || $exception instanceof Exception
                $GLOBALS['error_handle'] = $this->_responseHttpError(['status_code' => 500, 'message' => trans('system.internal_error')]);
            }
        }
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Exception               $exception
     *
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        return parent::render($request, $exception);
    }

    /**
     * @desc
     *
     * @param $exception
     *
     * @return int
     */
    private function _getErrorCode($exception)
    {
        try {
            $errorCode = $exception->getCode();
        } catch (\Exception $e) {
            $errorCode = $exception->getCode();
        }
        if ($errorCode >= 600 || $errorCode <= 0) {
            $errorCode = 500;
        }

        return $errorCode;
    }

    /**
     * @desc 返回校验错误
     *
     * @param $data
     *
     * @return \Illuminate\Http\JsonResponse
     */
    private function _responseResourceError($data)
    {
        if ('java' == config('back-system.interface_style')) {
            $data['status_code'] = 422;

            return $data;
        }

        throw new ResourceException($data['message'], $data['errors']);
    }

    /**
     * @desc 返回Http错误
     *
     * @param $data
     *
     * @return \Illuminate\Http\JsonResponse
     */
    private function _responseHttpError($data)
    {
        if ('java' == config('back-system.interface_style')) {
            return $data;
        }

        throw new HttpException($data['status_code'], $data['message']);
    }
}
