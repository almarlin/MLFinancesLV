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
        $user->country = $request->input('inputCountry');
        $user->province = $request->input('inputProvince');
        $user->city = $request->input('inputCity');
        $user->pc = $request->input('inputPC');
        $user->address = $request->input('inputAddress');
        $user->phoneNumber = $request->input('inputPhoneNumber');


        $hashFormated = Hash::make($request->input('inputHash'));
        $user->hash = $hashFormated;

        $user->ban = null;
        $user->admin = false;
        $user->profilephoto = null;

        $user->save();
        $request->session()->regenerate();
        Auth::login($user);

        // dd() Sirve para mostrar datos haciendo debug
        //dd($date);
        return redirect(route('mipanel'));
    }

    public function login(Request $request)
    {
        $credentials = [
            'NIF' => $request->inputNif,
            'HASH' => $request->inputHash
        ];

        $user = User::where('NIF', $request->inputNif)->first();

        if (!$user) {
            // No se encontró el usuario con el NIF proporcionado
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        if (Hash::check($request->inputHash, $user->HASH)) {
            // Autenticación exitosa
            $request->session()->regenerate();
            return redirect(route('mipanel'));
        } else {
            // Autenticación fallida
            return 'login fallido';
        }
    }
    public function logout()
    {
    }
}
