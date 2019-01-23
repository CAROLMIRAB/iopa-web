<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\BackPage\Repositories\DoctorRepo;
use App\BackPage\Repositories\OfficeRepo;
use Validator;
use App\BackPage\Collections\DoctorCollection;
use Yajra\DataTables\DataTables;
use App\Core\Core;

class DoctorController extends Controller
{

    private $doctorRepo;
    private $officeRepo;
    private $doctorCollection;

    /**
     * Class construct 
     * 
     * @return void
     */
    public function __construct(DoctorRepo $doctorRepo, DoctorCollection $doctorCollection, OfficeRepo $officeRepo)
    {
        $this->doctorRepo = $doctorRepo;
        $this->doctorCollection = $doctorCollection;
        $this->officeRepo = $officeRepo;
    }

    /**
     * View doctor create
     * 
     * @return view
     */
    public function viewCreateDoctor()
    {
        $specialties = $this->doctorRepo->showAllSpecialties();
        $offices = $this->officeRepo->showAllOffices();
        return view('back.doctors.create', compact('specialties', 'offices'));
    }

    /**
     * View doctor edit
     * 
     * @return view
     */
    public function viewEditDoctor(Request $request)
    {
        $doctors = $this->doctorRepo->showDoctorSlug($request->slug);
        $doctor = $this->doctorCollection->editData($doctors);
        $specialties = $this->doctorRepo->showAllSpecialties();
        $offices = $this->officeRepo->showAllOffices();
        $officesdoctor = $this->doctorRepo->showOfficesDoctor($doctor->id);

        return view('back.doctors.edit', compact('specialties', 'offices', 'doctor', 'officesdoctor'));
    }

    /**
     * Show all doctors 
     * 
     * @return $doctors
     */
    public function allDoctors()
    {
        $doctors = $this->doctorRepo->showAllDoctors();
        $doctor = $this->doctorCollection->allDoctorCollect($doctors);
        $data = [
            'title' => __('Publicación fallida'),
            'message' => __('No se pudo obtener los post'),
            'data' => $doctor
        ];

        return Datatables::of($doctor)->make(true);

    }

    /**
     * Show all doctors view 
     * 
     * @return view
     */
    public function viewAllDoctors()
    {
        return view('back.doctors.doctors');
    }

    /**
     * Stored post
     * 
     * @return json
     */
    public function saveCreateDoctor(Request $request)
    {
        try {
            $image_url = $request->imgurl;
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'lastname' => 'required',
                'excerpt' => 'required',
                'office' => 'required',
                'specialty_id' => 'required',
            ], [
                'name.required' => __('El nombre es requerido'),
                'lastname.required' => __('El apellido es requerido'),
                'excerpt.required' => __('Debe escribir un extracto'),
                'office.required' => __('Debes agregar alguna sucursal'),
                'specialty_id' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 400,
                    'title' => '¡Error!',
                    'message' => "Te falta algún campo",
                    'data' => $validator->errors()
                ]);
            }

            if (!empty($image_url)) {

                $data = array(
                    'name' => $request->name,
                    'lastname' => $request->lastname,
                    'excerpt' => $request->excerpt,
                    'phone' => $request->phone,
                    'specialty_id' => $request->specialty_id,
                    'file' => $image_url,
                    'slug' => $request->slug
                );

                $post = $this->doctorRepo->createDoctor($data, $request->office);

                return response()->json([
                    'status' => 200,
                    'title' => '¡Exitoso!',
                    'message' => "Ha creado un doctor de forma correcta"
                ]);
            }
        } catch (\Exception $ex) {

            $data = [
                'title' => __('Publicación fallida'),
                'message' => __('Ocurrió un error mientras se publicaba. Por favor intente nuevamente'),
                'close' => __('Cerrar')
            ];

            return $data;
        }
    }

    /**
     * Stored post
     * 
     * @return view
     */
    public function editDoctor(Request $request)
    {
        try {
            $image_url = $request->imgurl;
            $offices = $request->office;

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
                return response()->json([
                    'status' => 400,
                    'title' => '¡Error!',
                    'message' => "Te falta algún campo",
                    'data' => $validator->errors()
                ]);
            }

            $data = array(
                'name' => $request->name,
                'lastname' => $request->lastname,
                'excerpt' => $request->excerpt,
                'phone' => $request->phone,
                'specialty_id' => $request->specialty_id,
                'file' => $image_url,
                'slug' => $request->slug
            );

            if (!empty($image_url)) {

                $offices = array_map(
                    function ($value) {
                        return (int)$value;
                    },
                    $offices
                );

                $doctor = $this->doctorRepo->editDoctorById($data, $request->id_doctor, $offices);
                return response()->json([
                    'status' => 200,
                    'title' => '¡Exitoso!',
                    'message' => "Ha editado el doctor de forma correcta"
                ]);
            }

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


                $destinationPath = public_path('/uploads/thumbnail') . $png_url;
                $img = \Image::make($base64Image[1])->encode('jpg', 75);
                $img->resize(100, 100, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath);

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
