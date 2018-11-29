<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\BackPage\Repositories\OfficeRepo;
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
     * View post create
     * 
     * @return view
     */
    public function viewCreateOffice()
    {
        return view('back.offices.create');
    }

    /**
     * Stored post
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

                $input = [];

                $image = $request->file('image');
                $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();

                $destinationPath = public_path('/uploads/thumbnail');
                $img = \Image::make($image->getRealPath());
    
                $destinationPath = public_path('/uploads/images');
                $image->move($destinationPath, $input['imagename']);

                $image_url = \URL::to('/') . "/uploads/images/" . $input['imagename'];
            }

            $post = $this->officeRepo->createOffice($data);

            $img = \Image::make($temp);
            $img->save($full);



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
                $path = public_path('/uploads/temp/') . $png_url;
                $base64Image = explode(',', $image_str);
                $image = \Image::make($base64Image[1])->encode('jpg', 75);
                $image->resize(500, 500, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path);

                $image_url = \URL::to('/') . "/uploads/images/" . $png_url;
                $image_name = $png_url;

                $data = [
                    'status' => true,
                    'message' => __('Imagen subida'),
                    'img_url' => $image_url,
                    'img_name' => $image_name
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
