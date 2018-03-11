<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {   
        Validator::extend('phone', function($attribute, $value, $parameters) {
                                        return preg_match ('|^\([0-9]{3}\)[0-9]{3}[-][0-9]{2}[-][0-9]{2}$|', $value);
                                   }
                        );
        Validator::replacer('phone', function($message, $attribute, $rule, $parameters) {
                return 'Поле телефона должно быть в формате (XXX)XXX-XX-XX';
            });                        
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phone' => "required|phone",
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'firstname'       => $data['name'],
            'lastname'        => $data['lastname'],
            'email'           => $data['email'],
            'phone'           => $data['phone'],
            'password'        => password_hash($data['password'],PASSWORD_BCRYPT),
        ]);
    }

}
