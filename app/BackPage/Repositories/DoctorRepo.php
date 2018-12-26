<?php

namespace App\BackPage\Repositories;

use Illuminate\Support\Facades\DB;
use App\Specialty;
use App\Office;
use App\Doctor;


class DoctorRepo
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

    public function showAllDoctors()
    {
        $doctor = Doctor::select('doctors.id', 'doctors.name', 'lastname', 'phone', 'excerpt', 'file', DB::raw('specialties.name as specialty'), 'doctors.created_at', 'doctors.slug')
        ->leftJoin('specialties', 'specialties.id', '=', 'doctors.specialty_id')
        ->orderBy('id', 'DESC')
        ->get();
        return $doctor;
    }

    public function showDoctorSlug($slug)
    {
        $doctor = Doctor::select('doctors.id', 'doctors.name', 'lastname', 'phone', 'excerpt', 'file', DB::raw('specialties.name as specialty'), 'doctors.created_at')
        ->leftJoin('specialties', 'specialties.id', '=', 'doctors.specialty_id')
        ->orderBy('id', 'DESC')
        ->where('doctors.slug', $slug)
        ->first();
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

    public function showOfficesDoctor($id)
    {
        $office = Office::with('doctors')
        ->where('doctor.id', $id)
        ->orderBy('name', 'ASC')
        ->get();
        return $office;
    }

  










}