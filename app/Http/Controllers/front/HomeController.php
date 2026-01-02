<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        // ambil artikel terbaru
        $latest_post = Article::with('category')->latest()->first();
        
        return view('front.home.index',[
            'latest_post' => $latest_post,
            'articles' => Article::with('category')
            ->where('id', '!=', $latest_post->id)
            ->orderBy('created_at', 'desc')
            ->simplePaginate(6),
            'categories' => Category::latest()->get()
        ]);
    }

    public function about(){
        return view('front.home.about', [
            'categories' => Category::latest()->get()
        ]);
    }
}