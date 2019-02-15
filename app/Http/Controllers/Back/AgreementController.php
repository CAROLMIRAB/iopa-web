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
        $data = $this->agreementRepo->findGes($request->slug);
        $datarender = Core::renderGes($request);
       
       // $ges = $this->agreementRepo->addGes();
        return response()->json([
            'status' => 200,
            'title' => '¡Exitoso!',
            'message' => "Ha modificado la cirugía de forma correcta",
            'data' => $datarender
        ]);
    }



}


