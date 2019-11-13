<?php

/*
 * What php team is that is 'one thing, a team, work together'
 */

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use L5Swagger\Generator;
use Parsedown;

class DocController extends Controller
{
    protected $parseDown;

    protected $markdownFile;

    public function __construct(Parsedown $parseDown)
    {
        $this->parseDown    = $parseDown;
        $this->markdownFile = config('l5-swagger.paths.markdown') . DIRECTORY_SEPARATOR . config('l5-swagger.paths.docs_md');
    }

    /**
     * html接口文档
     * 生成html接口文档并返回视图显示.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * @throws \App\Exceptions\CustomException
     *
     * @author 王志豪
     */
    public function doc()
    {
        if ((config('l5-swagger.generate_always') || !file_exists($this->markdownFile)) && app()->isLocal()) {
            try {
                Generator::generateDocs();
                Artisan::call('swagger:markdown');
            } catch (\Exception $e) {
                abort(404, 'Cannot find ' . $this->markdownFile . ' and cannot be generated.');
            }
        }
        if (file_exists($this->markdownFile)) {
            $markdown = File::get($this->markdownFile);
            $content  = $this->parseDown->setBreaksEnabled(true)->text($markdown);

            return view('vendor.markdown.index', compact('content'));
        }
        customError('markdown 文档不存在');
    }

    /**
     * 下载Markdown接口文件
     * 下载markdown接口文件.
     *
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     *
     * @throws \App\Exceptions\CustomException
     *
     * @author 王志豪
     */
    public function md()
    {
        $markdownFile = config('l5-swagger.paths.markdown') . DIRECTORY_SEPARATOR . config('l5-swagger.paths.docs_md');
        if (file_exists($markdownFile)) {
            return response()->streamDownload(function () use ($markdownFile) {
                echo File::get($markdownFile);
            }, config('app.name') . '接口文档.md');
        } else {
            customError('markdown文档文件不存在');
        }
    }

    /**
     * 下载Postman接口文件
     * 下载Postman接口文件.
     *
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     *
     * @throws \App\Exceptions\CustomException
     *
     * @author 王志豪
     */
    public function postman()
    {
        $markdownFile = config('l5-swagger.paths.postman') . DIRECTORY_SEPARATOR . config('l5-swagger.paths.docs_postman');
        if (file_exists($markdownFile)) {
            return response()->streamDownload(function () use ($markdownFile) {
                echo File::get($markdownFile);
            }, config('app.name') . 'postman API接口文件.json');
        } else {
            customError('postman API接口文件不存在');
        }
    }
}
