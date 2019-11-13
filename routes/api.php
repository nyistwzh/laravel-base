<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

use Dingo\Api\Routing\Router;

$api = app(Router::class);

/** @var Router $api */
$api->version('v1', [
    'prefix' => 'api',
    'namespace' => 'App\Http\Controllers\Api',
    'middleware' => ['interface.style']
], function (Router $api) {
    $api->get('/', function(){
        return view('welcome');
    })->name('home'); // 主页
    $api->post('login', 'AuthController@login')->name('login'); // 登录
    $api->get('register-sms', 'AuthController@registerSms')->name('register-sms'); // 注册短信
    $api->post('register', 'AuthController@register')->name('register'); // 注册
    /**
     * 鉴权访问
     */
    $api->group(['middleware' => ['api.auth']], function(Router $api) {
        /**
         * 鉴权相关
         */
        $api->delete('logout', 'AuthController@logout')->name('logout'); // 退出登录
        $api->put('refresh', 'AuthController@refresh')->name('refresh'); // 刷新令牌
        $api->get('me', 'AuthController@me')->name('me'); // 用户信息
    });
});
