<?php

namespace App\Http\Controllers;

use App\Models\Movement;
use Illuminate\Http\Request;

class MovementController extends Controller
{
    public function deposit(Request $request)
    {

        $deposit = new Movement();

        $deposit->concept = $request->input('inputConcept');
        $deposit->quantity = $request->input('inputQuantity');
        $deposit->id_fromaccount=$request->user()->accounts->first()->IBAN;
        $deposit->id_toaccount=$request->user()->accounts->first()->IBAN;

        $request->user()->accounts->first()->BALANCE+=$request->input('inputQuantity');

        $request->user()->accounts->first()->save();
        $deposit->save();
  
        return redirect(route('mipanel'));


    }
}
