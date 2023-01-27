<?php

namespace App\Providers;

use App\Models\CourseType;
use Illuminate\Contracts\View\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('layouts.app', function ($view) {
            $courseTypes = CourseType::all();
            $view->with('courseTypes', $courseTypes);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
