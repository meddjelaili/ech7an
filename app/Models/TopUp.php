<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class TopUp extends Model implements Searchable
{
    use HasFactory;
    use Sluggable;

   

    protected $fillable = [
        'slug',
        'title_en',
        'title_ar',
        'region_en',
        'region_ar',
        'note_en',
        'note_ar',
        'instruction_en',
        'instruction_ar',
        'cover_image',
        'popular',
        'status'
    ];    

    public function topUpAmounts()
    {
        return $this->hasMany(TopUpAmount::class, 'topUp_id');
    }
    public function topUpInformations()
    {
        return $this->hasMany(TopUpInformation::class, 'topUp_id');
    }


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getSearchResult(): SearchResult
    {
       $url = route('buy.topup', $this->slug);
      
    
        return new \Spatie\Searchable\SearchResult(
           $this,
           $this->cover_image,
           $url,
        
        );
    }

    ############################# scopes ##########################

    public function scopeShow($query ,$slug ,$lang)
    {
       return  $query->where(
                [
                    'slug' => $slug,
                    'status' => 0
                ])
                ->select(
                    'id',
                    'slug',
                    'title_'.$lang.' as title',
                    'region_'.$lang.' as region',
                    'note_'.$lang.' as note',
                    'instruction_'.$lang.' as instruction',
                    'cover_image',
                );
    }

    public function scopePopular($query, $lang)
    {
       return  $query->where([
                    'popular' => 1,
                    'status' => 0
                ])
                ->select(
                    'slug',
                    'title_'.$lang.' as title',
                    'cover_image',
                    'region_'.$lang.' as region',
                );
    }

    
}
