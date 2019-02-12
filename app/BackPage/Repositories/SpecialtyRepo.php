<?php

namespace App\BackPage\Repositories;

use Illuminate\Support\Facades\DB;
use App\Office;
use App\Specialty;


class SpecialtyRepo
{

    public function createSpecialty($data, $offices)
    {
        $specialty = new Specialty();
        $specialty->fill($data);
        $specialty->save();

        return $specialty;
    }

    public function findSlug($slug)
    {
        $specialty = Specialty::select(DB::raw('count(*) as number_slug'))
        ->where('slug', $slug)
        ->first();
        return $specialty;
    }

    public function showAllSpecialties()
    {
        $specialty = Specialty::select('id', 'name', 'slug', 'status', 'created_at')
            ->orderBy('name', 'DESC')
            ->get();
        return $specialty;
    }

    public function showOfficesSpecialty($id)
    {
        $office = Office::leftJoin('specialty_office', 'offices.id', '=', 'specialty_office.office_id')
            ->where('specialty_office.specialty_id', $id)
            ->orderBy('name', 'ASC')
            ->get();
        return $office;
    }

    public function showAllOffices()
    {
        $office = Office::orderBy('name', 'ASC')->get();
        return $office;
    }


    public function showSpecialtySlug($slug)
    {
        $specialty = Specialty::select('id', 'name', 'body', 'slug', 'status')
            ->where('slug', $slug)
            ->orderBy('id', 'DESC')
            ->first();

        return $specialty;
    }

    public function editSpecialtyById($data, $id, $offices)
    { 
        $specialty = \DB::table('specialties')->where('id', $id)->update($data);
 
        return $specialty;
    }

    public function changeStatusById($status, $id)
    { 
        $specialty = \DB::table('specialties')->where('id', $id)->update(['status' => $status]);
        return $specialty;
    }

}