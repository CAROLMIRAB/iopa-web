<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BackPage\Collections\CoreCollection;
use App\BackPage\Repositories\CoreRepo;
use App\Core\Core;

class CoreController extends Controller
{

    private $coreRepo;
    private $coreCollection;

     /**
     * Class construct 
     * 
     * @return void
     */
    public function __construct(CoreRepo $coreRepo, CoreCollection $coreCollection)
    {
        $this->coreRepo = $coreRepo;
        $this->coreCollection = $coreCollection;
    }

    /**
     * Make slug all pages
     * 
     * @return json
     */
    public function titleAndSlug(Request $request)
    {
        $slug = Core::titleAndSlug($request);

        $data = [
            'status' => 'success',
            'message' => __('Slug creado'),
            'data' => [
                'slug' => $slug
            ]
        ];

        return response()->json($data);
    }

    /**
     * Description of pages web
     * 
     * @return json
     */
    public function descriptionPages(Request $request)
    {
        $data = $this->coreRepo->findConf($request->descriptions_slug);
        $datarender = $this->coreCollection->renderDescriptionPage($request, $data);

        return response()->json([
            'status' => 200,
            'title' => '¡Exitoso!',
            'message' => "Ha modificado las descripciones de forma correcta",
            'data' => json_encode($datarender['generalPages'])
        ]);

    }

    /**
     * Show all configurations
     * 
     * @return json
     */
    public function showAllConfigurations(Request $request)

    {
        $data = $this->coreRepo->findAll();
        $datarender = $this->coreCollection->renderDescriptionPage($request, $data);
        return view('back.configuration.configurations', compact('datarender'));
    }

    public function addSlides(Request $request)
    {
        try {

            $image_url = Core::uploadImageB64($request->imgBase64);
            $img = asset('uploads/images') . '/' . $image_url;
            $description = $request->slide_description;

            return response()->json([
                'status' => 200,
                'title' => '¡Exitoso!',
                'message' => "Ha agregado un slide de forma correcta",
                'data' => [
                    'image' => $img,
                    'description' => $description
                ]
            ]);

        } catch (\Exception $ex) {
            $data = [
                'status' => 400,
                'title' => __('Publicación fallida'),
                'message' => __('Ocurrió un error mientras se agregaba. Por favor intente nuevamente'),
            ];

            return $data;
        }

    }

    public function saveSlides(Request $request)
    {
        try {
            $slides = is_null($request->list) ? '[]' : json_encode($request->list);
            $slide = $this->coreRepo->changeConfiguration($request->slug, $slides);
            
            return response()->json([
                'status' => 200,
                'title' => '¡Exitoso!',
                'message' => "Ha agregado el Convenio de forma correcta"
            ]);

        } catch (\Exception $ex) {
            $data = [
                'status' => 400,
                'title' => __('Publicación fallida'),
                'message' => __('Ocurrió un error mientras se agregaba. Por favor intente nuevamente'),
            ];

            return $data;
        }
    }


}
