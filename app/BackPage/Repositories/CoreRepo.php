<?php

namespace App\BackPage\Repositories;

use Illuminate\Support\Facades\DB;
use App\Configuration;



class CoreRepo
{

    public function changeConfiguration($slug, $content)
    {
        $general= \DB::table('configuration')->where('slug', $slug)->update(
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

}