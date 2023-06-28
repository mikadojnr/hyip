<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\InvestmentPlan;

class UserInvestmentPlanComponent extends Component
{

    public function render()
    {
        $plans = InvestmentPlan::all();
        return view('livewire.user.user-investment-plan-component',[
            'plans'=>$plans,
        ])->layout('layouts.base');
    }
}
