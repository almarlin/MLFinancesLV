<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PostController;
// Anyadimos el modelo para poder crear objetos y guardarlos en la bbdd.    
use App\Models\User;

class UserController extends Controller
{
    public function create()
    {
        return view('users.createUser');
    }
    public function index()
    {
    }

    public function logIn(Request $request){

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
            $user->phoneNumber = $request->input('inputphoneNumber');


            $hashFormated = password_hash($request->input('inputHash'), PASSWORD_DEFAULT);
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
            'inputNif' => ['required', ' min:8 ', 'max:8'],
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
