<?php

namespace App\BackPage\Repositories;

use Illuminate\Support\Facades\DB;
use App\Specialty;
use App\Office;
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
        $doctor = Doctor::orderBy('id', 'DESC')->get();
        return $doctor;
    }

    public function showAllSpecialties()
    {
        $specialty = Specialty::orderBy('name', 'ASC')->get();
        return $specialty;
    }










}