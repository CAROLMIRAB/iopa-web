<?php

namespace App\FrontPage\Collections;

use Carbon\Carbon;
use Illuminate\Support\Collection;


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
      $item->image = url('') . "/uploads/images/" . $item->file;
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
    $post->image = url('') . "/uploads/images/" . $post->file;
    $post->created = $mydate;
    $post->route = $route;
    $post->tagsl = json_decode($post->tags);

    return  $post;
  }


  public function renderExam($exam)
  {

    $exam->image = url('') . "/uploads/images/" . $exam->file;

    return $exam;
  }

  public function renderDoctors($doctors)
  {
    foreach ($doctors as $doctor) {
      $doctor->image = url('') . "/uploads/images/" . $doctor->file;
      foreach ($doctor->doctor_office as $item) {
        $doctor->listoffice .= $item->slug . " ";
      }
    }
    return  $doctors;
  }

  public function renderDoctorsReserva($doctors)
  {
    $listoffice = "";
    $data = "";
    $data .= '<div class="row row-medicos row-medicos-res">
    <div class="col-xs-12">
        <ul class="media-list medic-list">';
    foreach ($doctors as $doctor) {
      foreach ($doctor->doctor_office as $item) {
        $listoffice .= $item->slug . " ";
      }
      $doctor->image = url('') . "/uploads/images/" . $doctor->file;

      $data .= '<li class="media filter ' . $listoffice . ' }}">
      <div class="media-left">
          <a href="javascript:void(0);">
          <img class="media-object" src="' . $doctor->image . '" alt="...">
          </a>
      </div>
      <div class="media-body">
          <h4 class="media-heading">' . $doctor->name . ' ' . $doctor->lastname . ' }}</h4>
          <p class="media-description">
          </p>
      </div>
     
  </li>';
    }
    $data .= '</ul>
    </div>
</div>';
    return  $data;
  }

  public function renderExams($exams)
  {
    foreach ($exams as $exam) {
      $exam->image = url('') . "/uploads/images/" . $exam->file;
      $route = route('exam.viewexam', ['slug' => $exam->slug]);
      $exam->route = $route;
      foreach ($exam->exam_office as $item) {
        $exam->listoffice .= $item->slug . " ";
      }
    }
    return  $exams;
  }


  public function renderSurgery($surgery)
  {

    return  $surgery;
  }

  public function renderSurgeries($surgeries)
  {

    foreach ($surgeries as $item) {
      $route = route('surgery.viewsurgery', ['slug' => $item->slug]);
      $item->image = url('') . "/uploads/images/" . $item->file;
      $item->route = $route;
    }

    return  $surgeries;
  }


  public function renderOffices($offices)
  {
    foreach ($offices as $office) {
      if (!is_null($office->photo)) {
        $office->image = url('') . "/uploads/images/" . $office->photo;
      } else {
        $office->image = url('') . "/images/no-foto.png";
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
}
