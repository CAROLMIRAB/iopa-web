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

class AgreementController extends Controller
{

    private $surgeryRepo;
    private $officeRepo;
    private $surgeryCollection;


    /**
     * Class construct 
     * 
     * @return void
     */
    public function __construct(SurgeryRepo $surgeryRepo, SurgeryCollection $surgeryCollection, OfficeRepo $officeRepo)
    {
        $this->surgeryRepo = $surgeryRepo;
        $this->officeRepo = $officeRepo;
        $this->surgeryCollection = $surgeryCollection;
    }

   public function viewAgreement(){
    return view('back.agreement.agreement');
   }
}


