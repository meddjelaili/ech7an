<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'topUpAmount_id',
        'cardType_id',
        'email',
        'payment_id',
        'payment_method',
        'price',
        'coupon',
        'currency',
        'quantity',
        'img',
        'pdf',
        'payment_status',
        'status',
    ] ;


    public function orderDetails()
    {
        return $this->hasMany(OrderDetails::class);
    }


    public function topUpAmount()
    {
        return $this->belongsTo(TopUpAmount::class , 'topUpAmount_id');
    }

    public function cardType()
    {
        return $this->belongsTo(CardType::class , 'cardType_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class , 'email');
    }

    public function codes()
    {
        return $this->hasMany(Code::class, 'order_id')->where('bought', '1');
    }

    public function card()
    {
        return $this->cardType->card;
    }

    public function topUp()
    {
        return $this->topUpAmount->topUp;
    }
    
}
