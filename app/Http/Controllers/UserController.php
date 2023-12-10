<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
// Anyadimos el modelo para poder crear objetos y guardarlos en la bbdd.    
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        return view('users.createUser');
    }

    public function logUser()
    {
        return view('users.loginUser');
    }

public function adminUsers(){
    $users = User::paginate(5);
       

        return view('adminUsers', compact('users'));
}



   
}
