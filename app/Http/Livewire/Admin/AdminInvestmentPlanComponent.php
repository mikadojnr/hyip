<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\InvestmentPlan;

class AdminInvestmentPlanComponent extends Component
{
    public function render()
    {
        $investment_plans = InvestmentPlan::all();

        return view('livewire.admin.admin-investment-plan-component',[
            'investment_plans'=>$investment_plans
        ])->layout('layouts.base');
    }
}
