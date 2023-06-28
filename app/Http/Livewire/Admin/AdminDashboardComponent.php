<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Transaction;
use Carbon\Carbon;

class AdminDashboardComponent extends Component
{
    public function approveTransaction($id) {
        $trans = Transaction::find($id);
        $trans->status = 'approved';
        $trans->save();
        session()->flash('message','Transaction has been updated succesfully!');
        return redirect()->route('admin.dashboard');
    }

    public function render()
    {
        $depositToday = Transaction::where('type','deposit')
        ->where('status','approved')
        ->whereDate('created_at', Carbon::today())
        ->sum('amount');

        $pendingDeposit = Transaction::where('type', 'deposit')
        ->where('status','pending')
        ->count();

        $totalDeposit = Transaction::where('type', 'deposit')
        ->where('status','approved')
        ->sum('amount');

        $pendingWithdrawal = Transaction::where('type', 'withdrawal')
        ->where('status','pending')
        ->count();

        $withdrawalToday = Transaction::where('type','withdrawal')
        ->where('status','approved')
        ->whereDate('created_at', Carbon::today())
        ->sum('amount');

        $totalWithdrawal = Transaction::where('type', 'withdrawal')
        ->where('status','approved')
        ->sum('amount');

        $pendingDepositRecords = Transaction::where('type', 'deposit')
        ->where('status','pending')->orderBy('created_at', 'desc')
        ->get();

        $pendingWithdrawalRecords = Transaction::where('type', 'withdrawal')
        ->where('status','pending')->orderBy('created_at', 'desc')
        ->get();

        return view('livewire.admin.admin-dashboard-component',[
            'depositToday'=>$depositToday,
            'pendingDeposit'=>$pendingDeposit,
            'totalDeposit'=>$totalDeposit,
            'pendingWithdrawal'=>$pendingWithdrawal,
            'witdrawalToday'=>$withdrawalToday,
            'totalWithdrawal'=>$totalWithdrawal,

            'pendingDepositRecords'=>$pendingDepositRecords,
            'pendingWithdrawalRecords'=>$pendingWithdrawalRecords
        ])->layout('layouts.base');
    }
}
