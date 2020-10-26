<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
        $msg=[
            'name.required' => 'نام را وارد کرده ایید',
            'name.max' => 'نام نباید بیشتر از 20 مقدار باشد',
            'email.max' => 'ایمیل نباید بیشتر از 225 مقدار باشد',
            'password.min' => 'پسور نباید کمتر از 8 مقدار باشد',
            'email.unique' => 'ایمیل تکراری است',
            'password.confirmed' => 'پسورد باهم نمیخواند',
            'name.string' => 'نام باید حروف و عدد باشد',
            'email.string' => 'ایمیل باید حروف و عدد باشد',
            'password.string' => 'پسورد باید حروف و عدد باشد',
            'email.required' => 'ایمیل را وارد کرده ایید',
            'password.required' => 'رمز عبور را وارد کرده ایید',
        ];
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ] , $msg);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
