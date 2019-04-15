<?php

namespace App\BackPage\Collections;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use App\Core\Core;


class CoreCollection
{

    public function renderData($data)
    {
        $dataarr = [];
        $arr = '';
        foreach ($data as $item) {
            $arr = json_decode($item->content, true);
            $dataarr[] = [
                $item->slug => [
                    'content' => $arr
                ]
            ];

        }
        return $dataarr;
    }

    public static function renderDescriptionPage($request)
    {
        $pageSpecialty = $request->specialty_description;
        $pageOffices = $request->offices_description;
        $pageDoctors = $request->doctors_description;
        $pageExams = $request->exams_description;
        $pageSurgeries = $request->surgeries_description;
        $pageQuery = $request->query_description;

       // $array = json_decode($arr, true);

        $general = [
                'pageSpecialty' => $pageSpecialty,
                'pageOffices' =>  $pageOffices,
                'pageDoctors' => $pageDoctors,
                'pageExams' => $pageExams,
                'pageSurgeries' => $pageSurgeries,
                'pageQuery' => $pageQuery
        ];


        return ['generalPages' => $general];

    }

}


