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
     * View post create
     * 
     * @return view
     */
    public function viewCreateDoctor()
    {
        $specialties = $this->doctorRepo->showAllSpecialties();
        return view('back.doctors.create', compact('specialties'));
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
                'excerpt' => 'required',
                'specialty_id' => 'required',
            ], [
                'name.required' => __('El título es requerido'),
                'excerpt.required' => __('Debe escribir un extracto'),
                'specialty_id' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator, 'valid')
                    ->withInput();
            }

            $data = array(
                'name' => $request->name,
                'excerpt' => $request->excerpt,
                'phone' => $request->phone,
                'specialty_id' => $request->specialty_id,
                'file' => $image_url
            );

            if (!empty($image_url)) {
                $post = $this->doctorRepo->createDoctor($data);
            }

           return redirect()->back();

        } catch (\Exception $ex) {

            $data = [
                'title' => __('Publicación fallida'),
                'message' => __('Ocurrió un error mientras se publicaba su vehículo. Por favor intente nuevamente'),
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

                $data = [
                    'status' => true,
                    'message' => __('Imagen subida'),
                    'img' => $image_url
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
