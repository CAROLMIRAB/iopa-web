<?php

namespace App\BackPage\Collections;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use App\Core\Core;


class CoreCollection
{

    public static function renderDescriptionPage($request, $arr)
    {
        $pageSpecialty = $request->pageSpecialty;
        $pageOffices = $request->pageOffices;
        $pageAgreement = $request->pageAgreement;
        $pageContact = $request->pageContact;
        $pageAboutUs = $request->pageAboutUs;
        $pageDoctors = $request->pageDoctors;
        $pageExams = $request->pageExams;
        $pageSurgeries = $request->pageSurgeries;
        $pageQuery = $request->pageQuery;

        $array = json_decode($arr, true);

        $general = [
                'pageSpecialty' => $pageSpecialty,
                'pageOffices' =>  $pageOffices,
                'pageAgreement' => $pageAgreement,
                'pageContact' => $pageContact,
                'pageAboutUs' => $pageAboutUs,
                'pageDoctors' => $pageDoctors,
                'pageExams' => $pageExams,
                'pageSurgeries' => $pageSurgeries,
                'pageQuery' => $pageQuery
        ];

        array_push($array, $general);

        return ['full' => $array, 'generalPages' => $general];

    }
}


