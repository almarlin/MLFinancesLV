<?php

namespace App\Http\Controllers;

use App\Models\Movement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovementController extends Controller
{
    public function deposit(Request $request)
    {

        $deposit = new Movement();

        $deposit->concept = $request->input('inputConcept');
        $deposit->quantity = $request->input('inputQuantity');
        $deposit->account_id = $request->user()->accounts->first()->id;
        $deposit->toaccount_id = $request->user()->accounts->first()->id;
        $deposit->fromIBAN = $request->user()->accounts->first()->IBAN;
        $deposit->toIBAN = $request->user()->accounts->first()->IBAN;

        $request->user()->accounts->first()->BALANCE += $request->input('inputQuantity');

        $request->user()->accounts->first()->save();
        $deposit->save();

        return redirect(route('mipanel'));
    }

    public function substract(Request $request)
    {

        $substract = new Movement();

        $substract->concept = $request->input('inputConcept');
        $substract->quantity = $request->input('inputQuantity');
        $substract->account_id = $request->user()->accounts->first()->id;
        $substract->toaccount_id = $request->user()->accounts->first()->id;
        $substract->fromIBAN = $request->user()->accounts->first()->IBAN;
        $substract->toIBAN = $request->user()->accounts->first()->IBAN;

        $request->user()->accounts->first()->BALANCE -= $request->input('inputQuantity');

        $request->user()->accounts->first()->save();
        $substract->save();

        return redirect(route('mipanel'));
    }

    public function send(Request $request)
    {

        $send = new Movement();
        $send->concept = $request->input('inputConcept');
        $send->quantity = $request->input('inputQuantity');
        $send->account_id = $request->user()->accounts->first()->id;

        $toaccount_id=DB::select("SELECT id FROM accounts INNER JOIN users WHERE email=$request->input('inputEmail')");
        $send->toaccount_id = $toaccount_id;

        $send->fromIBAN = $request->user()->accounts->first()->IBAN;
        
        $toIBAN=DB::select("SELECT IBAN FROM accounts WHERE id=$toaccount_id");
        $send->toIBAN = $toIBAN;

        $request->user()->accounts->first()->BALANCE -= $request->input('inputQuantity');

        $request->user()->accounts->first()->save();
        $send->save();


    }
}
