<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserAccount;
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
            'inputEmail'=>['required','email'],
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
        $user->profilephoto = 'fotos_perfil/blankUser.png';

        $user->save();

        $account = new Account();
        $account->BALANCE = dechex(300);

        $accountController = new AccountController();
        $account->IBAN = $accountController->generateIban($user->name);
        $account->user_id = $user->id;
        $account->save();



        Auth::login($user);
        $request->session()->regenerate();

        // dd() Sirve para mostrar datos haciendo debug

        return redirect(route('mipanel'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'inputEmail' => ['required', 'email'],
            'inputHash' => 'required'
        ],[
            'inputEmail.required' => 'El campo de correo electrónico es obligatorio.',
            'inputEmail.email' => 'Ingrese una dirección de correo electrónico válida.',
            'inputHash.required' => 'El campo de contraseña es obligatorio.'
        ]);

        $credentials = [
            'email' => $request->inputEmail,
            'password' => $request->inputHash
        ];

        $remember = ($request->has('remember') ? true : false);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();

            if ($user->ADMIN == 1) {

                return redirect(route('panelAdmin'));
            } else if ($user->BAN) {
                return redirect()->route('login')->with(['error' => 'Usuario bloqueado.']);
            } else {
                $loanController = new LoanController();
                $loanController->monthlyPayment($user);
                return redirect()->intended('panel');
            }
        } else {
            return redirect()->route('login')->with(['error' => 'Usuario o contraseña incorrectos.']);
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
