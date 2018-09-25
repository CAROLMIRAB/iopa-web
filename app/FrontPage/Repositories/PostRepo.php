<?php

namespace App\FrontPage\Repositories;

use App\Post;


class PostRepo
{
    public function showPosts()
    {
        $posts = Post::orderBy('id', 'DESC')->where('status', 'PUBLISHED')->paginate(3);
        return $posts;
    }

    public function viewPostSlug($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return $post;
    }
}