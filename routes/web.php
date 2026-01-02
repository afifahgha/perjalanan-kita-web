<?php

// Import semua kontroller yang digunakan
use App\Models\Article;
use App\Models\Category;
// Kontroller untuk bagian Backend
use App\Http\Controllers\Back\CategoryController;
use App\Http\Controllers\Back\ArticleController;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Back\UsersController;
// Kontroller untuk bagian frontend
use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\front\ArticleController as FrontArticleController;
use App\Http\Controllers\Front\CategoryController as FrontCategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Route untuk halaman utama blog
Route::get('/', [HomeController::class, 'index']);
// Route untuk halaman about
Route::get('/about', [HomeController::class, 'about']);
// Route untuk menampilkan detail artikel
Route::get('/post/{slug}', [FrontArticleController::class, 'show']);
// Route untuk mencari artikel di kategori tertentu
Route::get('/post/{slug}', [FrontArticleController::class, 'show'])->name('post.show');
// Menampilkan semua kategori
Route::get('/articles', [FrontArticleController::class, 'index']);
// Route untuk mencari artikel
Route::post('article/search', [FrontArticleController::class, 'index'])->name('article.search');
// Route untuk menampilkan artikel berdasarkan kategori
Route::get('category/{slug}', [FrontCategoryController::class, 'index']);
// Route untuk mencari kategori
Route::post('category/search', [FrontCategoryController::class, 'search'])->name('category.search');

// Semua route di dalam grup ini memerlukan autentikasi/login terlebih dahulu
Route::middleware('auth')->group(function(){
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // Article
    Route::resource('article', ArticleController::class);

    // Category
    Route::resource('/categories', CategoryController::class)->only([
        'index',
        'store',
        'update',
        'destroy'
    ])->middleware('UserAccess:1'); 
    // Hanya user dengan role 1 (admin) yang bisa mengakses route categories

    // Users
    Route::resource('/users', UsersController::class);
});

Auth::routes();