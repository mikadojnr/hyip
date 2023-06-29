<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Transaction;
use App\Models\InvestmentPlan;

use Livewire\WithPagination;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserTransactionComponent extends Component
{

    use WithPagination;

    public $searchTerm;



    public function render()
    {
        $transactions = Transaction::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(20);

        $totalWithdrawal = Transaction::where('user_id', Auth::user()->id)
        ->where('type', 'withdrawal')
        ->sum('amount');


        $totalDeposit = Transaction::where('user_id', Auth::user()->id)
        ->where('type', 'deposit')
        ->sum('amount');

        return view('livewire.user.user-transaction-component',[
            'transactions'=>$transactions,
            'totalWithdrawal'=>$totalWithdrawal,
            'totalDeposit'=>$totalDeposit,

        ])->layout('layouts.base');
    }
}
