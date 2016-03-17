<?php

namespace aplicacion\Http\Controllers\Auth;

use aplicacion\User;
use Validator;
use aplicacion\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
      |--------------------------------------------------------------------------
      | Registration & Login Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles the registration of new users, as well as the
      | authentication of existing users. By default, this controller uses
      | a simple trait to add these behaviors. Why don't you explore it?
      |
     */

    use AuthenticatesAndRegistersUsers,
        ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|min:3|max:255',
            'password' => 'required|confirmed|min:6|max:255',
            'password_confirmation' => 'required|min:6|max:255',
            'primer_nombre' => 'required|min:3|max:255',
            'segundo_nombre' => 'max:255',
            'primer_apellido' => 'required|min:3|max:255',
            'segundo_apellido' => 'max:255',
            'email' => 'email|max:255',
            'numeroTelefonico' => 'max:15',
            'numeroCelular' => 'required|min:6|max:15'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
            'primer_nombre' => $data['primer_nombre'],
            'segundo_nombre' => $data['segundo_nombre'],
            'primer_apellido' => $data['primer_apellido'],
            'segundo_apellido' => $data['segundo_apellido'],
            'email' => $data['email'],
            'telefono' => $data['numeroTelefonico'],
            'celular' => $data['numeroCelular'],
            'tusuario_id' => 4
        ]);
    }

}
