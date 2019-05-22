<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BackPage\Collections\CoreCollection;
use App\BackPage\Repositories\CoreRepo;
use App\BackPage\Repositories\OfficeRepo;

use App\Core\Core;
use Illuminate\Support\Facades\Mail;
use App\Mail\FormOpinion;
use App\Mail\FormRequest;
use Yajra\DataTables\Facades\DataTables;

class CoreController extends Controller
{

    private $coreRepo;
    private $coreCollection;
    private $officeRepo;

     /**
     * Class construct 
     * 
     * @return void
     */
    public function __construct(CoreRepo $coreRepo, CoreCollection $coreCollection, OfficeRepo $officeRepo)
    {
        $this->coreRepo = $coreRepo;
        $this->coreCollection = $coreCollection;
        $this->officeRepo = $officeRepo;
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
     * Show RRSS
     * 
     * @return json
     */
    public function rrss(Request $request)
    {
        $data = $this->coreRepo->findConf($request->rrss_slug);
        $datarender = $this->coreCollection->renderRRSS($request, $data);

        return response()->json([
            'status' => 200,
            'title' => '¡Exitoso!',
            'message' => "Ha modificado las descripciones de forma correcta",
            'data' => json_encode($datarender['rrss'])
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
        $offices = $this->officeRepo->showAllOffices();
        return view('back.configuration.configurations', compact('datarender', 'offices'));
    }

    public function addQueries(Request $request)
    {
        try {
            $image_url = Core::uploadImageB64($request->imgBase64);
            $img = $image_url;
            $imgurl = asset('uploads/images') . '/' . $image_url;
            $description = $request->query_description;
            $title = $request->query_title;

            return response()->json([
                'status' => 200,
                'title' => '¡Exitoso!',
                'message' => "Ha agregado un slide de forma correcta",
                'data' => [
                    'imgurl' => $imgurl,
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
            $img = $image_url;
            $imgurl = asset('uploads/images') . '/' .$image_url;
            $description = $request->slide_description;
            $title = $request->slide_title;

            return response()->json([
                'status' => 200,
                'title' => '¡Exitoso!',
                'message' => "Ha agregado un slide de forma correcta",
                'data' => [
                    'imgurl' => $imgurl,
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


    public function uploadImage(Request $request)
    {
       
            $image_url = Core::uploadImageB64($request->base64);
            $images = Core::saveImagesGallery($image_url);
            $imgurl = asset('uploads/images/'.$image_url);
         

            return response()->json([
                'status' => 200,
                'title' => '¡Exitoso!',
                'message' => "Ha agregado un slide de forma correcta",
                'data' => [
                    'imgurl' => $imgurl,
                    'image' => $image_url

                ]
            ]);

    }

    public function galleryImages()
    {       
            
            $images = Core::imagesGallery();
            $imgcollect = $this->coreCollection->collectImage($images);

            return response()->json([
                'status' => 200,
                'title' => '¡Exitoso!',
                'message' => "Todas las imágenes",
                'data' => [
                    'images' => $imgcollect
                ]
            ]);
    }

    public function galleryImagesAll()
    {       
            
            $images = Core::imagesGallery();
            $imgcollect = $this->coreCollection->collectImage($images);

            return Datatables::of($imgcollect)->make(true);
    }

    public function saveImagesGallery(Request $request)
    {
        try {
                   
            $images = Core::saveImagesGallery($request);

            return response()->json([
                'status' => 200,
                'title' => '¡Exitoso!',
                'message' => "Ha agregado un slide de forma correcta",
                'data' => [
                    'images' => $images
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
            $slides = is_null($request->list) ? '[]' : json_encode(['slides' => $request->list]);
            $slide = $this->coreRepo->changeConfiguration($request->slug, $slides);
            $specialty = $this->coreRepo->changeConfiguration('specialties-home', json_encode($request->specialty));
            
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

    public function saveRRSS(Request $request)
    {
        try {
            $query = $this->coreCollection->renderRRSS($request);
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
            $offices = $this->officeRepo->showAllOffices();
            $data = $this->coreCollection->renderContact($offices, $request);
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

    public function savePopup(Request $request)
    {
        try {
            $popup = $request->popup_description;
            $status = $request->status;
            $data = $this->coreCollection->renderPopup($popup, $status);
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


    public function saveSubPolitica(Request $request)
    {
        try {
            
            $data = $this->coreRepo->findConfigSlug($request->slug);
            $datarender = $this->coreCollection->renderPolitica($request, $data->content);
            $ges = $this->coreRepo->addPolitica($request->slug, json_encode($datarender['full']));

            return response()->json([
                'status' => 200,
                'title' => '¡Exitoso!',
                'message' => "Ha agregado Politica de forma correcta",
                'data' => json_encode($datarender['politica'])
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

    public function unsetPolitica(Request $request)
    {
        try {
            $data = $this->coreRepo->findConfigSlug($request->slug);
            $arr = json_decode($data->content, true);

            foreach ($arr as $key => $val) {
                if (isset($val[$request->index])) {
                    unset($arr[$key][$request->index]);
                    unset($arr[$key]);
                }
            }

            $ges = $this->coreRepo->addPolitica($request->slug, json_encode($arr));

            return response()->json([
                'status' => 200,
                'title' => '¡Exitoso!',
                'message' => "Ha eliminado politica de forma correcta"
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

    public function homeConfig(Request $request)
    {
        try {
            $slide = $this->coreRepo->changeConfiguration($request->slug, json_encode($request->specialty));

            return response()->json([
                'status' => 200,
                'title' => '¡Exitoso!',
                'message' => "Ha agregado specialty de forma correcta"
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

     /**
     * Show all images view 
     * 
     * @return view
     */
    public function viewAllImages()
    {
        return view('back.core.images');
    }
}
