<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Transaction;
use App\Models\UserInvestment;
use App\Models\User;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserDashboardComponent extends Component
{
    // protected function generateReferralCode()
    // {
    //     $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    //     $code = '';

    //     while (strlen($code) < 5) {
    //         $code .= $characters[rand(0, strlen($characters) - 1)];
    //     }

    //     // Check if the generated code already exists in the users table
    //     $existingCode = User::where('referral_code', $code)->exists();

    //     if ($existingCode) {
    //         // If the code already exists, generate a new one recursively
    //         return generateReferralCode();
    //     }

    //     return $code;
    // }

    public function render()
    {
        $referralCode = User::where('id', Auth::user()->id)->value('referral_code');

        $pendingWithdrawals = Transaction::where('user_id', Auth::user()->id)
        ->where('status', 'pending')->where('type', 'withdrawal')
        ->orderBy('created_at', 'desc')->get();

        $totalAmountEarned = Transaction::where('user_id', Auth::user()->id)
        ->where('status', 'approved')->sum('amount');


        $totalWithdrawal = Transaction::where('user_id', Auth::user()->id)
        ->where('status', 'approved')->where('type', 'withdrawal')
        ->sum('amount');

        $activeInvestment = UserInvestment::where('user_id', Auth::user()->id)->latest()->first();

        return view('livewire.user.user-dashboard-component',[
            'referralCode'=>$referralCode,
            'pendingWithdrawals'=>$pendingWithdrawals,
            'totalAmountEarned'=>$totalAmountEarned,
            'totalWithdrawal'=>$totalWithdrawal,
            'activeInvestment'=>$activeInvestment,
        ])->layout('layouts.base');
    }
}
