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
            $surgery->created = $date_create->format('d/m/Y h:i A');
    
            $route = route('surgery.editview', $surgery->slug);
            $allsurgeries->push([
                'name' => $surgery->name,
                'body' => $surgery->body,
                'file' => $surgery->file,
                'created' => $surgery->created,
                'status' => $post->status,
                'route' => $route
            ]);
        }
        return $allsurgeries;
    }

}