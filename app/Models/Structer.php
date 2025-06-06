<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Structer extends Model
{
    protected $fillable = [
        'name',
        'slug',
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
