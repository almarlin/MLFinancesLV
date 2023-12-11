<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
// Anyadimos el modelo para poder crear objetos y guardarlos en la bbdd.    
use App\Models\User;
use App\Models\Account;
use App\Models\Movement;
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

    public function adminUsers()
    {
        $users = User::paginate(5);


        return view('adminUsers', compact('users'));
    }

    public function userByNif(Request $request)
    {

        $user = User::where('NIF', $request->input('inputNif'))->first();
        $userAccount = Account::where('user_id', $user->id)->first();
        $userMovements = Movement::where('account_id', $userAccount->id)->paginate(3);

        // Para enviar las variables se pasa el nombre de las mismas como string
        return view('adminNifResults', compact('user', 'userAccount', 'userMovements'));
    }

    public function banUser(Request $request)
    {
        $user = User::where('NIF', $request->input('inputNif'))->first();

        if ($request->input('userState') === 'banUser') {

            $user->ban = 1;
            $user->save();

        } else if ($request->input('userState') === 'unbanUser') {

            $user->ban = 0;
            $user->save();
        }

        return redirect(route('buscarUser'));
    }
}
