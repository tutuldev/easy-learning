<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'code',
        'image',
        'category',
        'framework',
        'language',
        'structer',
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
