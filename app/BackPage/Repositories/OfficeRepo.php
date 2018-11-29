<?php

namespace App\BackPage\Repositories;

use Illuminate\Support\Facades\DB;
use App\Specialty;
use App\Office;
use App\Doctor;


class OfficeRepo
{
    
    public function createOffice($data)
    {
        $doctor = new Office();
        $doctor->fill($data);
        $doctor->save();
        return $doctor;
    }

}