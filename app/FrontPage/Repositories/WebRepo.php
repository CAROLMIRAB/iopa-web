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
use App\Specialty;
use App\Configuration;

class WebRepo
{
    public function showPosts()
    {
        $posts = Post::orderBy('id', 'DESC')
        ->where('status', 'PUBLISHED')
        ->where('category_id', '=', '1')->paginate(10);
        return $posts;
    }

    public function showServices()
    {
        $posts = Post::orderBy('id', 'DESC')
        ->where('status', 'PUBLISHED')
        ->where('category_id', '=', '2')->paginate(10);
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
        $post = Surgery::select('surgeries.id','surgeries.name', 'surgeries.slug', 'description', 'preparation', 'indications', 'surgeries.status','surgeries.file' )
        ->where('surgeries.slug', $slug)
        ->with(array('surgery_office'=>function($query){
            $query->select('name');
          }))
        ->first();
        return $post;
    }

    public function viewExamSlug($slug)
    {
        $post = Exam::select('exams.id','exams.name', 'exams.code', 'exams.slug', 'description', 'preparation', 'indications', 'exams.status','exams.file' )
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
        ->orderBy('name', 'ASC')
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
      }))->with(array('doctor_specialty'=>function($query){
        $query->select('name');
      }))->orderBy('name', 'ASC')->get();
 
        return $doctors;
    }

    public function showExams()
    {
      $exams = Exam::where('exams.status', 'PUBLISHED')
      ->with(array('exam_office'=>function($query){
        $query->select('name');
      }))
      ->orderBy('name', 'ASC')
      ->get();
 
        return $exams;
    }

    public function showSpecialties()
    {
      $specialties = Specialty::where('specialties.status', 'PUBLISHED')
      ->with(array('specialty_doctor'=>function($query){
        $query->select('slug');
      }))
      ->orderBy('name', 'ASC')      
      ->get();
 
        return $specialties;
    }

    public function showOffices()
    {
      $offices = Office::select('name','photo','map','phone','address','slug')
      ->get();
 
        return $offices;
    }

    public function findAllAgreement()
    {
        $agreement = Agreement::select('name', 'description', 'image', 'content', 'status', 'slug')
            ->orderBy('id')
            ->get();

        return $agreement;
    }

    public function showRegions()
    {
        $regions = DB::table('regions')->select('id','name', 'ordinal_symbol')
            ->orderBy('name', 'ASC')
            ->get();

        return $regions;
    }

    public function showComRegion($region)
    {
            $regions = DB::table('communes')->select('id','name')
            ->where('region_id', $region)
            ->orderBy('name', 'ASC')
            ->get();

        return $regions;
    }

    public function showCommunes()
    {
            $regions = DB::table('communes')->select('id','name')
            ->orderBy('name', 'ASC')
            ->get();

        return $regions;
    }

    public function showCommuneByName($region)
    {
            $regions = DB::table('regions')->select('id','name')
            ->where('id', $region)
            ->orderBy('name', 'ASC')
            ->first();

        return $regions;
    }

    public function showAllSpecialtiesWithId($data)
    {
        $specialty = Specialty::select('id', 'file', 'name', 'body','slug', 'status', 'created_at')
            ->whereIn('id', $data)
            ->orderBy('name', 'DESC')
            ->get();
        return $specialty;
    }

    public function findAllId()
    {
        $config = Configuration::select('title', 'content', 'slug')
            ->where('id', 13)
            ->orderBy('id')
            ->first();

        return $config;
    }


    public function findConf($slug)
    {
        $config = Configuration::select('title', 'content', 'slug')
            ->where('slug', $slug)
            ->orderBy('id')
            ->first();

        return $config;
    }

    public function findOfficeSlug($slug)
    {
      $offices = Office::select('name','slug')
      ->where('name', $slug)
      ->first();
 
        return $offices;
    }

}