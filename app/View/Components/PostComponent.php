<?php

namespace App\View\Components;

use App\Models\Post;
use Illuminate\View\Component;

class PostComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $posts = Post::query()->orderBy('id', 'DESC')->where('deleted_at', null)->take(3)->get();

        return view('components.post-component', [
            'posts' => $posts
        ]);
    }
}
