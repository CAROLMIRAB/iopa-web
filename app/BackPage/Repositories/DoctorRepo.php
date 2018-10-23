<?php

namespace App\BackPage\Repositories;

use Illuminate\Support\Facades\DB;
use App\Category;
use App\Post;
use App\Doctor;


class DoctorRepo
{

    public function createDoctor($data)
    {
        $doctor = new Doctor();
        $doctor->fill($data);
        $doctor->save();
        return $doctor;
    }

    public function showDoctors()
    {
        $doctor = Doctor::orderBy('id', 'DESC')->where('status', 'PUBLISHED')->get();
        return $doctor;
    }

    

  



  


}