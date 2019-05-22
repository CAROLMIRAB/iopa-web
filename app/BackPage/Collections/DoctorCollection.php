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
            $doctor->created = $date_create->format('d/m/Y');
            $route = route('doctor.editview', ['slug' => $doctor->slug]);
            $image= url("/uploads/thumbnail/" . $doctor->file);
            $alldoctors->push([
                'id' => $doctor->id,
                'name' => $doctor->lastname.", ".$doctor->name,
                'phone' => $doctor->phone,
                'file' => $image,
                'created' => $doctor->created,
                'email' => $doctor->email,
                'route' => $route,
                'status' => $doctor->status
            ]);
        }
        return $alldoctors;
    }

    public function editData($doctor)
    {
    
        $doctor->image= url("/uploads/images/" . $doctor->file);
        $doctor->slug_url = route('doctor.viewalldoctors') . "/" . $doctor->slug;

        return $doctor;

    }

}