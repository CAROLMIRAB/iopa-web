<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\BackPage\Repositories\AgreementRepo;
use App\BackPage\Collections\AgreementCollection;
use Yajra\DataTables\DataTables;
use App\Core\Core;
use Validator;
use App\Agreement;


class AgreementController extends Controller
{

    private $agreementRepo;
    private $agreementCollection;

    /**
     * Class construct 
     * 
     * @return void
     */
    public function __construct(AgreementRepo $agreementRepo, AgreementCollection $agreementCollection)
    {
        $this->agreementRepo = $agreementRepo;
        $this->agreementCollection = $agreementCollection;
    }

    public function viewAgreement()
    {
        $data = $this->agreementRepo->findAll();
        $datarender = $this->agreementCollection->renderData($data);
        return view('back.agreement.agreement', compact('datarender'));
    }

    public function showAgreement()
    {
        try {
            $data = $this->agreementRepo->findAll();
            return response()->json([
                'status' => 200,
                'title' => '¡Exitoso!',
                'message' => "Se ha encontrado",
                'data' => json_encode($data)
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


    public function saveGes(Request $request)
    {
        try {
            
            $data = $this->agreementRepo->findGes($request->isapre_slug);
            $datarender = $this->agreementCollection->renderGes($request, $data->content);
            $ges = $this->agreementRepo->addGes($request->isapre_slug, json_encode($datarender['full']));

            return response()->json([
                'status' => 200,
                'title' => '¡Exitoso!',
                'message' => "Ha agregado Isapre de forma correcta",
                'data' => json_encode($datarender['isapre'])
            ]);

        } catch (\Exception $ex) {
            \Log::error('AgreementsController.saveGes.catch', ['exception' => $ex]);
            $data = [
                'status' => 400,
                'title' => __('Publicación fallida'),
                'message' => __('Ocurrió un error mientras se agregaba. Por favor intente nuevamente'),
            ];

            return $data;
        }

    }


    public function savePDF(Request $request)
    {
        try {

            $image_url = Core::uploadImageB64($request->imgBase64);
            $img = asset('uploads/images') . '/' . $image_url;

            return response()->json([
                'status' => 200,
                'title' => '¡Exitoso!',
                'message' => "Ha agregado Convenio de forma correcta",
                'data' => $img
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

    public function saveSubConvenio(Request $request)
    {
        try {

            $image_url = Core::uploadImageB64($request->imgBase64);
            $img = asset('uploads/images') . '/' . $image_url;

            return response()->json([
                'status' => 200,
                'title' => '¡Exitoso!',
                'message' => "Ha agregado Convenio de forma correcta",
                'data' => $img
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

    public function saveSubArancel(Request $request)
    {
        try {
            $data = $this->agreementRepo->findFon($request->arancel_slug);
            $datarender = $this->agreementCollection->renderArancel($request, $data->content);
            $ges = $this->agreementRepo->addArancel($request->arancel_slug, json_encode($datarender['full']));

            return response()->json([
                'status' => 200,
                'title' => '¡Exitoso!',
                'message' => "Ha agregado Arancel de forma correcta",
                'data' => json_encode($datarender['arancel'])
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

    public function unsetArancel(Request $request)
    {
        try {
            $data = $this->agreementRepo->findFon($request->slug);
            $arr = json_decode($data->content, true);

            foreach ($arr as $key => $val) {
                if (isset($val[$request->index])) {
                    unset($arr[$key][$request->index]);
                    unset($arr[$key]);
                }
            }

            $ges = $this->agreementRepo->addArancel($request->slug, json_encode($arr));

            return response()->json([
                'status' => 200,
                'title' => '¡Exitoso!',
                'message' => "Ha eliminado arancel de forma correcta"
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


    public function saveSubFonasa(Request $request)
    {
        try {
            $data = $this->agreementRepo->findFon($request->fonasa_slug);
            $datarender = $this->agreementCollection->renderFonasa($request, $data->content);
            $ges = $this->agreementRepo->addFonasa($request->fonasa_slug, json_encode($datarender['full']));

            return response()->json([
                'status' => 200,
                'title' => '¡Exitoso!',
                'message' => "Ha agregado Fonasa de forma correcta",
                'data' => json_encode($datarender['fonasa'])
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

    public function unsetFonasa(Request $request)
    {
        try {
            $data = $this->agreementRepo->findFon($request->slug);
            $arr = json_decode($data->content, true);


            foreach ($arr as $key => $val) {
                if (isset($val[$request->index])) {
                    unset($arr[$key][$request->index]);
                    unset($arr[$key]);
                }
            }
            $ges = $this->agreementRepo->addFonasa($request->slug, json_encode($arr));


            return response()->json([
                'status' => 200,
                'title' => '¡Exitoso!',
                'message' => "Ha eliminado fonasa de forma correcta"
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


    public function unsetIsapre(Request $request)
    {
        try {

            $data = $this->agreementRepo->findGes($request->slug);
            $arr = json_decode($data->content, true);

            foreach ($arr as $key => $val) {
                if (isset($val[$request->index])) {
                    unset($arr[$key][$request->index]);
                    unset($arr[$key]);
                }
            }

            $ges = $this->agreementRepo->addGes($request->slug, json_encode($arr));

            return response()->json([
                'status' => 200,
                'title' => '¡Exitoso!',
                'message' => "Ha eliminado de forma correcta"
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

    public function saveIsapres(Request $request)
    {
        try {
            $ges = $this->agreementRepo->changeAgreement($request->isapre_slug, $request->isapre_title, $request->isapre_description);

            return response()->json([
                'status' => 200,
                'title' => '¡Exitoso!',
                'message' => "Ha Modificado Isapre de forma correcta"
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


    public function saveFonasa(Request $request)
    {
        try {
      
            $img = $request->imgBase64;
          
            $image_url = "";

            if (!is_null($img)) {
                $image_url = Core::uploadImageB64($request->imgBase64);
            }else{
                $image_url = $request->imageurl;
            }

            $ges = $this->agreementRepo->changeAgreement($request->slug, $request->fonasa_title, $request->fonasa_description, $image_url);

            return response()->json([
                'status' => 200,
                'title' => '¡Exitoso!',
                'message' => "Ha Modificado Fonasa de forma correcta"
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

    public function savePromo(Request $request)
    {
        try {
      
            $img = $request->imgBase64;
          
            $image_url = "";

            if (!is_null($img)) {
                $image_url = Core::uploadImageB64($request->imgBase64);
            }else{
                $image_url = $request->imageurl;
            }

            $ges = $this->agreementRepo->changeAgreement($request->slug, $request->promo_title, $request->promo_description, $image_url);

            return response()->json([
                'status' => 200,
                'title' => '¡Exitoso!',
                'message' => "Ha Modificado Promociones de forma correcta"
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

    public function saveArancel(Request $request)
    {
        try {
     
            $img = $request->imgBase64;
          
            $image_url = "";

            if (!is_null($img)) {
                $image_url = Core::uploadImageB64($request->imgBase64);
            }else{
                $image_url = $request->imgurl;
            }

            $ges = $this->agreementRepo->changeAgreement($request->slug, $request->arancel_title, $request->arancel_description, $image_url);

            return response()->json([
                'status' => 200,
                'title' => '¡Exitoso!',
                'message' => "Ha Modificado Aranceles de forma correcta"
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

    public function saveConvenio(Request $request)
    {
        try {
           
            $convenios = json_encode($request->list);
            $ges = $this->agreementRepo->changeConvenio($request->slug, $request->title, $request->description, null, $convenios);
            
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


