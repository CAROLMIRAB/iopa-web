<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\BackPage\Repositories\SpecialtyRepo;
use App\BackPage\Collections\SpecialtyCollection;
use Yajra\DataTables\DataTables;
use App\Core\Core;
use Validator;

class SpecialtyController extends Controller
{

    private $specialtyRepo;
    private $specialtyCollection;


    /**
     * Class construct 
     * 
     * @return void
     */
    public function __construct(SpecialtyRepo $specialtyRepo, SpecialtyCollection $specialtyCollection)
    {
        $this->specialtyRepo = $specialtyRepo;
        $this->specialtyCollection = $specialtyCollection;
    }

    /**
     * Show create view Specialty
     * 
     * @return view
     */
    public function viewCreateSpecialty()
    {
        return view('back.specialties.create');
    }

    /**
     * Show edit view Specialty
     * 
     * @return view
     */
    public function viewEditSpecialty(Request $request)
    {
        $specialtydata = $this->specialtyRepo->showSpecialtySlug($request->slug);
        $specialty = $this->specialtyCollection->editData($specialtydata);

        return view('back.specialties.edit', compact('specialty'));
    }

    /**
     * Show all specialties view 
     * 
     * @return view
     */
    public function viewAllSpecialties()
    {
        return view('back.specialties.specialties');
    }

    /**
     * Stored Specialty
     * 
     * @return view
     */
    public function saveCreateSpecialty(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'slug' => 'required',
                'body' => 'required'
            ], [
                'slug.required' => __('Ha ocurrido un error publicando este artículo'),
                'name.required' => __('El título es requerido'),
                'body.required' => __('Debe escribir una descripción')
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 400,
                    'title' => '¡Error!',
                    'message' => "Te falta algún campo",
                    'data' => $validator->errors()
                ]);
            }
            $image_url = "";

            if ($request->file('image')) {
                $image_url = Core::uploadImage($request->file('image'));
            }

            $data = array(
                'name' => $request->name,
                'slug' => $request->slug,
                'body' => $request->body,
                'status' => $request->status,
                'file' => $image_url
            );

                $specialty = $this->specialtyRepo->createSpecialty($data);
                return response()->json([
                    'status' => 200,
                    'title' => '¡Exitoso!',
                    'message' => "Ha creado la especialidad de forma correcta"
                ]);

        } catch (\Exception $ex) {

            $data = [
                'title' => __('Publicación fallida'),
                'message' => __('Ocurrió un error mientras se publicaba su post. Por favor intente nuevamente'),
            ];

            return response()->json($data);
        }
    }

    /**
     * Edit Specialty
     * 
     * @return view
     */
    public function editSpecialty(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'slug' => 'required',
                'body' => 'required'
            ], [
                'slug.required' => __('Ha ocurrido un error publicando este artículo'),
                'name.required' => __('El título es requerido'),
                'body.required' => __('Debe escribir una descripción')
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 400,
                    'title' => '¡Error!',
                    'message' => "Te falta algún campo",
                    'data' => $validator->errors()
                ]);
            }

            $image_url = "";
            
            if ($request->file('image')) {
                $image_url = Core::uploadImage($request->file('image'));
            }

            if (!empty($image_url)) {
      
                $data = array(
                    'name' => $request->name,
                    'slug' => $request->slug,
                    'body' => $request->body,
                    'status' => $request->status,
                    'file' => $image_url
                );

            }else{
                $data = array(
                    'name' => $request->name,
                    'slug' => $request->slug,
                    'body' => $request->body,
                    'status' => $request->status,
                );

            }

            if ($data) {
    
           $specialty = $this->specialtyRepo->editSpecialtyById($data, $request->id_specialty);

                return response()->json([
                    'status' => 200,
                    'title' => '¡Exitoso!',
                    'message' => "Ha modificado la cirugía de forma correcta"
                ]);

            }
        } catch (\Exception $ex) {

            $data = [
                'title' => __('Publicación fallida'),
                'message' => __('Ocurrió un error mientras se publicaba su post. Por favor intente nuevamente'),
            ];

            return response()->json($data);
        }
    }

    /**
     * Show all specialties 
     * 
     * @return $specialties
     */
    public function allSpecialties()
    {
        try{
        $specialties = $this->specialtyRepo->showAllSpecialties();
        $specialties = $this->specialtyCollection->allSpecialtyCollect($specialties);
        }catch(\Exception $ex){
         dd($ex);
        }
        return Datatables::of($specialties)->make(true);
    }

    public function changeStatus(Request $request)
    {
        $specialties = $this->specialtyRepo->changeStatusById($request->status, $request->id);
       
        return $specialties;
    }
}


