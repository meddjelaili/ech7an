<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardType extends Model
{
    use HasFactory;

    protected $fillable = [
        'card_id',
        'type',
        'price',
        'merchant_price',
        'card_id',
        'status'
    ];    

    public function card()
    {
        return $this->belongsTo(Card::class);
    }

    public function codes()
    {
        return $this->hasMany(Code::class, 'cardType_id')->where('bought', 0) ;
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'cardType_id');
    }
}
