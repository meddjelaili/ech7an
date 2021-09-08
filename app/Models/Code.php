<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    use HasFactory;

    protected $fillable = [
        'cardType_id',
        'code',
        'cardType_id',
        'order_id',
        'bought',
        'serial_number'
    ];    

    public function cardType()
    {
        return $this->belongsTo(CardType::class, 'cardType_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
