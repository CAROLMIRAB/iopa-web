<?php

namespace App\FrontPage\Repositories;

use Illuminate\Support\Facades\DB;
use App\Category;
use App\Post;
use App\Doctor;
use App\Exam;
use App\Office;
use App\Surgery;
use App\Agreement;



class WebRepo
{
    public function showPosts()
    {
        $posts = Post::orderBy('id', 'DESC')
        ->where('status', 'PUBLISHED')
        ->where('category_id', '<>', '1')->paginate(10);
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

    public function viewSurgerySlug($slug)
    {
        $post = Surgery::select('name', 'slug', 'description', 'preparation', 'indications', 'status','file' )
        ->where('slug', $slug)
        ->first();
        return $post;
    }

    public function viewExamSlug($slug)
    {
        $post = Exam::select('exams.id','exams.name', 'exams.slug', 'description', 'preparation', 'indications', 'exams.status','exams.file' )
        ->where('exams.slug', $slug)
        ->with(array('exam_office'=>function($query){
            $query->select('name');
          }))
        ->first();
        return $post;
    }

    public function showSurgeries()
    {
        $surgery = Surgery::select('name', 'slug', 'description', 'preparation', 'indications', 'status','file' )
        ->get();
        return $surgery;
    }

    public function showPostHome()
    {
        $post = Post::where('status', 'PUBLISHED')
        ->orderBy('created_at', 'desc')
        ->take(5)
        ->get();
        return $post;
    }

    public function showDoctors()
    {
      $doctors = Doctor::where('doctors.status', 'ACTIVE')
      ->with(array('doctor_office'=>function($query){
        $query->select('slug');
      }))->get();
 
        return $doctors;
    }

    public function showExams()
    {
      $exams = Exam::where('exams.status', 'PUBLISHED')
      ->with(array('exam_office'=>function($query){
        $query->select('slug');
      }))->get();
 
        return $exams;
    }

    public function showOffices()
    {
      $offices = Office::select('name','photo','map','phone','address','slug')
      ->get();
 
        return $offices;
    }

    public function findAllAgreement()
    {
        $agreement = Agreement::select('name', 'description', 'image', 'content', 'slug')
            ->orderBy('id')
            ->get();

        return $agreement;
    }

}