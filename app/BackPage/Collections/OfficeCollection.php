<?php

namespace App\BackPage\Collections;

use Carbon\Carbon;
use Illuminate\Support\Collection;


class OfficeCollection
{

    public function allOfficeCollect($offices)
    {
        $alloffices = new Collection();

        foreach ($offices as $office) {

            $date_create = new Carbon($office->created_at);
            $date_create->setTimezone('America/Santiago');
            $office->created = $date_create->format('d/m/Y h:i A');
           // $image = \URL::to('/') . "/uploads/images/" . $doctor->file;
            $route = route('doctor.editview', $office->slug);
            $alloffices->push([
                'name' => $office->name,
                'phone' => $office->phone,
                'created' => $office->created,
                'route' => $route,
                'id' => $office->id
            ]);
        }
        return $alloffices;
    }

}