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
        return view('back.agreement.agreement');
    }

    public function saveGes(Request $request)
    {
        try {
            $data = $this->agreementRepo->findGes($request->isapre_slug);
            $datarender = Core::renderGes($request, $data->content);
            $ges = $this->agreementRepo->addGes($request->isapre_slug, json_encode($datarender['full']));

            return response()->json([
                'status' => 200,
                'title' => '¡Exitoso!',
                'message' => "Ha agregado Isapre de forma correcta",
                'data' => json_encode($datarender['isapre'])
            ]);

        } catch (\Exception $ex) {
            $data = [
                'title' => __('Publicación fallida'),
                'message' => __('Ocurrió un error mientras se agregaba. Por favor intente nuevamente'),
                'close' => __('Cerrar')
            ];

            return $data;
        }

    }

    public function saveSubFonasa(Request $request)
    {
        try {
            $data = $this->agreementRepo->findFon($request->fonasa_slug);
            $datarender = Core::renderFonasa($request, $data->content);
            $ges = $this->agreementRepo->addGes($request->isapre_slug, json_encode($datarender['full']));

            return response()->json([
                'status' => 200,
                'title' => '¡Exitoso!',
                'message' => "Ha agregado Isapre de forma correcta",
                'data' => json_encode($datarender['isapre'])
            ]);

        } catch (\Exception $ex) {
            $data = [
                'title' => __('Publicación fallida'),
                'message' => __('Ocurrió un error mientras se agregaba. Por favor intente nuevamente'),
                'close' => __('Cerrar')
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
                'message' => "Ha agregado Isapre de forma correcta"
            ]);

        } catch (\Exception $ex) {
            $data = [
                'title' => __('Publicación fallida'),
                'message' => __('Ocurrió un error mientras se agregaba. Por favor intente nuevamente'),
                'close' => __('Cerrar')
            ];

            return $data;
        }

    }

    public function saveIsapres(Request $request)
    {
        try {

            $ges = $this->agreementRepo->changeIsapre($request->slug, $request->name, $request->description);

            return response()->json([
                'status' => 200,
                'title' => '¡Exitoso!',
                'message' => "Ha Modificado Isapre de forma correcta"
            ]);

        } catch (\Exception $ex) {
            $data = [
                'title' => __('Publicación fallida'),
                'message' => __('Ocurrió un error mientras se agregaba. Por favor intente nuevamente'),
                'close' => __('Cerrar')
            ];

            return $data;
        }

    }



}


