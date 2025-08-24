<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Nama tabel (opsional kalau pakai default plural 'categories')
    protected $table = 'categories';

    // Kolom yang bisa diisi mass-assignment
    protected $fillable = [
        'name',
        'description',
    ];

    // Relasi: satu kategori punya banyak game
    public function games()
    {
        return $this->hasMany(Game::class, 'category_id', 'id');
    }
}
