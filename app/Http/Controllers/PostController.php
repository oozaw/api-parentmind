<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller {

    public function index(Request $request) {
        $title = '';
        $max_post_page = 7;

        if (($request['page'] > 1)) {
            $max_post_page = 6;
        }

        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = "by " . $author->name;
        }

        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = "in " . $category->name;
        }

        // kurang baik jika mengacu konsep mvc karena seharusnya yang mengolah data adalah model bukan controllers
        // $posts = Post::with(['author', 'category'])->latest();
        // if (request('keyword')) {
        //     $posts->where('title', 'like', '%' . request('keyword') . '%')
        //         ->orWhere('body', 'like', '%' . request('keyword') . '%')
        //         ->orWhereHas('author', fn ($query) => $query->where('name', 'like', '%' . request('keyword') . '%'))
        //         ->orWhereHas('category', fn ($query) => $query->where('name', 'like', '%' . request('keyword') . '%'));
        // }

        return view('posts', [
            "title" => "All Posts $title",
            // untuk sorting dari yang terbaru ditambahkan dan untuk with (eager loading bisa ditempatkan pada model)
            "posts" => Post::with(['author', 'category'])->latest()->filter(request(['author', 'category', 'keyword']))->paginate($max_post_page)->withQueryString()
            // "posts" => Post::with(['author', 'category'])->all()
        ]);
    }

    public function show(Post $post) {
        return view('post', [
            "title" => $post->title,
            "post" => $post
        ]);
    }
}