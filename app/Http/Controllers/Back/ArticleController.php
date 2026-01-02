<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;


class ArticleController extends Controller
{
    public function index()
    {
        // Jika ada request dari Datatables
        if (request()->ajax()) {
            // Tampilkan semua artikel + relasi kategorinya, dan urutkan dari yang terbaru
            if(auth()->user()->role == 1){
                // Jika admin, tampilkan semua artikel
                $article = Article::with('Category', 'User')->latest()->get();
            } else {
                // Jika user biasa, tampilkan hanya artikel yang dia buat
                $article = Article::with('Category', 'User')
                    ->where('user_id', auth()->user()->id)
                    ->latest()
                    ->get();
            }
            return DataTables::of($article)
                // Custom Kolom
                ->addIndexColumn() 
                // Custom kolom kategori, ambil nama kategorinya
                ->addColumn('category_id', function ($article) {
                    return $article->category->name;
                })
                // Custom kolom author, ambil nama authornya
                ->addColumn('author', function ($article) {
                    return $article->user->name;
                })
                // Kolom untuk tombol action
                ->addColumn('button', function ($article) {
                    return '<div class="text-center">
                                    <td>
                                        <a href="article/' . $article->id . '" class="btn btn-secondary">Detail</a>
                                        <a href="article/' . $article->id . '/edit" class="btn btn-primary">Edit</a>
                                        <a href="#" onclick="deleteArticle(this)" data-id="' . $article->id . '" class="btn btn-danger">Delete</a>
                                    </td>
                                </div>';
                })

                // Panggil Custom Kolom
                ->rawColumns(['category_id','author', 'button'])
                ->make();
        }
        // Jika request bukan dari Datatables, tampilkan view
        return view('back.article.index');
    }
    public function create()
    {
        // Menampilkan form dari create article
        return view('back.article.create', [
            // Mengambil data ketegori dari database
            'categories' => Category::get()
        ]);
    }

    public function store(ArticleRequest $request)
    {
        // Tampilkan data yang divalidasi di request
        $data = $request->validated();
        // User input gambar
        $file = $request->file('image'); 
        // Diambil extension nya (.jpg,.png.jpeg)
        $filename = Str::slug($data['name']) . '-' . time() . '.' . $file->getClientOriginalExtension();
        // Masuk ke folder public/back/nama filenya, dan ekstensi aslinya
        $file->storeAs('public/back', $filename);

        // ID user diambil untuk menampilkan penulis
        $data['user_id'] = auth()->user()->id;
        // Nama file gambar disimpan ke database
        $data['image'] = $filename;
        // Membuat slug otomatis dari judul/nama artikel
        $data['slug'] = Str::slug($data['name']);
        // Menyimpan data artikel ke database
        Article::create($data);

        // Setelah berhasi submit, ada pesan success
        return redirect(url('article'))->with('success', 'Article Created Successfully');
    }

    public function show(string $id)
    {
        // Tampilkan artikel dari database, dan tampilkan penulis dan kategorinya
        return view('back.article.show',[
            'article' => Article::with(['User', 'Category'])->find($id)
        ]);
    }

    public function edit(string $id)
    {
        // Tampilkan form untuk edit artikel
        return view('back.article.update', [
            // Ambil data artikel dari database sesuai ID
            'article' => Article::find($id),
            // Ambil semua aktegori dari datebase
            'categories' => Category::get()
        ]);
    }

    public function update(UpdateArticleRequest $request, string $id)
    {
        // Tampilkan data yang divalidasi di request
        $data = $request->validated();

        // Jika update gambar baru
        if ($request->hasFile('image')) {
            // User input gambar
            $file = $request->file('image'); 
            // Diambil extension nya (.jpg,.png.jpeg)
            $filename = Str::slug($data['name']) . '-' . time() . '.' . $file->getClientOriginalExtension();
            // Masuk ke folder public/back/nama filenya, dan ekstensi aslinya
            $file->storeAs('public/back/', $filename);

            // Hapus gambar lama
            Storage::delete('public/back/'.$request->old_image);
            // Gunakan gambar baru
            $data['image'] = $filename;
        } else {
            // Jika tidak input gambar baru, gunakan gambar lama
            $data['image'] = $request->old_image;
        }

        // User yang melakukan update di simpan id nya
        $data['user_id'] = auth()->user()->id; 
        // Update slug artikel
        $data['slug'] = Str::slug($data['name']);
        // Update data artikel
        Article::find($id)->update($data);

        // Jika berhasil update, akan ada pesan success
        return redirect(url('article'))->with('success', 'Article Updated Successfully');
    }

    public function destroy(string $id)
    {
        // Cari artikel berdasarkan ID nya
        $data = Article::find($id);
        // Hapus gambar dari storage
        Storage::delete('public/back/'.$data->image);
        // Hapus artikel dari Database
        $data->delete();

        // Respon pesan berhasil di hapus
        return response()->json([
            'message' => 'Article Deleted Successfully'
        ]);
    }
}