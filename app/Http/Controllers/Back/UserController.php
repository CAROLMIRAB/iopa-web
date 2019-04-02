<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BackPage\Repositories\UserRepo;
use App\BackPage\Collections\UserCollection;
use Yajra\DataTables\DataTables;
use Validator;

class UserController extends Controller
{

    private $userRepo;
    private $userCollection;

    /**
     * Class construct 
     * 
     * @return void
     */
    public function __construct(UserRepo $userRepo, UserCollection $userCollection)
    {
        $this->userRepo = $userRepo;
        $this->userCollection = $userCollection;
    }



    /**
     * Show all users view 
     * 
     * @return view
     */
    public function viewAllUsers()
    {
        return view('back.users.users');
    }


    /**
     * Show all users 
     * 
     * @return $users
     */
    public function allUsers()
    {
        $users = $this->userRepo->showAllUsers();
        $users = $this->userCollection->allUserCollect($users);

        return Datatables::of($users)->make(true);
    }

    /**
     * Users change status active-inactive
     * 
     */
    public function changeStatus(Request $request)
    {
        $user = $this->userRepo->changeStatusById($request->status, $request->id);
       
        return $user;
    }

}


