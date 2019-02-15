<?php

namespace App\BackPage\Repositories;

use Illuminate\Support\Facades\DB;
use App\Agreement;



class AgreementRepo
{

    public function findGes($slug)
    {
        $agreement = Agreement::select('name', 'description', 'content')
        ->where('slug', $slug)
        ->get();

        return $agreement;
    }

}