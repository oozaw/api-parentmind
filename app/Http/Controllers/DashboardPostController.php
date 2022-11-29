<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\PostCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('dashboard.posts.index', [
            "posts" => Post::with(['author', 'categories'])->where('author_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('dashboard.posts.create', [
            "categories" => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        // dd($request);
        $validatedData = $request->validate([
            "title" => "required|max:255",
            "type" => "required",
            "slug" => "required",
            "source" => "required",
            "link" => "required",
            "thumbnail" => "required|image|file|max:1024",
            "body" => "required"
        ]);

        if ($request->file('thumbnail')) {
            $validatedData['thumbnail'] = $request->file('thumbnail')->store('post-images');
        }

        $validatedData["author_id"] = auth()->user()->id;
        $validatedData["excerpt"] = Str::limit(strip_tags($request->body), 200);

        $post = Post::create($validatedData);

        // create instance post_category
        $categories = Category::all();

        $dataPostCategory = ["post_id" => $post->id];
        foreach ($categories as $c) {
            $index = "category_$c->id";
            if ($request->$index != null) {
                $dataPostCategory["category_id"] = $c->id;
                PostCategory::create($dataPostCategory);
            }
        }

        return redirect("/dashboard/posts")->with("success", "New post has been added!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post) {
        return view('dashboard.posts.show', [
            "post" => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post) {
        $post_categories = $post->categories->pluck('id')->toArray();

        return view('dashboard.posts.edit', [
            "post" => $post,
            "post_categories" => $post_categories,
            "categories" => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post) {
        $rules = [
            "title" => "required|max:255",
            "type" => "required",
            "source" => "required",
            "link" => "required",
            "thumbnail" => "image|file|max:1024",
            "body" => "required"
        ];

        if ($request->slug != $post->slug) {
            $rules["slug"] = "required|unique:posts";
        }

        $validatedData = $request->validate($rules);

        if ($request->file('thumbnail')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $validatedData['thumbnail'] = $request->file('thumbnail')->store('post-images');
        }

        $validatedData["author_id"] = auth()->user()->id;
        $validatedData["excerpt"] = Str::limit(strip_tags($request->body), 200);

        Post::where('id', $post->id)->update($validatedData);

        // -- post_category update --
        // delete old data
        $post_categories = $post->categories;
        foreach ($post_categories as $pc) {
            PostCategory::where('post_id', $pc->pivot->post_id)->first()->delete();
        }

        // add the new ones
        $categories = Category::all();

        $dataPostCategory = ["post_id" => $post->id];
        foreach ($categories as $c) {
            $index = "category_$c->id";
            if ($request->$index != null) {
                $dataPostCategory["category_id"] = $c->id;
                PostCategory::create($dataPostCategory);
            }
        }

        return redirect("/dashboard/posts")->with("success", "Post has been updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post) {
        if ($post->thumbnail) {
            Storage::delete($post->thumbnail);
        }

        Post::destroy($post->id);

        return redirect("/dashboard/posts")->with("success", "Post has been deleted!");
    }

    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
    }
}