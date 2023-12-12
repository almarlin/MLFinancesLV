<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Loan;
use App\Models\User;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function requestLoan(Request $request)
    {

        $loanRequest = new Loan();

        $loanRequest->account_id = $request->user()->accounts->first()->id;
        $loanRequest->total = $request->input('inputQuantity');
        $loanRequest->approved = null;

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
                $account->BALANCE += $loan->total;
    
    
                $account->save();
    
                $loan->INTEREST = 5;
                

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
}
