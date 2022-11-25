<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model {
    use HasFactory;

    protected $guarded = ['id'];

    // public function posts() {
    //     return $this->hasMany(Post::class);
    // }

    public function posts() {
        return $this->belongsToMany(Post::class, 'post_category')->using(PostCategory::class)->withTimestamps();
    }

    public function getRouteKeyName() {
        return 'slug';
    }
}