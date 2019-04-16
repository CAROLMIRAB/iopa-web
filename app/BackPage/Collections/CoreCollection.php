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

    public function renderText($data)
    {
        $dataarr = [
            'description' => $data
        ];
      
       
        return json_encode($dataarr);
    }

    public function renderPopup($data, $status)
    {
        $dataarr = [
            'status' => $status,
            'description' => $data
        ];
      
       
        return json_encode($dataarr);
    }

    public static function renderDescriptionPage($request)
    {
        $pageSpecialty = is_null($request->specialty_description) ? '' : $request->specialty_description;
        $pageOffices = is_null($request->offices_description) ? '' : $request->offices_description;
        $pageDoctors = is_null($request->doctors_description) ? '' : $request->doctors_description;
        $pageExams = is_null($request->exams_description) ? '' : $request->exams_description;
        $pageSurgeries = is_null($request->surgeries_description) ? '' : $request->surgeries_description;
        $pageQuery = is_null($request->query_description) ? '' : $request->query_description;
        $pageBlog = is_null($request->blog_description) ? '' : $request->blog_description;

        $general = [
                'page-specialty' => $pageSpecialty,
                'page-offices' =>  $pageOffices,
                'page-doctors' => $pageDoctors,
                'page-exams' => $pageExams,
                'page-surgeries' => $pageSurgeries,
                'page-query' => $pageQuery,
                'page-blog' => $pageBlog
        ];


        return json_encode($general);

    }

}


