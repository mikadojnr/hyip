<?php

namespace App\Http\Livewire\User;


use Livewire\Component;
use App\Models\Transaction;
use App\Models\UserInvestment;
use App\Models\User;
use App\Models\InvestmentPlan;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use App\Http\Livewire\Admin\AdminTransactionDetailComponent;




class PaymentComponent extends Component
{
    public $plan_id;

    public $get_userId;
    public $get_planId;
    public $get_name;
    public $get_price;
    public $get_percentage;
    public $get_duration;
    public $get_mode;

    public function mount($plan_id)
    {

        $this->plan_id = $plan_id;

        $plan = InvestmentPlan::find($this->plan_id);
        $this->get_name = $plan->name;

        $this->get_userId = Auth::user()->id;

        $this->get_planId = $plan->id;
        $this->get_name = Str::title($plan->name);
        $this->get_price = $plan->price;
        $this->get_percentage = $plan->percentage;
        $this->get_duration = $plan->duration;



    }

    public function initiateInvestment() {
        $transaction = new Transaction;
        $transaction->user_id = Auth::user()->id;
        $transaction->mode = $this->get_mode;
        $transaction->status = 'pending';
        $transaction->type = 'deposit';
        $transaction->amount = $this->get_price;
        $transaction->investment_id = $this->get_planId;
        $transaction->save();

        session()->flash('message', 'Your Payment is being processed!');

        return redirect()->route('user.dashboard');


    }

    public function render()
    {

        return view('livewire.user.payment-component')->layout('layouts.base');
    }
}
