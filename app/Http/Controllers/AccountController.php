<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class AccountController extends Controller
{
    public function generateIban($userName)
    {

        
        $binary="";

        for($i=0;$i<4;$i++){

            $letter=$userName[$i];
            $position=ord(strtoupper($letter)) - ord('A') + 1;
            $binary.=$binary.decbin($position);
            if($i==4){
            dd($binary);
            }
        }

        return $binary;

    }
}
