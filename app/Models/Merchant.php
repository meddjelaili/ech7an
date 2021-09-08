<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'phone',
        'nationality',
        'country',
        'city',
        'adress',
        'website',
        'active',
        'user_id'
    ];    



    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
