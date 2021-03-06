<?php

namespace App\FrontPage\Collections;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use App\Surgery;

class WebCollection
{
  public function renderPostsHome($post)
  {
    setlocale(LC_TIME, 'es_ES.UTF-8');
    $allposts = [];

    foreach ($post as $item) {

      $mydate = Carbon::setLocale('es');
      $mydate = Carbon::parse($item->created_at)->setTimezone('America/Santiago')->formatLocalized('Publicado el %d de %B, %Y');
      $route = route('post.viewpost', ['slug' => $item->slug]);
      $item->image = url("/uploads/thumbnail/" . $item->file);
      $item->created = $mydate;
      $item->route = $route;
      $item->tagsl = json_decode($item->tags);
    }
    return  $post;
  }


  public function renderPost($post)
  {
    setlocale(LC_TIME, 'es_ES.UTF-8');

    $mydate = Carbon::setLocale('es');
    $mydate = Carbon::parse($post->created_at)->setTimezone('America/Santiago')->formatLocalized('Publicado el %d de %B, %Y');
    $route = route('post.viewpost', ['slug' => $post->slug]);
    $post->image = url("/uploads/images/" . $post->file);
    $post->created = $mydate;
    $post->route = $route;
    $post->tagsl = json_decode($post->tags);

    return  $post;
  }


  public function renderExam($exam)
  {

    $exam->image = url("/uploads/images/" . $exam->file);

    return $exam;
  }

  public function renderSpecialty($specialty)
  {

    $specialty->image = url("/uploads/images/" . $specialty->file);

    return $specialty;
  }

  public function renderDoctors($doctors)
  {
    foreach ($doctors as $doctor) {
      $doctor->image = url("/uploads/images/" . $doctor->file);

      foreach ($doctor->doctor_office as $item) {
        $doctor->listoffice .= $item->slug . " ";
      }

      foreach ($doctor->doctor_specialty as $k => $it) {
        if($k == 0){
        $doctor->listspecialty = $it->name;
        }
      }

    }
    return  $doctors;
  }

  public function renderSpecialties($specialties)
  {
    foreach($specialties as $specialty){
      $specialty->image = url("/uploads/images/" . $specialty->file);
      $specialty->route = route('specialty.viewspecialty', ['slug' => $specialty->slug]);
    }
    return  $specialties;
  }

  public function renderExams($exams)
  {
    foreach ($exams as $exam) {
      $exam->image = url("/uploads/images/" . $exam->file);
      $route = route('exam.viewexam', ['slug' => $exam->slug]);
      $exam->route = $route;
      $listoffice = new Collection();
      foreach ($exam->exam_office as $item) {
        $listoffice->push([$item->name]);
      }
      $exam->listoffice = $listoffice;
    }
    return  $exams;
  }


  public function renderSurgery($surgery)
  {
    $route = route('surgery.viewsurgery', ['slug' => $surgery->slug]);
    $surgery->image = url("/uploads/images/" . $surgery->file);
    $surgery->route = $route;
    return  $surgery;
  }

  public function renderSurgeries($surgeries)
  {

    foreach ($surgeries as $item) {
      $route = route('surgery.viewsurgery', ['slug' => $item->slug]);
      $item->image = url("/uploads/images/" . $item->file) ;
      $item->route = $route;
    }

    return  $surgeries;
  }


  public function renderOffices($offices)
  {
    foreach ($offices as $office) {
      if (!is_null($office->photo)) {
        $office->image = url("/uploads/images/" . $office->photo);
      } else {
        $office->image = url("/images/no-foto.png");
      }
    }

    return  $offices;
  }

  public function renderData($data)
  {
    $dataarr = [];
    $arr = '';
    foreach ($data as $item) {
      $arr = json_decode($item->content, true);
      $dataarr[] = [
        $item->slug => [
          'name' => $item->name,
          'description' => $item->description,
          'image' => $item->image,
          'content' => $arr,
          'status' => $item->status
        ]
      ];
    }
    return $dataarr;
  }

  public function renderEmails($office, $emails)
  {
   $allemails = "";
    $group = json_decode($emails->content, true);
    foreach($group as $item => $cont){
      foreach($cont as $it=> $con){
      if($it == $office){
       $allemails= $con;
      }
     }
    }
  
    return $allemails;
  }


}
