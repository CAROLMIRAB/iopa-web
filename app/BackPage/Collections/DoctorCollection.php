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
            $route = route('doctor.editview', ['slug' => $doctor->slug]);
            $alldoctors->push([
                'name' => $doctor->lastname.", ".$doctor->name,
                'phone' => $doctor->phone,
                'file' => $doctor->file,
                'created' => $doctor->created,
                'route' => $route
            ]);
        }
        return $alldoctors;
    }

    public function editData($doctor)
    {
    
        $doctor->image= url('') . "/uploads/images/" . $doctor->file;
        $doctor->slug_url = route('surgery.viewposts') . "/" . $doctor->slug;

        return $doctor;

    }

}