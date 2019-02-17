<?php

namespace App\BackPage\Repositories;

use Illuminate\Support\Facades\DB;
use App\Agreement;



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


    public function changeIsapre($slug, $name, $description)
    {
        $agreement = \DB::table('agreements')->where('slug', $slug)->update(
            [
                'name' => $name,
                'description' => $description
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


}