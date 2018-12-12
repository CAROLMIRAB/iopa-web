<?php

namespace App\BackPage\Repositories;

use Illuminate\Support\Facades\DB;
use App\Office;


class SurgeryRepo
{

    public function createDoctor($data, $offices)
    {
        $doctor = new Doctor();
        $doctor->fill($data);
        $doctor->save();

        $doctor->offices()->attach($offices);
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

    public function showAllOffices()
    {
        $office = Office::orderBy('name', 'ASC')->get();
        return $office;
    }










}