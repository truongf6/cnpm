<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;


class PostController extends Controller
{
    private $model;
    private $route_prefix;

    function __construct() {
        $this->model = (new Post())::query();
        $this->route_prefix = 'admin.posts.';
    }

    public function index() {
        $posts = $this->model->where('deleted_at')->get();

        return view('admin.posts.index', [
            'posts' => $posts,
        ]);
    }


    public function create()
    {
        return view('admin.posts.create');
    }


    public function store(StoreRequest $post)
    {
        $this->model->create($post->validated());

        return redirect()->route('admin.posts.index');
    }


    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post
        ]);
    }


    public function update(UpdateRequest $request, Post $post)
    {
        $post->update($request->validated());

        return redirect()->route('admin.posts.index');
    }


    public function destroy(Post $post)
    {
        $post->deleted_at = Carbon::now();
        $post->update();

        return redirect()->route('admin.posts.index');
    }
}
