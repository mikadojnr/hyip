<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\InvestmentPlan;

use Illuminate\Support\Str;


class AdminInvestmentPlanComponent extends Component
{
    public function deletePlan($id)
    {
        $plan = InvestmentPlan::find($id);
        $plan->delete();
        session()->flash('message','Plan has been deleted succesfully!');
        $this->render();
    }

    public function render()
    {
        $investment_plans = InvestmentPlan::get()->where('is_active', '1');

        return view('livewire.admin.admin-investment-plan-component',[
            'investment_plans'=>$investment_plans
        ])->layout('layouts.base');
    }
}
