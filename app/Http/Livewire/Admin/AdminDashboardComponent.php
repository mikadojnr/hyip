<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Transaction;
use App\Models\Referral;
use Carbon\Carbon;

use App\Http\Livewire\Admin\AdminTransactionDetailComponent;

class AdminDashboardComponent extends Component
{

    public function getTotalPendingWithdrawal()
    {
        return Transaction::where('type', 'withdrawal')
            ->where('status', 'requested')
            ->count();
    }

    public function getTotalPendingWithdrawalRecords()
    {
        return Transaction::where('type', 'withdrawal')
            ->where('status', 'requested')
            ->orderBy('updated_at', 'desc')
            ->get();
    }

    public function getTotalPendingDeposit()
    {
        return Transaction::where('type', 'deposit')
            ->where('status', 'pending')
            ->where('description', 'payment')
            ->count();
    }

    public function getTotalPendingDepositRecords()
    {
        return Transaction::where('type', 'deposit')
            ->where('status', 'pending')
            ->where('description', 'payment')
            ->orderBy('updated_at', 'desc')
            ->get();
    }

    public function getTotalWithdrawalForDay()
    {
        return Transaction::where('type', 'withdrawal')
            ->where('status', 'approved')
            ->whereDate('created_at', Carbon::today())
            ->sum('amount');
    }

    public function getTotalDepositsForToday()
    {
        return Transaction::where('type', 'deposit')
            ->where('status', 'approved')
            ->where('description', 'payment')
            ->whereDate('created_at', Carbon::today())
            ->sum('amount');
    }

    public function getTotalDeposits()
    {
        return Transaction::where('type', 'deposit')
            ->where('status', 'approved')
            ->where('description', 'payment')
            ->sum('amount');
    }

    public function getTotalAmountWithdrawn()
    {
        return Transaction::where('type', 'withdrawal')
            ->where('status', 'approved')
            ->sum('amount');
    }

    public function getTotalAmountWithdrawnToday()
    {
        return Transaction::whereDate('created_at', Carbon::today())
            ->where('type', 'withdrawal')
            ->where('status', 'approved')
            ->sum('amount');
    }


    public function render()
    {
        $depositToday = $this->getTotalDepositsForToday();

        $pendingDeposit = $this->getTotalPendingDeposit();

        $totalDeposit = $this->getTotalDeposits();

        $pendingWithdrawal = $this->getTotalPendingWithdrawal();

        $withdrawalToday = $this->getTotalAmountWithdrawnToday();

        $totalWithdrawal = $this->getTotalAmountWithdrawn();

        $pendingDepositRecords = $this->getTotalPendingDepositRecords();

        $pendingWithdrawalRecords = $this->getTotalPendingWithdrawalRecords();


        return view('livewire.admin.admin-dashboard-component',[
            'depositToday'=>$depositToday,
            'pendingDeposit'=>$pendingDeposit,
            'totalDeposit'=>$totalDeposit,
            'pendingWithdrawal'=>$pendingWithdrawal,
            'withdrawalToday'=>$withdrawalToday,
            'totalWithdrawal'=>$totalWithdrawal,

            'pendingDepositRecords'=>$pendingDepositRecords,
            'pendingWithdrawalRecords'=>$pendingWithdrawalRecords
        ])->layout('layouts.base');
    }
}
