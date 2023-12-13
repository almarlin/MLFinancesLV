<?php

namespace App\Http\Controllers;

use App\Models\Account;
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

        // Hexdec cambia de hexadecimal a decimal. Dechex cambia de decimal a hexadecimal
        $accountBalanceDecimal = hexdec($request->user()->accounts->first()->BALANCE);
        $accountBalanceDecimal += $request->input('inputQuantity');
        $request->user()->accounts->first()->BALANCE = dechex($accountBalanceDecimal);


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

        $accountBalanceDecimal = hexdec($request->user()->accounts->first()->BALANCE);
        $accountBalanceDecimal -= $request->input('inputQuantity');
        $request->user()->accounts->first()->BALANCE = dechex($accountBalanceDecimal);

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
        $toEmail = $request->input('inputEmail');

        $toaccount_id = DB::select("SELECT accounts.id FROM accounts INNER JOIN users ON users.id = accounts.user_id WHERE users.email ='$toEmail';");

        //De la fila 0, obtenemos el atributo id.
        $send->toaccount_id = $toaccount_id[0]->id;

        $send->fromIBAN = $request->user()->accounts->first()->IBAN;

        $toIBAN = DB::select("SELECT IBAN FROM accounts WHERE id=" . $toaccount_id[0]->id . ";");
        $send->toIBAN = $toIBAN[0]->IBAN;

        $destinatary = Account::find($toaccount_id[0]->id);
        $senderBalanceDecimal = hexdec($request->user()->accounts->first()->BALANCE);
        $senderBalanceDecimal -= $request->input('inputQuantity');
        $request->user()->accounts->first()->BALANCE = dechex($senderBalanceDecimal);

        $destinataryBalanceDecimal = hexdec($destinatary->BALANCE);
        $destinataryBalanceDecimal += $request->input('inputQuantity');
        $destinatary->BALANCE = dechex($destinataryBalanceDecimal);
        $destinatary->save();

        $request->user()->accounts->first()->save();
        $send->save();

        return redirect(route('mipanel'));
    }

    public function userMovements(Request $request)
    {
        // Para identificar todos los movimientos del usuario, recibidos y realizados.
        // Cogemos su id (desde la autenticacion) y lo buscamos en la bbdd tanto como destinatario como ejecutor.
        // Finalmente mostramos los movimientos de mas reciente a mas antiguo.
        $user = $request->user();
        $account = Account::where('user_id', $user->id)->first();
        $allMovements = Movement::where('account_id', $account->id)
            ->orWhere('toaccount_id', $account->id)
            ->get();
        $lastMovements = [];
        $count=0;
        for ($i = count($allMovements) - 1; $i >= 0; $i--) {
            array_push( $lastMovements,$allMovements[$i]);
            $count++;
            if ($count == 2) {
                break;
            }
        }

        return view('mainUser', compact('lastMovements'));
    }

    public function showLastMovements(){
        $allMovements=Movement::all();
        $lastMovements = [];
        $count=0;
        for ($i = count($allMovements) - 1; $i >= 0; $i--) {
            array_push( $lastMovements,$allMovements[$i]);
            $count++;
            if ($count == 2) {
                break;
            }
        }

        return $lastMovements;
    }

    public function showMovements()
    {
        $movements = Movement::where('account_id', auth()->user()->accounts->first()->id)->paginate(5);


        return view('users.verMovimientos', compact('movements'));
    }

    public function adminMovements()
    {
        $movements = Movement::paginate(5);


        return view('adminMovements', compact('movements'));
    }
}
