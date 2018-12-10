<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\BackPage\Repositories\DoctorRepo;
use Validator;

class DoctorController extends Controller
{

    private $doctorRepo;

    /**
     * Class construct 
     * 
     * @return void
     */
    public function __construct(DoctorRepo $doctorRepo)
    {
        $this->doctorRepo = $doctorRepo;
    }


    /**
     * View doctor create
     * 
     * @return view
     */
    public function viewCreateDoctor()
    {
        $specialties = $this->doctorRepo->showAllSpecialties();
        $offices = $this->doctorRepo->showAllOffices();
        return view('back.doctors.create', compact('specialties', 'offices'));
    }

    /**
     * Stored post
     * 
     * @return view
     */
    public function saveCreateDoctor(Request $request)
    {
        try {
            $image_url = $request->imgurl;
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'lastname' => 'required',
                'excerpt' => 'required',
                'specialty_id' => 'required',
            ], [
                'name.required' => __('El nombre es requerido'),
                'lastname.required' => __('El apellido es requerido'),
                'excerpt.required' => __('Debe escribir un extracto'),
                'specialty_id' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator, 'valid')
                    ->withInput();
            }

            if (!empty($image_url)) {

                //$full = \URL::to('/') . '/uploads/images/' . $image_url;

                $data = array(
                    'name' => $request->name,
                    'lastname' => $request->lastname,
                    'excerpt' => $request->excerpt,
                    'phone' => $request->phone,
                    'specialty_id' => $request->specialty_id,
                    'file' => $image_url
                );

                $post = $this->doctorRepo->createDoctor($data, $request->office);


            }

            return redirect()->back();

        } catch (\Exception $ex) {

            $data = [
                'title' => __('Publicación fallida'),
                'message' => __('Ocurrió un error mientras se publicaba. Por favor intente nuevamente'),
                'close' => __('Cerrar')
            ];

            return $data;
        }
    }

    public function uploadImage(Request $request)
    {
        try {
            $input = [];
            $image_str = $request->img;
            if ($image_str) {

                $png_url = "doctor-" . time() . ".png";
                $path = public_path('/uploads/images/') . $png_url;
                $base64Image = explode(',', $image_str);
                $image = \Image::make($base64Image[1])->encode('jpg', 75);
                $image->resize(500, 500, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path);

                $image_url = \URL::to('/') . "/uploads/images/" . $png_url;
                $image_name = $png_url;

                $data = [
                    'status' => 'success',
                    'message' => __('Imagen subida'),
                    'data' => [
                        'img_url' => $image_url,
                        'img_name' => $image_name
                    ]
                ];
                return response()->json($data);
            }
        } catch (\Exception $ex) {
            $data = [
                'title' => __('Publicación fallida'),
                'message' => __('Ocurrió un error mientras se subía la imagen. Por favor intente nuevamente'),
            ];
            return $ex;
        }
    }
}
