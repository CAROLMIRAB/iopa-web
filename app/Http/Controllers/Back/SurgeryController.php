<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\BackPage\Repositories\SurgeryRepo;
use App\BackPage\Repositories\OfficeRepo;
use App\BackPage\Collections\SurgeryCollection;
use Yajra\DataTables\DataTables;
use App\Core\Core;
use Validator;

class SurgeryController extends Controller
{

    private $surgeryRepo;
    private $officeRepo;
    private $surgeryCollection;


    /**
     * Class construct 
     * 
     * @return void
     */
    public function __construct(SurgeryRepo $surgeryRepo, SurgeryCollection $surgeryCollection, OfficeRepo $officeRepo)
    {
        $this->surgeryRepo = $surgeryRepo;
        $this->officeRepo = $officeRepo;
        $this->surgeryCollection = $surgeryCollection;
    }

    /**
     * Show create view Surgery
     * 
     * @return view
     */
    public function viewCreateSurgery()
    {
        $offices = $this->officeRepo->showAllOffices();
        return view('back.surgeries.create', compact('offices'));
    }

    /**
     * Show edit view Surgery
     * 
     * @return view
     */
    public function viewEditSurgery(Request $request)
    {
        $surgerydata = $this->surgeryRepo->showSurgerySlug($request->slug);
        $surgery = $this->surgeryCollection->editData($surgerydata);
        $offices = $this->officeRepo->showAllOffices();
        $officessurgery = $this->surgeryRepo->showOfficesSurgery($surgery->id);

        return view('back.surgeries.edit', compact('offices', 'officessurgery', 'surgery'));
    }

    /**
     * Show all surgeries view 
     * 
     * @return view
     */
    public function viewAllSurgeries()
    {
        return view('back.surgeries.surgeries');
    }

    /**
     * Stored Surgery
     * 
     * @return view
     */
    public function saveCreateSurgery(Request $request)
    {
        try {
            $offices = $request->office;
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'slug' => 'required',
                'description' => 'required',
                'image' => 'required',
                'office' => 'required'
            ], [
                'slug.required' => __('Ha ocurrido un error publicando este artículo'),
                'name.required' => __('El título es requerido'),
                'description.required' => __('Debe escribir algo en el cuerpo de la cirugía'),
                'image.required' => __('Debe agregar una imagen destacada'),
                'office.required' => __('Debe agregar las sucursales')
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 400,
                    'title' => '¡Error!',
                    'message' => "Te falta algún campo",
                    'data' => $validator->errors()
                ]);
            }

            if ($request->file('image')) {
                $image_url = Core::uploadImage($request->file('image'));
            }

            $data = array(
                'name' => $request->name,
                'slug' => $request->slug,
                'description' => $request->description,
                'preparation' => $request->preparation,
                'indications' => $request->indications,
                'status' => $request->status,
                'file' => $image_url
            );

            //dd($data);

            $offices = array_map(
                function ($value) {
                    return (int)$value;
                },
                $offices
            );

            if (!empty($image_url)) {
                $surgery = $this->surgeryRepo->createSurgery($data, $offices);
                return response()->json([
                    'status' => 200,
                    'title' => '¡Exitoso!',
                    'message' => "Ha creado la cirugía de forma correcta"
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
     * Edit Surgery
     * 
     * @return view
     */
    public function editSurgery(Request $request)
    {
        try {

            $offices = $request->office;
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'slug' => 'required',
                'office' => 'required',
                'description' => 'required'
            ], [
                'slug.required' => __('Ha ocurrido un error publicando este art´culo'),
                'name.required' => __('El título es requerido'),
                'office.required' => __('Debe agregar las sucursales'),
                'description.required' => __('Debe escribir una descripción para la examen')
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 400,
                    'title' => '¡Error!',
                    'message' => "Te falta algún campo",
                    'data' => $validator->errors()
                ]);
            }

            if ($request->file('image')) {
                $image_url = Core::uploadImage($request->file('image'));
            }

            $offices = array_map(
                function ($value) {
                    return (int)$value;
                },
                $offices
            );

            if (!empty($image_url)) {
                $data = array(
                    'name' => $request->name,
                    'slug' => $request->slug,
                    'description' => $request->description,
                    'preparation' => $request->preparation,
                    'indications' => $request->indications,
                    'status' => $request->status,
                    'file' => $image_url
                );

            } else {
                $data = array(
                    'name' => $request->name,
                    'slug' => $request->slug,
                    'description' => $request->description,
                    'preparation' => $request->preparation,
                    'indications' => $request->indications,
                    'status' => $request->status

                );
            }

            if ($data) {
    
           $surgery = $this->surgeryRepo->editSurgeryById($data, $request->id_surgery, $offices);

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
     * Show all surgeries 
     * 
     * @return $surgeries
     */
    public function allSurgeries()
    {
        $surgeries = $this->surgeryRepo->showAllSurgeries();
        $surgeries = $this->surgeryCollection->allSurgeryCollect($surgeries);

        return Datatables::of($surgeries)->make(true);
    }

    public function changeStatus(Request $request)
    {
        $surgeries = $this->surgeryRepo->changeStatusById($request->status, $request->id);
       
        return $surgeries;
    }
}


