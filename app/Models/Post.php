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
        'category_id',
        'framework_id',
        'topic_id',
        'structer_id',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Relationships
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function framework()
    {
        return $this->belongsTo(Framework::class);
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function structer()
    {
        return $this->belongsTo(Structer::class);
    }
}
