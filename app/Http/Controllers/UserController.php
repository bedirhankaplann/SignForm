<?php

namespace App\Http\Controllers;

use App\Mail\UserRegisterMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function signUpForm()
    {
        return view('register.signUp');
    }

    public function SignUp()
    {
        $this->validate(request(), [
           'namesurname'    =>  'required|min:5|max:60',
            'email'         =>  'required|email|unique:kullanici',
            'identityNo'    =>  'required|min:11|max:11|unique:kullanici',
            'password'      =>  'required|confirmed|min:8|max:16'
        ]);
        $kullanici = User::create([
            'namesurname'       => request('namesurname'),
            'email'             => request('email'),
            'identityNo'        => request('identityNo'),
            'password'          => Hash::make(request('password')),
            're_password'       => Hash::make(request('re_password')),
            'activate_key'      => Str::random(60),
            'activate_status'   => 0
        ]);

            Mail::to(request('email'))->send(new UserRegisterMail($kullanici));

            auth()->login($kullanici);
            return redirect()->route('signUpSuccess');
    }

    public function terms()
    {
        return view('terms');
    }

    public function signUpSuccess()
    {
        return view('signUpSuccess');
    }

    public function activate($key)
    {
        $kullanici = User::where('activate_key', $key)->first();
        if (!is_null($kullanici))
        {
            $kullanici->activate_key = null;
            $kullanici->activate_status = 1;
            $kullanici->save();
            return redirect()->to('/')->with('message', 'Kullanıcı Kaydınız Akttif Olarak Etkinleştirildi.')
                ->with('message_type', 'success');
        }

    }

    public function signInForm()
    {
        return view('login.signIn');

    }

    public function signIn()
    {
        $this->validate(request(), [
            'email'      =>  'required|email',
            'password'  =>  'required'
        ]);
        if (auth()->attempt(['email' => request('email'), 'password' => request('password')], request()->has('rememberMe')))
        {
            request()->session()->regenerate();
            return redirect()->intended('/homepage');
        }
        else
        {
            $errors = [ 'email' => 'Hatalı Giriş'];
            return back()->withErrors($errors);
        }
    }
    public function homepage()
    {
        return view('homepage');
    }
}
