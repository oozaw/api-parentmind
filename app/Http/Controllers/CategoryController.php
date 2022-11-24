<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
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
}
