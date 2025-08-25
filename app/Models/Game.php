<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    // Kolom yang bisa diisi massal
    protected $fillable = [
        'category_id',
        'name',
        'image', // 👈 tambahkan kolom image
    ];

    /**
     * Relasi ke kategori
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Relasi ke jenis top up
     */
    public function topupTypes()
    {
        return $this->hasMany(\App\Models\TopupType::class);
    }
}

