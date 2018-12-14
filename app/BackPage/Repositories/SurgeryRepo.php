<?php

namespace App\BackPage\Repositories;

use Illuminate\Support\Facades\DB;
use App\Office;


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

}