<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\InvestmentPlan;
use Livewire\WithValidation;

class AdminAddInvestmentPlanComponent extends Component
{
    use WithValidation;

    public $name;
    public $price;
    public $percentage;
    public $duration;
    public $is_active;



    public function storePlan()
    {
        $this->validate([
            'name'=>'required|min:3',
            'price'=>'required',
            'percentage'=>'required',
            'is_active;'=>'required'

        ]);

        $plan = new InvestmentPlan;
        $plan->name = $name;
        $plan->price = $price;
        $plan->percentage = $percentage;
        $plan->duration = $duration;
        $plan->is_active = $is_active;
        $plan->save();
        session()->flash('message', 'Category has been created successfully!');

        $this->render();
    }

    public function render()
    {
        return view('livewire.admin.admin-add-investment-plan-component')->layout('layouts.base');
    }
}
