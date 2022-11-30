<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller {
    public function index() {
        return view('categories', [
            "title" => "Category",
            "categories" => Category::all()
        ]);
    }

    public function show() {
        $title = '';

        if (request('category')) {
            $title = Category::firstWhere('slug', request('category'))->name;
        }

        return view('category', [
            "title" => $title,
            // "posts" => $category->posts->load('author', 'category')
            "posts" => Post::with(['author', 'category'])->latest()->filter(request(['category']))->get()
        ]);
    }

    public function showCat(Request $request) {
        $title = Category::firstWhere('slug', $request->slug)->name;

        $max_post_page = 7;

        if (($request['page'] > 1)) {
            $max_post_page = 6;
        }

        $category_id = Category::firstWhere('slug', $request->slug)->id;
        $posts_categories = PostCategory::where('category_id', $category_id)->pluck('post_id')->toArray();
        $posts = Post::whereIn('id', $posts_categories)->latest();

        return view('category', [
            "title" => "All Post in $title",
            "posts" => $posts->paginate($max_post_page)->withQueryString()
        ]);
    }
}