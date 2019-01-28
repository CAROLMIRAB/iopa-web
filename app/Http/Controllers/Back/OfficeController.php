<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\BackPage\Repositories\OfficeRepo;
use Yajra\DataTables\DataTables;
use App\BackPage\Collections\OfficeCollection;
use App\Core\Core;
use Validator;

class OfficeController extends Controller
{

    private $officeRepo;
    private $officeCollection;

    /**
     * Class construct 
     * 
     * @return void
     */
    public function __construct(OfficeRepo $officeRepo, OfficeCollection $officeCollection)
    {
        $this->officeRepo = $officeRepo;
        $this->officeCollection = $officeCollection;
    }

    /**
     * Show all exams view 
     * 
     * @return view
     */
    public function viewAllOffices()
    {
        return view('back.offices.offices');
    }

    /**
     * View office create
     * 
     * @return view
     */
    public function viewCreateOffice()
    {
        return view('back.offices.create');
    }

    /**
     * View office create
     * 
     * @return view
     */
    public function viewEditOffice(Request $request)
    {
        $officedata = $this->officeRepo->showOfficeSlug($request->slug);
        $office = $this->officeCollection->editData($officedata);
        return view('back.offices.edit', compact('office'));
    }

    /**
     * Office find office
     * 
     * @return var
     */
    public function findOffice(Request $request)
    {
        $offices = $this->officeRepo->findOffices($request->q);
        $data = [
            'code' => 200,
            'data' => [
                'tags' => $offices
            ]
        ];
        return response()->json($data);
    }

    /**
     * Stored office
     * 
     * @return json
     */
    public function saveCreateOffice(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'map' => 'required',
                'phone' => 'required',
                'address' => 'required'
            ], [
                'name.required' => _('El nombre de la sucursal es requerido'),
                'map.required' => _('El mapa de la sucursal es requerido'),
                'phone.required' => _('El teléfono de la sucursal es requerido'),
                'address.required' => _('La dirección de la sucursal es requerido')
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
                'photo' => $image_url,
                'map' => $request->map,
                'address' => $request->address,
                'phone' => $request->phone
            );

            if (!empty($image_url)) {
                $office = $this->officeRepo->createOffice($data);

                return response()->json([
                    'status' => 200,
                    'title' => '¡Exitoso!',
                    'message' => "Ha creado la sucursal de forma correcta"
                ]);
            }

        } catch (\Exception $ex) {

            $data = [
                'title' => __('Publicación fallida'),
                'message' => __('Ocurrió un error mientras se publicaba la sucursal. Por favor intente nuevamente'),
                'close' => __('Cerrar')
            ];

            return $data;
        }
    }

    /**
     * Edit office
     * 
     * @return json
     */
    public function editOffice(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'map' => 'required',
                'phone' => 'required',
                'address' => 'required'
            ], [
                'name.required' => _('El nombre de la sucursal es requerido'),
                'map.required' => _('El mapa de la sucursal es requerido'),
                'phone.required' => _('El teléfono de la sucursal es requerido'),
                'address.required' => _('La dirección de la sucursal es requerido')
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
            if (!empty($image_url)) {
                $data = array(
                    'name' => $request->name,
                    'photo' => $image_url,
                    'map' => $request->map,
                    'address' => $request->address,
                    'phone' => $request->phone
                );
            } else {
                $data = array(
                    'name' => $request->name,
                    'map' => $request->map,
                    'address' => $request->address,
                    'phone' => $request->phone
                );
            }

            if ($data) {
                $office = $this->officeRepo->editOfficeById($request->id_office, $data);
                return response()->json([
                    'status' => 200,
                    'title' => '¡Exitoso!',
                    'message' => "Ha creado la sucursal de forma correcta"
                ]);
            }

        } catch (\Exception $ex) {

            $data = [
                'title' => __('Publicación fallida'),
                'message' => __('Ocurrió un error mientras se publicaba la sucursal. Por favor intente nuevamente'),
                'close' => __('Cerrar')
            ];

            return $data;
        }
    }

    /**
     * Show all offices
     * 
     * @return $office
     */
    public function allOffices()
    {
        $offices = $this->officeRepo->showAllOffices();
        $offices = $this->officeCollection->allOfficeCollect($offices);
        $data = [
            'title' => __('Publicación fallida'),
            'message' => __('No se pudo obtener los post'),
            'data' => $offices
        ];

        return Datatables::of($offices)->make(true);
    }

}
