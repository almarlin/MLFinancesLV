<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
// Anyadimos el modelo para poder crear objetos y guardarlos en la bbdd.    
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        return view('users.createUser');
    }
    public function index()
    {
    }

    public function logUser(Request $request)
    {
        return view('users.logInUser');
    }



    public function login(Request $request)
    {
        $request->validate([
            'inputNif' => 'required',
            'inputHash' => 'required'
        ]);

        $user = User::where('NIF', $request->input('inputNif'))->first();

        if (!$user) {
            // No se encontró el usuario con el NIF proporcionado
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        if (Hash::check($request->input('inputHash'), $user->HASH)) {
            // Autenticación exitosa
            Session::put('user_nif', $user->NIF);
            Session::put('hash', $user->HASH);
            return 'login exitoso';
        } else {
            // Autenticación fallida
            return 'login fallido';
        }
    }




    // El objeto request almacena los datos del formulario
    public function store(Request $request)
    {
        if ($this->checkAddUser($request)) {
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
            // dd() Sirve para mostrar datos haciendo debug
            //dd($date);
        }
    }

    public function checkAddUser(Request $request): bool
    {
        // Para validar los formularios desde laravel se utilza la siguiente forma.
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

        if ($request->input('inputHash') != $request->input('inputRepeatHash')) {
            return false;
        }

        return true;
    }
}
