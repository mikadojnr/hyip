<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Transaction;
use App\Models\UserInvestment;
use App\Models\User;
use App\Models\UserDetail;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;



class UserViewTransactionDetailsComponent extends Component
{
    public $transaction_id;
    public $transaction;
    public $investment;

    public $countdown;
    public $user_details;

    public $get_type;
    public $get_amount;
    public $get_mode;
    public $get_status;
    public $get_bank_name;
    public $get_account_name;
    public $get_account_number;
    public $get_usdt_wallet;


    public function mount($transaction_id)
    {


        $transaction = Transaction::find($this->transaction_id);
        $user_details = UserDetail::where('user_id', Auth::user()->id)->exists();

        $userInvestment = UserInvestment::where('id', $transaction->user_investment_id)->first();
        $this->investment =$userInvestment;
        $this->transaction = $transaction;

        if ($userInvestment) {

            // calculate days left for the investment

            $createdDate = Carbon::parse($userInvestment->created_at);
            $expiryDate = $createdDate->addDays($userInvestment->investmentPlan->duration);
            $currentDate = Carbon::now();
            $countdown = $createdDate->diffInDays($currentDate);

            $this->countdown = $countdown;
            $this->user_details = $user_details;
        }

    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'get_mode' => 'required',

        ]);
    }

    public function requestWithdrawal()
    {
        $this->validate([

            'get_mode' => 'required',

        ]);
        $transaction = Transaction::find($this->transaction_id);

        $userInvestment = UserInvestment::find($transaction->user_investment_id);

        if ($userInvestment) {
            if ($this->countdown % $userInvestment->duration === 0) {
                if ($this->user_details) {
                    if ($transaction) {
                        $transaction->mode = $this->get_mode;
                        $transaction->status = 'requested';
                        $transaction->save();
                        session()->flash('message', 'Withdrawal request has been sent successfully!');
                        return redirect()->route('user.transaction-details',['transaction_id'=>$this->transaction_id]);
                    } else {
                        session()->flash('error_message', 'No record found!');
                        return redirect()->route('user.transaction-details',['transaction_id'=>$this->transaction_id]);
                    }
                } else {
                    session()->flash('warning_message', 'You have to set Payment Details before withdrawal! You can set them from your profile page.');
                    return redirect()->route('user.transaction-details',['transaction_id'=>$this->transaction_id]);
                }
            } else {
                session()->flash('warning_message', 'Your next withdrawal is in '.$this->countdown.' day(s)!');
                return redirect()->route('user.transaction-details',['transaction_id'=>$this->transaction_id]);
            }

        }
    }


    public function render()
    {
        return view('livewire.user.user-view-transaction-details-component',[

        ])->layout('layouts.base');
    }
}
