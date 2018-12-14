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
        $surgery = Surgery::select('slug')->where('slug', $slug)->first();
        return $surgery;
    }

}