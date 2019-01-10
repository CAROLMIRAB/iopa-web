<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\BackPage\Repositories\OfficeRepo;
use App\Http\Controllers\Back\CoreController;
use Validator;

class OfficeController extends Controller
{

    private $officeRepo;

    /**
     * Class construct 
     * 
     * @return void
     */
    public function __construct(OfficeRepo $officeRepo)
    {
        $this->officeRepo = $officeRepo;
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
     * @return view
     */
    public function saveCreateOffice(Request $request)
    {
        try {
            $image_url = $request->imgurl;
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
                return redirect()->back()
                    ->withErrors($validator, 'valid')
                    ->withInput();
            }

            if ($request->file('image')) {
                $image_url = CoreController::uploadImage($request->file('image'));
            }

            $data = array(
                'name' => $request->name,
                'photo' => $image_url,
                'map' => $request->map,
                'address' => $request->address,
                'phone' => $request->phone
            );

            if (!empty($image_url)) {
                $post = $this->officeRepo->createOffice($data);
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

}
