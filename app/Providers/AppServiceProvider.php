<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Topic;
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
        View::composer(['backend.app', 'frontend.app', 'dashboard'], function ($view) {
            // Retrieve all data
            $categories = Category::all();
            foreach ($categories as $category) {
                $category->posts_count = Post::where('category_id', $category->id)->count();
            }

            $topics = Topic::all();
            foreach ($topics as $topic) {
                $topic->posts_count = Post::where('topic_id', $topic->id)->count();
            }

            $frameworks = Framework::all();
            foreach ($frameworks as $framework) {
                $framework->posts_count = Post::where('framework_id', $framework->id)->count();
            }

            $structers = Structer::all();
            foreach ($structers as $structer) {
                $structer->posts_count = Post::where('structer_id', $structer->id)->count();
            }

            $posts = Post::latest()->get();

            // Pass data to views
            $view->with([
                'categories' => $categories,
                'topics' => $topics,
                'frameworks' => $frameworks,
                'structers' => $structers,
                'posts' => $posts,
            ]);
        });
    }
}
