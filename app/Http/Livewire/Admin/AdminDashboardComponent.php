<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Transaction;
use Carbon\Carbon;

class AdminDashboardComponent extends Component
{
    public function render()
    {
        $depositToday = Transaction::where('type','deposit')
        ->where('status','approved')
        ->whereDate('created_at', Carbon::today())
        ->sum('amount');

        return view('livewire.admin.admin-dashboard-component',[
            'depositToday'=>$depositToday
        ])->layout('layouts.base');
    }
}
