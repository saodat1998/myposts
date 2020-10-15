<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    public $primaryKey = 'id';
    public $timestamp = true;

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
