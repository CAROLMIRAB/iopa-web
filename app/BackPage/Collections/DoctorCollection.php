<?php

namespace App\BackPage\Collections;

use Carbon\Carbon;
use Illuminate\Support\Collection;


class DoctorCollection
{

    public function allDoctorCollect($doctors)
    {
        $alldoctors = new Collection();

        foreach ($doctors as $doctor) {

            $date_create = new Carbon($doctor->created_at);
            $date_create->setTimezone('America/Santiago');
            $doctor->created = $date_create->format('d/m/Y h:i A');
           // $image = \URL::to('/') . "/uploads/images/" . $doctor->file;
            //$route = route('doctor.editview', $doctor->slug);
            $alldoctors->push([
                'name' => $doctor->lastname.", ".$doctor->name,
                'phone' => $doctor->phone,
                'file' => $doctor->file,
                'created' => $doctor->created,
                'route' => ""
            ]);
        }
        return $alldoctors;
    }

}