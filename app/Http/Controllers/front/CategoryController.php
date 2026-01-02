<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   public function index($slug){
        $category = Category::where('slug', $slug)->firstOrFail();

        $articles = Article::with('category')
            ->where('category_id', $category->id)
            ->latest()
            ->simplePaginate(6);

        return view('front.category.index', [
            'articles' => $articles,
            'category' => $category,
            'keyword' => null,
        ]);
    }
    public function search(Request $request){

        $keyword = request()->keyword;

        $slugCategory = $request->category_slug;

        $category = Category::where('slug', $slugCategory)->firstOrFail();

        $articles = Article::with('category')
            ->where('category_id', $category->id)
            ->where('name', 'like', "%$keyword%")
            ->latest()
            ->simplePaginate(6);

        return view('front.category.index', [
            'articles' => $articles,
            'category' => $category,
            'keyword' => $keyword
        ]);
    }
}
