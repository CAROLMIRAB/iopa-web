<?php

namespace App\FrontPage\Repositories;

use Illuminate\Support\Facades\DB;
use App\Category;
use App\Post;
use App\Doctor;
use App\Exam;
use App\Office;




class WebRepo
{
    public function showPosts()
    {
        $posts = Post::orderBy('id', 'DESC')->where('status', 'PUBLISHED')->paginate(10);
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
        $post = Post::orderBy('created_at', 'desc')->take(5)->get();
        return $post;
    }

    public function showDoctors()
    {
      $doctors = Doctor::with(array('doctor_office'=>function($query){
        $query->select('slug');
      }))->get();
 
        return $doctors;
    }

    public function showExams()
    {
      $exams = Exam::with(array('exam_office'=>function($query){
        $query->select('slug');
      }))->get();
 
        return $exams;
    }

    public function showOffices()
    {
      $offices = Office::select('name','photo','map','phone','address','slug')->get();
 
        return $offices;
    }

}