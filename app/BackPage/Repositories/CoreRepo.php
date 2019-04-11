<?php

namespace App\BackPage\Repositories;

use Illuminate\Support\Facades\DB;
use App\Configuration;



class CoreRepo
{

    public function changeGeneral($slug, $name, $content)
    {
        $general= \DB::table('configuration')->where('slug', $slug)->update(
            [
                'title' => $name,
                'content' => $content
            ]
        );

        return $general;
    }

}