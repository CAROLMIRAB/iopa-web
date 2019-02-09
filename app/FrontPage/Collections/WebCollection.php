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
        $allposts[]= (object)[
                'name' => $item->name,
                'slug' => $item->slug,
                'file' => $item->file,
                'created' => $mydate,
                'excerpt' => $item->excerpt,
                'route' => $route
            ];
     }
     return  $allposts;

    }

}