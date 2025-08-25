<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TopupType extends Model
{
    // Nama tabel
    protected $table = 'topup_types';

    // Kolom yang boleh diisi
    protected $fillable = [
        'game_id',
        'name',
        'price_per_unit'
    ];

    // Relasi ke Game
    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    // Relasi ke Transaksi
    public function transactions()
    {
        return $this->hasMany(TopupTransaction::class);
    }
}
