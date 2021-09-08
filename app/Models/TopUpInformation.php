<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopUpInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'topUp_id',
        'name',
        'placeholder',
    ] ;
    
    public function topUp()
    {
        return $this->belongsTo(TopUp::class, 'topUp_id');
    }
}
