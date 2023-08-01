<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id', 'status_id',
    'category_id','title', 'slug', 'excerpt', 'body'];

    public function user()
    {
    return $this->belongsTo(User::class);
    }
    
    public function category()
    {
    return $this->belongsTo(Category::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->as('tags');
    }

    public function post_bookmark()
    {
        return $this->hasMany(PostBookmark::class);
    }
    
    
}