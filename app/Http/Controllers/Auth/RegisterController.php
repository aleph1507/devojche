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
    protected $redirectTo = '/';

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
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    // store_seller(){
    //     $uid = Auth::user()->id;
    //     $seller = new Seller();
    //     $seller->user_id = $uid;
    //     $seller->ime = $request->ime;
    //     $seller->adresa = $request->adresa;
    //     if($request->telefon)
    //         $seller->telefon = $request->telefon;
    //     $image = $request->file('slika');
    //     $filename = time() . '.' . $image->getClientOriginalExtension();
    //     $location = public_path('/images/sellers/' . $filename);
    //     Image::make($image)->fit(450,500)->save($location);
    //     $seller->slika = $filename;

    //     $user = Auth::user();
    //     $seller->save();
    //     $seller->user()->associate($user);
    //     Session::flash('success', 'Регистрирани како продавач.');
    //     return redirect('/');
    // }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

    }
}
