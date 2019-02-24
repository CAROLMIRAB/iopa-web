<?php

namespace App\BackPage\Repositories;

use Illuminate\Support\Facades\DB;
use App\Specialty;
use App\Office;
use App\Doctor;


class DoctorRepo
{

    public function createDoctor($data, $offices, $specialties)
    {
        $doctor = new Doctor();
        $doctor->fill($data);
        $doctor->save();

        $doctor->doctor_office()->attach($offices);
        $doctor->doctor_specialty()->attach($specialties);

        return $doctor;
    }

    public function showDoctors()
    {
        $doctor = Doctor::orderBy('id', 'DESC')->get();
        return $doctor;
    }

    public function showAllDoctors()
    {
        $doctor = Doctor::select('doctors.id', 'doctors.name', 'lastname', 'phone', 'excerpt', 'file','doctors.created_at', 'doctors.email', 'doctors.rut', 'doctors.slug', 'doctors.status')
            ->orderBy('id', 'DESC')
            ->get();
        return $doctor;
    }

    public function showDoctorSlug($slug)
    {
        $doctor = Doctor::select('doctors.id', 'doctors.name', 'doctors.slug','lastname', 'phone', 'excerpt', 'file', 'email', 'rut', 'doctors.created_at', 'doctors.status')
            ->orderBy('id', 'DESC')
            ->where('doctors.slug', $slug)
            ->first();
        return $doctor;
    }


    public function showAllOffices()
    {
        $office = Office::orderBy('name', 'ASC')->get();
        return $office;
    }

    public function showOfficesDoctor($id)
    {
        $office = Office::leftJoin('doctor_office', 'offices.id', '=', 'doctor_office.office_id')
            ->where('doctor_office.doctor_id', $id)
            ->orderBy('name', 'ASC')
            ->get();

        return $office;
    }

    public function showSpecialtiesDoctor($id)
    {
        $specialty = Specialty::leftJoin('doctor_specialty', 'specialties.id', '=', 'doctor_specialty.specialty_id')
            ->where('doctor_specialty.doctor_id', $id)
            ->orderBy('name', 'ASC')
            ->get();

        return $specialty;
    }

    public function editDoctorById($data, $id, $offices, $specialties)
    {
        $doctor = \DB::table('doctors')->where('id', $id)->update($data);
        $doc = Doctor::find($id);
        $doc->doctor_office()->sync($offices);
        $doc->doctor_specialty()->sync($specialties);
 
        return $doctor;
    }

    public function changeStatusById($status, $id)
    { 
        $doctor = \DB::table('doctors')->where('id', $id)->update(['status' => $status]);
        return $doctor;
    }
}