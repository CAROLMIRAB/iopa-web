<?php

namespace App\Core;

use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Validator;
use App\Post;
use App\Surgery;
use App\Doctor;
use App\Exam;
use App\Specialty;

class Core
{

    /**
     * Class construct 
     * 
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Render Slug 
     * 
     * @return $slug
     */
    public static function titleAndSlug($request)
    {
        $slug = str_slug($request->title, '-');
        switch ($request->mod) {
            case 'post':
                {
                    if ($request->title <> $request->title_before && !empty($request->id)) {
                        $slug_response = SlugService::createSlug(Post::class, 'slug', $request->title, ['unique' => true]);
                    } else {
                        $slug_response = $slug;
                    }
                    if ($request->title <> $request->title_before) {
                        $slug_response = SlugService::createSlug(Post::class, 'slug', $request->title, ['unique' => true]);
                    } else {
                        $slug_response = $slug;
                    }
                    break;
                }
            case 'surgery':
                {
                    if ($request->title <> $request->title_before && !empty($request->id)) {
                        $slug_response = SlugService::createSlug(Surgery::class, 'slug', $request->title, ['unique' => true]);
                    } else {
                        $slug_response = $slug;
                    }
                    if ($request->title <> $request->title_before) {
                        $slug_response = SlugService::createSlug(Surgery::class, 'slug', $request->title, ['unique' => true]);
                    } else {
                        $slug_response = $slug;
                    }
                    break;
                }
            case 'doctor':
                {
                    if ($request->title <> $request->title_before && !empty($request->id)) {
                        $slug_response = SlugService::createSlug(Doctor::class, 'slug', $request->title, ['unique' => true]);
                    } else {
                        $slug_response = $slug;
                    }
                    if ($request->title <> $request->title_before) {
                        $slug_response = SlugService::createSlug(Doctor::class, 'slug', $request->title, ['unique' => true]);
                    } else {
                        $slug_response = $slug;
                    }
                    break;
                }
            case 'office':
                {
                    if ($request->title <> $request->title_before && !empty($request->id)) {
                        $slug_response = SlugService::createSlug(Office::class, 'slug', $request->title, ['unique' => true]);
                    } else {
                        $slug_response = $slug;
                    }
                    if ($request->title <> $request->title_before) {
                        $slug_response = SlugService::createSlug(Office::class, 'slug', $request->title, ['unique' => true]);
                    } else {
                        $slug_response = $slug;
                    }
                    break;
                }
            case 'exam':
                {
                    if ($request->title <> $request->title_before && !empty($request->id)) {
                        $slug_response = SlugService::createSlug(Exam::class, 'slug', $request->title, ['unique' => true]);
                    } else {
                        $slug_response = $slug;
                    }
                    if ($request->title <> $request->title_before) {
                        $slug_response = SlugService::createSlug(Exam::class, 'slug', $request->title, ['unique' => true]);
                    } else {
                        $slug_response = $slug;
                    }
                    break;
                }
            case 'specialty':
                {
                    if ($request->title <> $request->title_before && !empty($request->id)) {
                        $slug_response = SlugService::createSlug(Specialty::class, 'slug', $request->title, ['unique' => true]);
                    } else {
                        $slug_response = $slug;
                    }
                    if ($request->title <> $request->title_before) {
                        $slug_response = SlugService::createSlug(Specialty::class, 'slug', $request->title, ['unique' => true]);
                    } else {
                        $slug_response = $slug;
                    }
                    break;
                }
        }

        return $slug_response;
    }


    public static function uploadImage($image)
    {
        $input = [];

        $input['imagename'] = time() . '.' . strtolower($image->getClientOriginalExtension());
       
        $destinationPath = public_path('/uploads/thumbnail/') . $input['imagename'];
        $thumb = \Image::make($image->getRealPath())->encode('jpg', 75);
        $thumb->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath);

        $destination = public_path('/uploads/images/') . $input['imagename'];
        $img = \Image::make($image->getRealPath())->encode('jpg', 75);
        $img->save($destination);

        $image_url = $input['imagename'];

        return $image_url;
    }

    public static function uploadPDF($pdf)
    {
        $input = [];

        $input['pdfname'] = time() . '.' . $pdf->getClientOriginalExtension();

        $destinationPath = public_path('/uploads/documents');
        $pdf->move($destinationPath, $input['pdfname']);

        $pdf_url = $input['pdfname'];

        return $pdf_url;
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
