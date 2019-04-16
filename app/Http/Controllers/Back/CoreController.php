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
        $datarender = $this->coreCollection->renderData($data);
        return view('back.configuration.configurations', compact('datarender'));
    }

    public function addQueries(Request $request)
    {
        try {

            $image_url = Core::uploadImageB64($request->imgBase64);
            $img = asset('uploads/images') . '/' . $image_url;
            $description = $request->query_description;
            $title = $request->query_title;

            return response()->json([
                'status' => 200,
                'title' => '¡Exitoso!',
                'message' => "Ha agregado un slide de forma correcta",
                'data' => [
                    'image' => $img,
                    'description' => $description,
                    'title' => $title

                ]
            ]);

        } catch (\Exception $ex) {
           
            $data = [
                'status' => 400,
                'title' => __('Publicación fallida'),
                'message' => __('Ocurrió un error mientras se agregaba. Por favor intente nuevamente'),
                'error' => $ex
            ];

            return $data;
        }

    }

    public function saveQuery(Request $request)
    {
        try {
           
            $slides = is_null($request->list) ? '[]' : json_encode($request->list);
            $slide = $this->coreRepo->changeConfiguration($request->slug, $slides);
            
            return response()->json([
                'status' => 200,
                'title' => '¡Exitoso!',
                'message' => "Ha guardado los slides de forma correcta"
            ]);

        } catch (\Exception $ex) {
            dd($ex);
            $data = [
                'status' => 400,
                'title' => __('Publicación fallida'),
                'message' => __('Ocurrió un error mientras se agregaba. Por favor intente nuevamente'),
            ];

            return $data;
        }
    }

    public function addSlides(Request $request)
    {
        try {

            $image_url = Core::uploadImageB64($request->imgBase64);
            $img = asset('uploads/images') . '/' . $image_url;
            $description = $request->slide_description;
            $title = $request->slide_title;

            return response()->json([
                'status' => 200,
                'title' => '¡Exitoso!',
                'message' => "Ha agregado un slide de forma correcta",
                'data' => [
                    'image' => $img,
                    'description' => $description,
                    'title' => $title

                ]
            ]);

        } catch (\Exception $ex) {
           
            $data = [
                'status' => 400,
                'title' => __('Publicación fallida'),
                'message' => __('Ocurrió un error mientras se agregaba. Por favor intente nuevamente'),
                'error' => $ex
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
                'message' => "Ha guardado los slides de forma correcta"
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


    public function savePagesDescription(Request $request)
    {
        try {
            $query = $this->coreCollection->renderDescriptionPage($request);
            $slide = $this->coreRepo->changeConfiguration($request->slug, $query);
          
            return response()->json([
                'status' => 200,
                'title' => '¡Exitoso!',
                'message' => "Ha guardado los cambios de forma correcta"
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

    public function saveAboutUs(Request $request)
    {
        try {
            $aboutus = $request->aboutus_description;
            $data = $this->coreCollection->renderText($aboutus);
            $slide = $this->coreRepo->changeConfiguration($request->slug, $data);
          
            return response()->json([
                'status' => 200,
                'title' => '¡Exitoso!',
                'message' => "Ha guardado los cambios de forma correcta"
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

    public function saveContact(Request $request)
    {
        try {
            $contact = $request->contact_description;
            $data = $this->coreCollection->renderText($contact);
            $slide = $this->coreRepo->changeConfiguration($request->slug, $data);
          
            return response()->json([
                'status' => 200,
                'title' => '¡Exitoso!',
                'message' => "Ha guardado los cambios de forma correcta"
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
