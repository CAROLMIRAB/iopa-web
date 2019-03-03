<?php

namespace App\FrontPage\Collections;

use Carbon\Carbon;
use Illuminate\Support\Collection;


class WebCollection
{
   public function RenderPostsHome($post)
   {
    setlocale(LC_TIME, 'es_ES.UTF-8');
    $allposts = [];

     foreach($post as $item){
        
        $mydate = Carbon::setLocale('es'); 
        $mydate = Carbon::parse($item->created_at)->setTimezone('America/Santiago')->formatLocalized('Publicado el %d de %B, %Y');
        $route = route('post.viewpost', ['slug' => $item->slug]);

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

            $post->created = $mydate;
            $post->route = $route;
            $post->tagsl = json_decode($post->tags);

     return  $post;

    }

    public function RenderDoctors($doctors)
    {
      foreach($doctors as $doctor){
    
        foreach($doctor->doctor_office as $item){
      $doctor->listoffice .= $item->slug ." ";    
      }
    }
      return  $doctors;
 
     }

     public function RenderExams($exams)
     {
       foreach($exams as $exam){
     
         foreach($exam->exam_office as $item){
            $exam->listoffice .= $item->slug ." ";    
       }
     }
       return  $exams;
  
      }
}