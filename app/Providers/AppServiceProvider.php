<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Language;
use App\Models\Framework;
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
            // Retrieve categories, languages, frameworks, and their slugs
            $categories = Category::all();
            $languages = Language::all();
            $frameworks = Framework::all();

            // Pass all data along with slugs to the view
            $view->with('categories', $categories)
                 ->with('languages', $languages)
                 ->with('frameworks', $frameworks)
                 ->with('categorySlugs', $categories->pluck('slug')) // Pass category slugs
                 ->with('languageSlugs', $languages->pluck('slug')) // Pass language slugs
                 ->with('frameworkSlugs', $frameworks->pluck('slug')); // Pass framework slugs
        });
    }
}
