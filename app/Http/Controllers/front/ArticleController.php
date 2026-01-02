<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(){

        $keyword = request()->keyword;

        if ($keyword) {
            $articles = Article::with('category')
            ->where('name', 'like', "%$keyword%")
            ->orderBy('created_at', 'desc')
            ->simplePaginate(6);
        } else {
            $articles = Article::with('category')
            ->orderBy('created_at', 'desc') 
            ->simplePaginate(6);
        }
        
        return view('front.article.index',[
            'articles' => $articles,
            'keyword' => $keyword
        ]);
    }

    public function show($slug){
        $article = Article::whereSlug($slug)->firstorFail();
        $article->increment('views');

        return view('front.article.show',[
            'article' => $article,
            'categories' => Category::latest()->get()
        ]);
    }
}
