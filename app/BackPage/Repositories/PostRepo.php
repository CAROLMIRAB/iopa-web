<?php

namespace App\BackPage\Repositories;

use Illuminate\Support\Facades\DB;
use App\Category;
use App\Post;

class PostRepo
{

    public function createPost($data)
    {
        $post = new Post();
        $post->fill($data);
        $post->save();
        return $post;
    }

    public function showPosts()
    {
        $posts = Post::select('posts.name', 'posts.slug', 'excerpt', 'posts.body', DB::raw('categories.name as category'), 'status', 'tags', 'file', 'posts.created_at')
            ->leftJoin('categories', 'categories.id', '=', 'posts.category_id')
            ->get();
        return $posts;
    }

    public function viewPostSlug($slug)
    {
        $post = Post::select('posts.id','posts.name', 'posts.slug', 'excerpt', 'posts.body', DB::raw('categories.name as category'), 'status', 'tags', 'file', 'posts.category_id')
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

    public function allCategories()
    {
        $category = Category::orderBy('name', 'asc')->get();
        return $category;
    }

    public function findSlug($slug)
    {
        $post = Post::select('slug')->where('slug', $slug)->first();
        return $post;
    }

    public function editPostById($id, $data)
    {
        $result = \DB::table('posts')->where('id', $id)->update($data);
    }

}