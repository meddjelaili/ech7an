<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'topUp_id',
        'card_id',
        'discount',
        'coupon'
    ] ;

    public function topUp()
    {
        return $this->belongsTo(TopUp::class , 'topUp_id');
    }

    public function card()
    {
        return $this->belongsTo(Card::class , 'card_id');
    }
}
