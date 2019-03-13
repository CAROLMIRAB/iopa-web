<?php

namespace App\BackPage\Collections;

use Carbon\Carbon;
use Illuminate\Support\Collection;


class SurgeryCollection
{

    public function allSurgeryCollect($surgeries)
    {
        $allsurgeries = new Collection();

        foreach ($surgeries as $surgery) {

            $date_create = new Carbon($surgery->created_at);
            $date_create->setTimezone('America/Santiago');
            $surgery->created = $date_create->format('d/m/Y');
    
            $route = route('surgery.editview', ['slug' => $surgery->slug]);
            $allsurgeries->push([
                'name' => $surgery->name,
                'body' => $surgery->body,
                'file' => $surgery->file,
                'created' => $surgery->created,
                'status' => $surgery->status,
                'route' => $route,
                'id' => $surgery->id
            ]);
        }
        return $allsurgeries;
    }

    public function editData($surgery)
    {
    
        $surgery->image= url('') . "/uploads/images/" . $surgery->file;
        $surgery->slug_url = route('surgery.viewallsurgeries') . "/" . $surgery->slug;

        return $surgery;

    }


}