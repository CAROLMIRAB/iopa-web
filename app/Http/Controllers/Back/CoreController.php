<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\BackPage\Repositories\DoctorRepo;
use App\BackPage\Repositories\PostRepo;
use App\BackPage\Repositories\SurgeryRepo;
use Yajra\DataTables\DataTables;
use Validator;

class CoreController extends Controller
{

    private $doctorRepo;
    private $surgeryRepo;
    private $postRepo;

    /**
     * Class construct 
     * 
     * @return void
     */
    public function __construct(DoctorRepo $doctorRepo, SurgeryRepo $surgeryRepo, PostRepo $postRepo)
    {
        $this->doctorRepo = $doctorRepo;
        $this->surgeryRepo = $surgeryRepo;
        $this->postRepo = $postRepo;
    }

    /**
     * Render Slug 
     * 
     * @return $slug
     */
    function titleAndSlug(Request $request)
    {
        $slug_number = '';
        switch ($request->mod) {
            case 'post':
                {
                    $slug = str_slug($request->title, '-');
                    $slug_search = $this->postRepo->findSlug($slug);
                    $slug_number = $slug_search->number_slug;
                    $title = $slug_search->title;
                    break;
                }
            case 'surgery':
                {
                    $slug = str_slug($request->title, '-');
                    $slug_search = $this->surgeryRepo->findSlug($slug);
                    $slug_number = $slug_search->number_slug;
                    $title = $slug_search->name;
                    break;
                }
        }

        if ($slug_number <> 0 && $request->title <> $request->title_before && !empty($request->id)) {
            $number = $slug_number + 1;
            $slug_response = $slug . '-' . $number;
        } else {
            $slug_response = $slug;
        }

        if ($slug_number <> 0 && $request->title <> $request->title_before) {
            $number = $slug_number + 1;
            $slug_response = $slug . '-' . $number;
        } else {
            $slug_response = $slug;
        }


        $data = [
            'status' => 'success',
            'message' => __(''),
            'data' => [
                'slug' => $slug_response
            ]
        ];

        return response()->json($data);
    }


    public static function uploadImage($image)
    {
        $input = [];

        $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();

        $destinationPath = public_path('/uploads/thumbnail');
        $img = \Image::make($image->getRealPath());
        $img->resize(200, 200, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath . '/' . $input['imagename']);

        $destinationPath = public_path('/uploads/images');
        $image->move($destinationPath, $input['imagename']);

        $image_url = $input['imagename'];

        return $image_url;
    }
}
