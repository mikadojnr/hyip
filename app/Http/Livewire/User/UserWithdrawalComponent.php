<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

use App\Models\Transaction;
use App\Models\InvestmentPlan;

use Carbon\Carbon;

class UserWithdrawalComponent extends Component
{
    public $transaction_id;

    public $get_userId;
    public $get_planId;
    public $get_name;
    public $get_price;
    public $get_percentage;
    public $get_duration;
    public $get_mode;

    public function mount($transaction_id)
    {

        $this->transaction_id = $transaction_id;


    }

    public function requestWithdrawal() {

            $transaction = Transaction::find();

            $transaction->status = 'requested';
            $transaction->type = 'withdrawal';

            $transaction->save();
            session()->flash('message', 'Your Request is being processed!');
            return redirect()->route('user.withdrawal', ['transaction_id'=>$this->transaction_id]);



    }

    public function withdrawalPermission($transaction_id) {
        $transaction = Transaction::find($transaction_id);

        $transactionDate = $transaction->userInvestments->created_at;
        $interval = Carbon::parse($transactionDate)->diff(Carbon::now());
        $daysDifference = $interval->days;

        if ($daysDifference % 7 == 0)
        {
            return true;
        }
        else {
            return false;
        }

    }

    public function render()
    {

        return view('livewire.user.user-withdrawal-component')->layout('layouts.base');
    }
}
