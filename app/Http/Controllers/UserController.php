<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller {

    public function show(User $author) {
        $title = '';

        if (request('author')) {
            $title = User::firstWhere('username', request('author'))->name;
        }

        return view('author', [
            "title" => $title,
            "posts" => $author->posts->load('author', 'category')
        ]);
    }
}
