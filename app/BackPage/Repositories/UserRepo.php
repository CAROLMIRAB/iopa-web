<?php

namespace App\BackPage\Repositories;

use Illuminate\Support\Facades\DB;
use App\User;

class UserRepo
{

    public function showAllUsers()
    {
        $user = User::select('id', 'name', 'email', 'active')->orderBy('id', 'DESC')->get();
        return $user;
    }

    
    public function changeStatusById($status, $id)
    { 
        $user = \DB::table('users')->where('id', $id)->update(['active' => $status]);
        return $user;
    }

}