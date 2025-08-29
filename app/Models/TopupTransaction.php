<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopupTransaction extends Model
{
    use HasFactory;

    protected $table = 'topup_transactions';

    protected $fillable = [
        'order_id',
        'topup_type_id',
        'user_id',
        'server_id',
        'game_user_id',
        'email',
        'gross_amount',
        'quantity',
        'status',
        'payment_type',
        'snap_token',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function topupType()
    {
        return $this->belongsTo(TopupType::class);
    }
}
