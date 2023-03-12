<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Post extends Eloquent
{
    use HasFactory;
    protected $connection =  'mongodb';
    protected $collection = 'posts';

    protected $fillable = ['title', 'content', 'slug', 'image', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class)->withPivot('created_at', 'updated_at');
    }
}
