<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopUpAmount extends Model
{
    use HasFactory;

    protected $fillable = [
        'topUp_id',
        'amount',
        'price',
        'merchant_price',
        'status',
        'stock'
    ] ;
    
    public function topUp()
    {
        return $this->belongsTo(TopUp::class, 'topUp_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'topUpAmount_id');
    }
}
