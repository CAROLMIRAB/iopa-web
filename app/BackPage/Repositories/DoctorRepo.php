<?php

namespace App\BackPage\Repositories;

use Illuminate\Support\Facades\DB;
use App\Category;
use App\Post;
use App\Doctor;





class DoctorRepo
{

    public function createDoctor($data)
    {
        $post = new Doctor();
        $post->fill($data);
        $post->save();
        return $post;
    }

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

    public function allCategories()
    {
       $category = Category::orderBy('name', 'asc')->get();
       return $category;
    }

  


}