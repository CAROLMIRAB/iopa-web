<?php

namespace App\BackPage\Collections;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use App\Core\Core;


class AgreementCollection
{

    public function renderData($data)
    {
        $dataarr = [];
        $arr = '';
        foreach ($data as $item) {
            $arr = json_decode($item->content, true);
            $dataarr[] = [
                $item->slug => [
                    'name' => $item->name,
                    'description' => $item->description,
                    'image' => $item->image,
                    'content' => $arr
                ]
            ];

        }
        return $dataarr;
    }

    public static function renderGes($request, $arr)
    {
        $isapre = [];
        $ges = [];
        $account = [];
        $isapreges = $request->isapreges;
        $isaprecuenta = $request->isaprecuenta;

        $account_title=(is_null($request->account_title)) ? '' : $request->account_title;

        $array = json_decode($arr, true);


        foreach ($isapreges as $key => $n) {
            if (!is_null($isapreges[$key])) {
                $ges[] = [
                    'name' => $isapreges[$key]
                ];
            }
        }

        foreach ($isaprecuenta as $key => $n) {
            if (!is_null($isaprecuenta[$key])) {
                $account[] = [
                    'name' => $isaprecuenta[$key]
                ];
            }
        }

        $image_url = Core::uploadImage($request->file('isapre_image'));

        $isapre = [
            time() => [
                'image' => asset('uploads/images') . '/' . $image_url,
                'ges' => $ges,
                'account' => [
                    'title' => $account_title,
                    'content' => $account
                ]
            ]
        ];


        array_push($array, $isapre);


        return ['full' => $array, 'isapre' => $isapre];

    }


    public static function renderFonasa($request, $arr)
    {

        $subfon = [];
        $subtitle = $request->fonasa_subtitle;
        $subdescription = $request->fonasa_subdescription;

        $array = json_decode($arr, true);

        $subfon = [
            time() => [
                'subtitle' => $subtitle,
                'subdescription' => $subdescription
            ]
        ];

        array_push($array, $subfon);

        return ['full' => $array, 'fonasa' => $subfon];

    }

    public static function renderConvenio($request)
    {

        $image_url = Core::uploadImage($request->file('convenio_image'));

        return ['convenio' => $image_url];

    }

    public static function renderArancel($request, $arr)
    {
        $arancel = [];
        $subtitle = $request->arancel_subtitle;
    
        $pdf_url = Core::uploadPDF($request->file('archive'));

        $array = json_decode($arr, true);

        $arancel = [
            time() => [
                'title' => $subtitle,
                'pdf' => $pdf_url,
                'route' =>  asset('uploads/documents') . '/' . $pdf_url
            ]
        ];

        array_push($array, $arancel);

        return ['full' => $array, 'arancel' => $arancel];

    }
}


}