<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return $request->all();
    }
}
