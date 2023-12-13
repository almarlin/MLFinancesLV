<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Loan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;


class LoanController extends Controller
{
    public function requestLoan(Request $request)
    {
        $request->validate([
            'inputQuantity' => ['required', 'Integer'],
            'inputConcept' => 'required'
        ]);

        $loanRequest = new Loan();

        $loanRequest->account_id = $request->user()->accounts->first()->id;
        $loanRequest->total = $request->input('inputQuantity');
        $loanRequest->approved = null;
        $loanRequest->concept = $request->input('inputConcept');
        $loanRequest->save();

        return redirect(route('mipanel'));
    }


    public function approveLoan(Request $request)
    {
        $input = $request->except('_token');

        foreach ($input as $loanId => $approve) {


            $loan = Loan::find($loanId);

            if ($approve == "true") {
                $loan->APPROVED =  1;

                $account = Account::find($loan->account_id);

                $account->BALANCE += $loan->TOTAL;
                $account->save();


                $loan->EXPEDITIONDATE = Carbon::now();

                if ($loan->TOTAL < 200) {
                    // Código para el caso en que la cantidad del prestamo sea menor que 200
                    $loan->INTEREST = 100;
                    $loan->DUEDATE = Carbon::now()->addMonth(3);
                    $loan->TERMS = 3;
                } elseif ($loan->TOTAL >= 200 && $loan->TOTAL < 1000) {
                    // Código para el caso en que la cantidad del prestamo sea mayor o igual a 200 y menor que 1000
                    $loan->INTEREST = 80;
                    $loan->DUEDATE = Carbon::now()->addMonths(12);
                    $loan->TERMS = 12;
                } elseif ($loan->TOTAL >= 1000 && $loan->TOTAL < 5000) {
                    // Código para el caso en que la cantidad del prestamo sea mayor o igual a 1000 y menor que 5000
                    $loan->INTEREST = 60;
                    $loan->DUEDATE = Carbon::now()->addMonths(24);
                    $loan->TERMS = 24;
                } elseif ($loan->TOTAL >= 5000 && $loan->TOTAL < 10000) {
                    // Código para el caso en que la cantidad del prestamo sea mayor o igual a 5000 y menor que 10000
                    $loan->INTEREST = 50;
                    $loan->DUEDATE = Carbon::now()->addMonths(50);
                    $loan->TERMS = 50;
                } elseif ($loan->TOTAL >= 10000 && $loan->TOTAL < 50000) {
                    // Código para el caso en que la cantidad del prestamo sea mayor o igual a 10000 y menor que 50000
                    $loan->INTEREST = 40;
                    $loan->DUEDATE = Carbon::now()->addMonths(120);
                    $loan->TERMS = 120;
                } else {
                    // Código para el caso en que la cantidad del prestamo sea mayor a 50000
                    $loan->INTEREST = 30;
                    $loan->DUEDATE = Carbon::now()->addMonths(480);
                    $loan->TERMS = 480;
                }
                $loan->TOPAY = $loan->TOTAL * (1 + ($loan->INTEREST / 100));
                $loan->MONTHLYPAYMENT = $loan->TOPAY / $loan->TERMS;
                $loan->NEXTPAYMENT = Carbon::now()->addMonth();
            } else {
                $loan->APPROVED = 0;
            }

            $loan->save();
        }

        return redirect(route('prestamosBanco'));
    }


    public function showLoan()
    {
        $loans = Loan::where('account_id', auth()->user()->accounts->first()->id)->paginate(5);


        return view('users.verPrestamos', compact('loans'));
    }


    public function adminLoans()
    {

        $loans = Loan::where('approved', null)->get();


        return view('adminLoans', compact('loans'));
    }


    public function monthlyPayment(User $user)
    {
        $userAccount = Account::where('user_id', $user->id)->first();
        $loan = Loan::where('account_id', $userAccount->id)->first();
        if ($loan) {
            while (Carbon::now() > $loan->NEXTPAYMENT) {
                $userAccount->BALANCE -= $loan->MONTHLYPAYMENT;
                $loan->TERMS -= 1;

                $loan->NEXTPAYMENT = Carbon::parse($loan->NEXTPAYMENT)->addMonth();
            }

            $userAccount->save();
            $loan->save();
        }
    }
}
