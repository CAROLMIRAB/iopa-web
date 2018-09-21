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
}