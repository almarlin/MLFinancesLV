<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    // El objeto request almacena los datos del formulario
    public function register(Request $request)
    {
        $request->validate([
            'inputName' => 'required',
            'inputSurname' => 'required',
            'inputBirthday' => 'required',
            'inputNif' => ['required', 'min:8 ', 'max:8'],
            'inputCountry' => 'required',
            'inputProvince' => 'nullable',
            'inputCity' => 'nullable',
            'inputPc' => 'nullable',
            'inputAddress' => 'nullable',
            'inputPhoneNumber' => ['required', 'min:9', 'max:9'],
            'inputHash' => 'required',
            'inputRepeatHash' => 'required'
        ]);

        $user = new User();
        $user->name = $request->input('inputName');
        $user->surname = $request->input('inputSurname');

        $date = str_replace(' ', '', $request->input('inputBirthday'));

        $user->birthday = $date;
        $user->nif = $request->input('inputNif');
        $user->email = $request->input('inputEmail');
        $user->country = $request->input('inputCountry');
        $user->province = $request->input('inputProvince');
        $user->city = $request->input('inputCity');
        $user->pc = $request->input('inputPC');
        $user->address = $request->input('inputAddress');
        $user->phoneNumber = $request->input('inputPhoneNumber');


        $user->password = Hash::make($request->input('inputHash'));

        $user->ban = null;
        $user->admin = false;
        $user->profilephoto = null;

        $user->save();

        Auth::login($user);
        $request->session()->regenerate();

        // dd() Sirve para mostrar datos haciendo debug
        //dd($date);
        return redirect(route('mipanel'));
    }

    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->inputNif,
            'password' => $request->inputHash
        ];

        $remember = ($request->has('remember') ? true : false);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended()->route('mipanel');
        } else {

            return 'inicio de sesión inválido';
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('index');
    }
}
