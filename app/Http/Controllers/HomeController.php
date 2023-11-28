<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    // _invoke para una sola ruta. Para más rutas se utiliza varias funciones con nombres distintos. Por convención el prinicpal se llama index.
    public function home()
    {
        session()->flush();
        return view('index');
    }


    public function adminPanel()
    {

        return view('mainAdmin');
    }
    public function panel()
    {
        return view('mainUser');
    }
}
