<?php

namespace App\BackPage\Repositories;

use Illuminate\Support\Facades\DB;
use App\Configuration;



class CoreRepo
{

    public function changeConfiguration($slug, $content)
    {
        $general= \DB::table('configurations')->where('slug', $slug)->update(
            [
                'content' => $content
            ]
        );

        return $general;
    }

    public function findAll()
    {
        $config = Configuration::select('title', 'content', 'slug')
            ->orderBy('id')
            ->get();

        return $config;
    }

    public function findConfigSlug($slug)
    {
        $config = Configuration::select('content', 'title')
            ->where('slug', $slug)
            ->first();

           
        return $config;
    }

    public function addPolitica($slug, $datarender)
    {
        $config = \DB::table('configurations')->where('slug', $slug)->update(
            ['content' => $datarender]
        );

        return $config;
    }

}