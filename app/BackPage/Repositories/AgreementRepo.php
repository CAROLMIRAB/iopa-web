<?php

namespace App\BackPage\Repositories;

use Illuminate\Support\Facades\DB;
use App\Agreement;
use Intervention\Image\Image;



class AgreementRepo
{

    public function findGes($slug)
    {
        $agreement = Agreement::select('content', 'name')
            ->where('slug', $slug)
            ->first();

        return $agreement;
    }

    public function addGes($slug, $datarender)
    {
        $agreement = \DB::table('agreements')->where('slug', $slug)->update(
            ['content' => $datarender]
        );

        return $agreement;
    }

    public function addFonasa($slug, $datarender)
    {
        $agreement = \DB::table('agreements')->where('slug', $slug)->update(
            ['content' => $datarender]
        );

        return $agreement;
    }


    public function changeAgreement($slug, $name, $description, $image = null, $content = null)
    {
        $agreement = \DB::table('agreements')->where('slug', $slug)->update(
            [
                'name' => $name,
                'description' => $description,
                'image' => $image
            ]
        );

        return $agreement;
    }

    public function findFon($slug)
    {
        $agreement = Agreement::select('content', 'name')
            ->where('slug', $slug)
            ->first();

        return $agreement;
    }


    public function findAll()
    {
        $agreement = Agreement::select('name', 'description', 'image', 'content', 'slug')
            ->orderBy('id')
            ->get();

        return $agreement;
    }


}