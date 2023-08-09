<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\InvestmentPlan;
use App\Models\UserInvestment;
use App\Models\Transaction;
use App\Models\User;


class HomeComponent extends Component
{
    public $plan_id;

    public function profitCalculator()
    {

    }

    public function render()
    {
        $plans = InvestmentPlan::get()->where('is_active', true)->sortBy('price');

        $user_investments = UserInvestment::where('is_active', true)
        ->get()->take(10);

        $payouts = Transaction::where('status', 'approved')->where('type', 'withdrawal')->get()->take(10);
        $total_users = User::count();
        $active_investments = UserInvestment::where('is_active', true)->count();
        $total_deposited = Transaction::where('type', 'deposit')->where('status', 'approved')->sum('amount');
        $total_withdrawn = Transaction::where('type', 'withdrawal')->where('status', 'approved')->sum('amount');

        $plans = InvestmentPlan::all();

        return view('livewire.home-component',[
            'plans'=> $plans,
            'user_investments' => $user_investments,
            'payouts' => $payouts,
            'total_users' => $total_users,
            'active_investments' => $active_investments,
            'total_deposited' => $total_deposited,
            'total_withdrawn' => $total_withdrawn,
            'plans' => $plans
        ])->layout('layouts.base');
    }
}
