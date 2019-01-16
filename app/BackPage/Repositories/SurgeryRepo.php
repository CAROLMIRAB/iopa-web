<?php

namespace App\BackPage\Repositories;

use Illuminate\Support\Facades\DB;
use App\Office;
use App\Surgery;


class SurgeryRepo
{

    public function createSurgery($data, $offices)
    {
        $surgery = new Surgery();
        $surgery->fill($data);
        $surgery->save();

        $surgery->offices()->attach($offices);
        return $surgery;
    }

    public function findSlug($slug)
    {
        $surgery = Surgery::select(DB::raw('count(*) as number_slug'))
        ->where('slug', $slug)
        ->first();
        return $surgery;
    }

    public function showAllSurgeries()
    {
        $surgery = Surgery::select('id', 'name', 'body', 'slug', 'file', 'status')
            ->orderBy('name', 'DESC')
            ->get();
        return $surgery;
    }

    public function showOfficesSurgery($id)
    {
        $office = Office::leftJoin('surgery_office', 'offices.id', '=', 'surgery_office.office_id')
            ->where('surgery_office.surgery_id', $id)
            ->orderBy('name', 'ASC')
            ->get();
        return $office;
    }


    public function showSurgerySlug($slug)
    {
        $surgery = Surgery::select('id', 'name', 'body', 'file', 'slug')
            ->where('surgeries.slug', $slug)
            ->orderBy('id', 'DESC')
            ->first();

        return $surgery;
    }

    public function editSurgeryById($data, $id, $offices)
    {
       
        $surgery = \DB::table('surgeries')->where('id', $id)->update($data);
        $surg = Surgery::find($id);
        $surg->offices()->sync($offices);
 
        return $surgery;
    }

}