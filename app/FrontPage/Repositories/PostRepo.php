<?php

namespace App\FrontPage\Repositories;

use Illuminate\Support\Facades\DB;
use App\Category;
use App\Tag;
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
        $post = Post::select('posts.name', 'posts.slug', 'excerpt', 'posts.body', DB::raw('categories.name as category'), 'status','tags','file' )
        ->leftJoin('categories', 'categories.id', '=', 'posts.category_id')
        ->where('posts.slug', $slug)
        ->first();
        return $post;
    }

    public function showPostHome()
    {
        $post = Post::orderBy('created_at', 'desc')->take(3)->get();
        return $post;
    }

    public function createPost($data)
    {
        $post = new Post();
        $post->fill($data);
        return $post;
    }


}