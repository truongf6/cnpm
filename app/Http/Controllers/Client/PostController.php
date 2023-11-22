<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::query()->where('isActive', true)
                ->where('deleted_at')->get();

        return view('client.post.index', [
            'posts' => $posts
        ]);
    }

    public function show($post_id) {
        $post = Post::find($post_id);
        $post_author = User::find($post->user_id)->fullname;

        return view('client.post.show', [
            'post' => $post,
            'post_author' => $post_author,
        ]);
    }
}
