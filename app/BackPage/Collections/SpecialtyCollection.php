<?php

namespace App\BackPage\Collections;

use Carbon\Carbon;
use Illuminate\Support\Collection;


class SpecialtyCollection
{

    public function allSpecialtyCollect($surgeries)
    {
        $allsurgeries = new Collection();

        foreach ($surgeries as $specialty) {

            $date_create = new Carbon($specialty->created_at);
            $date_create->setTimezone('America/Santiago');
            $specialty->created = $date_create->format('d/m/Y');
    
            $route = route('specialty.editview', ['slug' => $specialty->slug]);
            $allsurgeries->push([
                'name' => $specialty->name,
                'body' => $specialty->body,
                'created' => $specialty->created,
                'status' => $specialty->status,
                'route' => $route,
                'id' => $specialty->id
            ]);
        }
        return $allsurgeries;
    }

    public function editData($specialty)
    {
    
        $specialty->image= url('') . "/uploads/images/" . $specialty->file;
        $specialty->slug_url = route('specialty.viewposts') . "/" . $specialty->slug;

        return $specialty;

    }


}