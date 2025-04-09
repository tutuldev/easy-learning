<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Framework;
use App\Models\Language;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(['backend.app', 'frontend.app'], function ($view) {
            $view->with('categories', Category::all())
                 ->with('languages', Language::all())
                 ->with('frameworks', Framework::all());
        });


    }
}
