<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\InvestmentPlan;
use App\Models\UserInvestment;


class HomeComponent extends Component
{

    public function render()
    {
        $plans = InvestmentPlan::get()->where('is_active', '1')->sortBy('price');

        $user_investments = UserInvestment::get()->take(10);
        return view('livewire.home-component',[
            'plans'=> $plans,
            'user_investments' => $user_investments
        ])->layout('layouts.base');
    }
}
