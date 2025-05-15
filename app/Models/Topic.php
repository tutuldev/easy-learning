<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
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
