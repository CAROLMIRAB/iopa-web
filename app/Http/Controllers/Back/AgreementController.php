<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\BackPage\Repositories\SurgeryRepo;
use App\BackPage\Repositories\OfficeRepo;
use App\BackPage\Collections\SurgeryCollection;
use Yajra\DataTables\DataTables;
use App\Core\Core;
use Validator;
use Yajra\DataTables\Utilities\Request;

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

    public function saveAgreement(Request $request)
    {
       
    }


}


