<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'category_id', 'name', 'slug', 'desc', 'image', 'views', 'status', 'publish_date'];

    // Relasi ke User
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Categories
    public function Category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // File gambar otomatis terhapus di storage saat artikel di hapus
    protected static function booted()
    {
        static::deleting(function ($article) {
            if ($article->image) {
                Storage::delete('public/back/' . $article->image);
            }
        });
    }
}
