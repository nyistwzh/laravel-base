<?php

/*
 * What php team is that is 'one thing, a team, work together'
 */

namespace App\Providers;

use App\Models\AwardInfo;
use App\Models\EducationalInfo;
use App\Models\File;
use App\Models\JobInfo;
use App\Models\User;
use App\Observers\AwardInfoObserver;
use App\Observers\EducationalInfoObserver;
use App\Observers\FileObserver;
use App\Observers\JobInfoObserver;
use App\Observers\UserObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // 注册校验方法
        Validator::extend('mobile', '\App\Rules\Mobile@passes');
        Validator::extend('local_image', '\App\Rules\LocalImage@passes');
        Validator::extend('id_number', '\App\Rules\IdNumber@passes');
        // 注册观察器
        File::observe(FileObserver::class);
        User::observe(UserObserver::class);
    }
}
