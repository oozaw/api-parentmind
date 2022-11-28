<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;

class ApiPostController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $posts = Post::with('categories', 'author')->get()->makeHidden(['author_id', 'author', 'slug', 'categories', 'published_at']);

        foreach ($posts as $p) {
            // author
            $p['authors'] = ($p->author->is_admin == 0) ? $p->author->name : "Admin";

            // category
            $category = "";
            $count_categories = 1;
            foreach ($p->categories as $c) {
                $total_categories = $p->categories->count();
                $category .= (($count_categories != $total_categories) ? "$c->name, " : "$c->name");
                $count_categories++;
            }

            $p['category'] = $category;
        }

        return ApiResponse::articleGetResponse('success', 'Articles has been fetched successfully', $posts, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $post = Post::where('id', $id)->with('categories', 'author')->get()->makeHidden(['author_id', 'author', 'slug', 'categories', 'published_at']);

        $p = $post->first();
        // author
        $p['authors'] = ($p->author->is_admin == 0) ? $p->author->name : "Admin";

        // category
        $category = "";
        $count_categories = 1;
        foreach ($p->categories as $c) {
            $total_categories = $p->categories->count();
            $category .= (($count_categories != $total_categories) ? "$c->name, " : "$c->name");
            $count_categories++;
        }

        $p['category'] = $category;

        return ApiResponse::articleGetResponse('success', 'Article has been fetched successfully', $post, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
}