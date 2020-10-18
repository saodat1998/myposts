<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'parent_id',
        'status',
    ];

    public $timestamp = true;

    /*
    * Get related posts
    */
    public function posts()
    {
    	return $this->hasMany(Post::class);
    }

    /*
    * Get sub categories
    */
    public function children()
    {
      return $this->hasMany(Category::class, 'parent_id');
    }
}
