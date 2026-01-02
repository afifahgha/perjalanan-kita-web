<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('front.home.index',[
            'latest_post' => Article::with(['User', 'Category'])->latest()->first(),
            'articles' => Article::with(['User', 'Category'])->latest()->paginate(6),
        ]);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function about()
    {
        return view('home');
    }
}
