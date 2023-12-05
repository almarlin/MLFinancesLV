<?php

namespace App\Http\Controllers;

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
        $loanRequest->approved = false;

        $loanRequest->save();

        return redirect(route('mipanel'));
    }


    public function approveLoan(Request $request)
    {
    }

    public function showLoan(Request $request)
    {
       $loans = Loan::where('account_id',auth()->user()->accounts->first()->id)->paginate(5);
       

        return view('users.verPrestamos', compact('loans'));
    }
}
