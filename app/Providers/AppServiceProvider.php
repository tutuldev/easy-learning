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
        View::composer(['backend.app', 'frontend.app','dashboard'], function ($view) {
            // Retrieve all data
            $categories = Category::all();
            foreach ($categories as $category) {
                $category->posts_count = Post::where('category', $category->name)->count();
            }

            $languages = Language::all();
            foreach ($languages as $language) {
                $language->posts_count = Post::where('language', $language->name)->count();
            }

            $frameworks = Framework::all();
            foreach ($frameworks as $framework) {
                $framework->posts_count = Post::where('framework', $framework->name)->count();
            }

            $structers = Structer::all();
            foreach ($structers as $structer) {
                $structer->posts_count = Post::where('structer', $structer->name)->count();
            }

            $posts = Post::latest()->take(5)->get();

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
