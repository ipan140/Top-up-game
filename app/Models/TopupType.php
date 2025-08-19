<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TopupType extends Model
{
    protected $fillable = ['game_id', 'name', 'price_per_unit'];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function transactions()
    {
        return $this->hasMany(TopupTransaction::class);
    }
}

