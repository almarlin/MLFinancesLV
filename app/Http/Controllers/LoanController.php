<?php

namespace App\Http\Controllers;

use App\Models\Loan;
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
}
