<?php

namespace App\BackPage\Repositories;

use Illuminate\Support\Facades\DB;
use App\User;



class UserRepo
{

    public function showAllUsers()
    {
        $user = User::orderBy('id', 'DESC')->get();
        return $user;
    }

}