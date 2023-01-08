<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Package extends Model
{
    use HasFactory, Sluggable;

    protected $table = "packages";
    protected $guarded = [];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
