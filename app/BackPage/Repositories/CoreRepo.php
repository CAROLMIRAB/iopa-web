<?php

namespace App\BackPage\Repositories;

use Illuminate\Support\Facades\DB;
use App\Configuration;



class CoreRepo
{

    public function changeGeneral($slug, $name, $description, $status, $image = null, $content = null)
    {
        $agreement = \DB::table('agreements')->where('slug', $slug)->update(
            [
                'name' => $name,
                'content' => $description,
                'image' => $image,
                'status' => $status
            ]
        );

        return $agreement;
    }

}