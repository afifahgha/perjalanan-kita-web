<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;


class DashboardController extends Controller
{
    public function index()
    {
        return view('back.dashboard.index',[
            'total_articles' => Article::count(),
            'total_categories' => Category::count(),
            'latest_article' => Article::with('category')->latest()->take(3)->get(),
            'popular_article' => Article::with('category')->orderBy('views', 'desc')->take(3)->get()
        ]);
    }
}
