<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Else_;
use Illuminate\Support\Facades\Redirect;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/noticias';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function login(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');

        $user = User::where('email', $email)->first();
        if ($user === null) {  
        $active = $user->active;
        if ($active ==  'ACTIVE') {
            if (\Auth::attempt(array(
                'email' => $email,
                'password' => $password
            ))) {
                session([
                    'email' => $email,
                    'active' => $active

                ]);

            return redirect()->route('post.view-all-posts');

            } else {
                //Session::flash('message', "Invalid Credentials , Please try again.");
                return redirect()->back()->with('error','Tus credenciales son invalidas');
            }
        } else {
            //Session::flash('message', "Usuario inactivo, contactese con su administrador");
             return redirect()->back()->with('error','Usuario inactivo, contactese con su administrador');
        }
    }else{

        return redirect()->back()->with('error','Este usuario no existe');
    }
    }

    public function logout()
    {
        auth()->logout();

        session()->flash('message', 'Some goodbye message');

        return redirect('/login');
    }
}
