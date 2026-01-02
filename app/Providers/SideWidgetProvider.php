<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Article;

class SideWidgetProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('front.layout.sidewidget', function($view){
            $category = Category::latest()->get();

            $view->with('categories', $category);
        });

        View::composer('front.layout.sidewidget', function($view){
            $posts = Article::orderBy('views', 'desc')->take(5)->get();

            $view->with('popular_post', $posts);
        });
    }
}
