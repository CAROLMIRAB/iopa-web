<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
     */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin/usuarios';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ],
        [
            'name.required' => 'El nombre es requerido',
            'name.string' => 'Solo se permiten letras',
            'name.string' => 'El nombre debe tener un maximo de 255 caracteres',
            'email.required' => 'El email es requerido',
            'email.email' => 'El email no es válido',
            'email.unique' => 'Este email ya existe',
            'password.required' => 'El email es requerido',
            'password.min' => 'La contraseña debe tener un minimo de 6 caracteres',
            'password.confirmed' => 'Las contraseñas no coinciden'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'active' => 'ACTIVE',
            'password' => Hash::make($data['password']),
        ]);

        $user
        ->roles()
        ->attach($data['role']);

        return $user;
    }

    
    
    protected function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user =  User::create([
            'name' => $request->name,
            'email' => $request->email,
            'active' => 'ACTIVE',
            'password' => Hash::make($request->password),
        ])));

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    public function viewRegister()
    {
        return view('auth.register');
    }

}
