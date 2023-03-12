<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class CategoryPost extends Eloquent
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'category_post';
    protected $fillable = ['category_id', 'post_id'];
    
}
