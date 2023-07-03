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

    public function mount()
    {


    }





    public function render()
    {

        return view('livewire.user.user-withdrawal-component')->layout('layouts.base');
    }
}
