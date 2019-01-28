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
        $office = new Office();
        $office->fill($data);
        $office->save();
        return $office;
    }

    public function findOffices($var)
    {
        $offices = Office::select('id', 'name')->whereRaw("LOWER(name) like '".strtolower($var)."%'")->orderBy('name', 'asc')->get();
        return $offices;
    }

    public function showAllOffices()
    {
        $office = Office::orderBy('name', 'ASC')->get();
        return $office;
    }

    public function showOfficeSlug($slug)
    {
        $office = Office::select('id', 'name', 'photo', 'map', 'phone', 'address', 'slug')
            ->where('slug', $slug)
            ->orderBy('id', 'DESC')
            ->first();

        return $office;
    }

    public function editOfficeById($id, $data)
    {
        $result = \DB::table('offices')->where('id', $id)->update($data);
        return $result;
    }

}