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

    public function changeData(Request $request)
    {
        $user = $request->user();

        $user = $request->user();

        $fields = [
            'NAME' => 'inputName',
            'SURNAME' => 'inputSurname',
            'BIRTHDAY' => 'inputBirthday',
            'ADDRESS' => 'inputAddress',
            'PC' => 'inputCP',
            'CITY' => 'inputCity',
            'PROVINCE' => 'inputProvince',
            'COUNTRY' => 'inputCountry',
        ];

        foreach ($fields as $field => $inputKey) {
            if ($request->filled($inputKey)) {
                $user->{$field} = $request->input($inputKey);
            }
        }
        $user->save();

        return redirect(route('mipanel'));
    }

    public function changePassword(Request $request)
    {

        $user = $request->user();
        if(Hash::check($request->input('inputOldPassword'),$user->password) && $request->input('inputNewPassword')==$request->input('inputNewPasswordRepeat')){

            $newPassword=Hash::make($request->input('inputNewPassword'));
            $user->password=$newPassword;
            $user->save();

            return redirect(route('mipanel'));
        }else{
            return redirect(route('datosUsuario'))->with(['error' => 'Contraseña no coincidiente.']);
        }
       
    }
}
