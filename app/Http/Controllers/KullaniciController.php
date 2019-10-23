<?php

namespace App\Http\Controllers;

use App\Models\Kullanici;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KullaniciController extends Controller
{


    public function signUpForm()
    {
        return view('register.signUp');
    }

    public function SignUp()
    {

        if (request('password') != request('re_password'))
        {
            return redirect()->route('register.signUp')->with('error', 'Şifreler Uyuşmuyor. Lütfen Kontrol Edin');
        }
        if (empty(request('namesurname')) || empty(request('namesurname')) || empty(request('identityNo')) ||  empty(request('password')) || empty(request('re_password')) )
        {
            return redirect()->route('register.signUp')->with('error', 'Bilgilerinizi Kontrol Ediniz');
        }

        $kullanici = Kullanici::create([
            'namesurname'   => request('namesurname'),
            'email'         => request('email'),
            'identityNo'    => request('identityNo'),
            'password'      => Hash::make(request('password')),
            're_password'      => Hash::make(request('re_password'))
        ]);

            auth()->login($kullanici);
            return redirect()->route('signUpSuccess');


    }
}
