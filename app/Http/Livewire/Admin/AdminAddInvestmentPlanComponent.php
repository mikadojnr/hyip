<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\InvestmentPlan;

class AdminAddInvestmentPlanComponent extends Component
{
    public $name;
    public $price;
    public $percentage;
    public $duration;
    public $is_active;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required|min:3',
            'price' => 'required|integer',
            'percentage' => 'required|integer',
            'duration' => 'required|integer',
            'is_active' => 'required'
        ]);
    }

    public function storePlan()
    {
        $this->validate([
            'name' => 'required|min:3|unique:investment_plans,name',
            'price' => 'required|integer',
            'percentage' => 'required|integer',
            'duration' => 'required|integer',
            'is_active' => 'required'

        ]);

        $plan = new InvestmentPlan;
        $plan->name = $this->name;
        $plan->price = $this->price;
        $plan->percentage = $this->percentage;
        $plan->duration = $this->duration;
        $plan->is_active = $this->is_active;
        $plan->save();
        session()->flash('message', 'Investment Plan has been created successfully!');
        $this->resetForm();
        return redirect()->route('admin.investment-plans');
    }

    public function resetForm()
    {
        $this->name = '';
        $this->price = '';
        $this->percentage = '';
        $this->duration = '';
        $this->is_active = '';
    }

    public function render()
    {
        return view('livewire.admin.admin-add-investment-plan-component')->layout('layouts.base');
    }
}
