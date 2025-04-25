<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Language;
use App\Models\Framework;
use App\Models\Structer;
use App\Models\Post;
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
            // Retrieve all data
            $categories = Category::all();
            $languages = Language::all();
            $frameworks = Framework::all();
            $structers  = Structer::all();
            $posts      = Post::latest()->take(5)->get();

            // Pass data to views
            $view->with('categories', $categories)
                 ->with('languages', $languages)
                 ->with('frameworks', $frameworks)
                 ->with('structers', $structers)
                 ->with('posts', $posts) 
                 ->with('categorySlugs', $categories->pluck('slug'))
                 ->with('languageSlugs', $languages->pluck('slug'))
                 ->with('frameworkSlugs', $frameworks->pluck('slug'))
                 ->with('structerSlugs', $structers->pluck('slug'))
                 ->with('postSlugs', $posts->pluck('slug'));
        });
    }
}
