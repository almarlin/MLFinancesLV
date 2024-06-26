<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class AccountController extends Controller
{
    public function generateIban($userName)
    {
        $binary = "";
        $userName = str_replace(" ", "", $userName);
        $userName = str_replace(".", "", $userName);

        // Asegurarse de que el nombre de usuario tiene al menos 4 caracteres
        if (strlen($userName) < 4) {
            // Manejar este caso según sea necesario
            return null;
        }

        for ($i = 0; $i < 4; $i++) {
            $letter = $userName[$i];
            $position = ord(strtoupper($letter)) - ord('A') + 1;
            $binary .= decbin($position);
        }

        while (Account::where('IBAN', $binary)->exists()) {
            $binary .= "1";
        }

        return $binary;
    }

    public function lastCreatedAccounts()
    {
        $allAccounts=Account::all();
        $lastAccounts = [];
        $count=0;
        for ($i = count($allAccounts) - 1; $i >= 0; $i--) {
            array_push( $lastAccounts,$allAccounts[$i]);
            $count++;
            if ($count == 2) {
                break;
            }
        }

        return $lastAccounts;
    }

    public function adminAccounts()
    {
        $accounts = Account::paginate(5);


        return view('adminAccounts', compact('accounts'));
    }
}
