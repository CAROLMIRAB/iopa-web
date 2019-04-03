<?php

namespace App\BackPage\Collections;

use Carbon\Carbon;
use Illuminate\Support\Collection;


class UserCollection
{

    public function allUserCollect($users)
    {
        $allusers = new Collection();

        foreach ($users as $user) {

            $date_create = new Carbon($user->created_at);
            $date_create->setTimezone('America/Santiago');
            $user->created = $date_create->format('d/m/Y');
    
            $allusers->push([
                'name' => $user->name,
                'email' => $user->email,
                'created' => $user->created,
                'active' => $user->status,
                'id' => $user->id
            ]);
        }
        return $allusers;
    }

}