<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Post extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'body',
        'category_id',
        'status',
    ];

    public $timestamp = true;

    /**
     * Category Model
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
