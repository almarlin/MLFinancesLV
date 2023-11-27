<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    // El objeto request almacena los datos del formulario
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->input('inputName');

        $user->surname = $request->input('inputSurname');


        $user->save();
    }
}
