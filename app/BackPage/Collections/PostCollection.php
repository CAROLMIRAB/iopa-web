<?php

namespace App\BackPage\Collections;

use Carbon\Carbon;
use Illuminate\Support\Collection;


class PostCollection
{

    public function allPostCollect($posts)
    {
        $allposts = new Collection();

        foreach ($posts as $post) {

            $date_create = new Carbon($post->created_at);
            $date_create->setTimezone('America/Santiago');
            $post->created = $date_create->format('d/m/Y h:i A');
            $tags = json_decode($post->tags);
            $route = route('post.editview', $post->slug);
            $allposts->push([
                'title' => $post->name,
                'category' => $post->category,
                'tags' => $tags,
                'created' => $post->created,
                'status' => $post->status,
                'route' => $route
            ]);
        }
        return $allposts;
    }

    public function editData($post)
    {
        $post->tag = str_replace('"', "", $post->tags);
        $post->tag = str_replace('[', "", $post->tag);
        $post->tag = str_replace(']', "", $post->tag);

        $image = url('') . "/uploads/images/" . $post->file;
        $slug = route('post.viewposts') . "/" . $post->slug;

        $post->slug = $post->slug;
        $post->name = $post->name;
        $post->body = $post->body;
        $post->file = $post->file;
        $post->status = $post->status;
        $post->image = $image;
        $post->tag = $post->tag;
        $post->slug_url =  $slug;
           

        return $post;

    }

}