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
        //$categories = $this->doctorRepo->allCategories();
        return view('back.doctors.create');
    }

    /**
     * Stored post
     * 
     * @return view
     */
    public function saveCreateDoctor(Request $request)
    {
        try {
            
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'excerpt' => 'required',
                'specialty_id' => 'required',
            ],[
                'name.required' => __('El título es requerido'),
                'excerpt.required' => __('Debe escribir un extracto'),
                'specialty_id' => 'required',
            ]);
    
            if ($validator->fails()) {
                return redirect()->back()
                            ->withErrors($validator, 'valid')
                            ->withInput();
            }

            $image_url = "";
          
            if ($request->file('image')) {

                $input = [];

                $image = $request->file('image');
                $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();


                $destinationPath = public_path('/uploads/thumbnail');
                $img = \Image::make($image->getRealPath());
                $img->resize(100, 100, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . '/' . $input['imagename']);


                $destinationPath = public_path('/uploads/images');
                $image->move($destinationPath, $input['imagename']);

                $image_url = \URL::to('/') . "/uploads/images/" . $input['imagename'];
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
}
