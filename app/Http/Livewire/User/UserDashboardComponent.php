<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Transaction;
use App\Models\UserInvestment;
use App\Models\User;
use App\Models\Referral;

use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserDashboardComponent extends Component
{
    public $remainingDays = 0;

    public function updateReferralAmount()
    {
        $user = Auth::user()->id;

        // Find the referrals for the currently logged in user
        $referrers = Referral::where('referrer_id', $user)->get();

        foreach ($referrers as $referrer) {
            // Check if there is a transaction record for the referee
            $transaction = Transaction::where('user_id', $referrer->referee_id)
                ->where('type', 'deposit')
                ->where('status', 'approved')
                ->first();

            if ($transaction && $transaction->amount < 1) {
                $referralAmount = $transaction->amount * 0.05;

                // Update the referral amount in the referrals table
                $referral->referral_amount = $referralAmount;
                $referral->save();
            }
        }
    }



    public function render()
    {
        $this->updateReferralAmount();

        $user = auth()->user();

        $userInvestment = $user->investment()
            ->where('is_active', true)
            ->where('is_completed', false)
            ->first();

        if ($userInvestment) {
            // Calculate the expected completion date
            $expectedCompletionDate = $userInvestment->updated_at
                ->addDays($userInvestment->duration)
                ->format('Y-m-d');

            // Check if the expected completion date has been reached
            if ($expectedCompletionDate === now()->format('Y-m-d')) {
                // Mark the user investment as completed
                $userInvestment->is_completed = true;
                $userInvestment->is_active = false;
                $userInvestment->save();

                // Create a new withdrawal request
                $withdrawalAmount = $userInvestment->amount * ($userInvestment->investmentPlan->percentage / 100)
                    + $userInvestment->amount;

                WithdrawalRequest::create([
                    'user_id' => $userInvestment->user_id,
                    'investment_id' => $userInvestment->id,
                    'amount' => $withdrawalAmount,
                    'status' => 'pending',
                ]);
            }
        }

        $totalReferralAmount = Referral::where('referrer_id', Auth::user()->id)
        ->sum('referral_amount');

        $totalReferrals = Referral::where('referrer_id', Auth::user()->id)
        ->count();

        $referralCode = User::where('id', Auth::user()->id)->value('referral_code');

        $pendingWithdrawals = Transaction::where('user_id', Auth::user()->id)
        ->where('status', 'pending')->where('type', 'withdrawal')
        ->orderBy('created_at', 'desc')->get();

        $totalAmountEarned = Transaction::where('user_id', Auth::user()->id)
        ->where('status', 'approved')->sum('amount');


        $totalWithdrawal = Transaction::where('user_id', Auth::user()->id)
        ->where('status', 'approved')->where('type', 'withdrawal')
        ->sum('amount');

        $currentBalance = UserInvestment::where('is_completed', true)
        ->where('is_active', false)
        ->where('user_id', Auth::user()->id)
        ->sum('amount');

        $activeInvestment = UserInvestment::where('user_id', Auth::user()->id)->latest()->first();

        return view('livewire.user.user-dashboard-component',[
            'referralCode'=>$referralCode,
            'pendingWithdrawals'=>$pendingWithdrawals,
            'totalAmountEarned'=>$totalAmountEarned,
            'totalWithdrawal'=>$totalWithdrawal,
            'activeInvestment'=>$activeInvestment,
            'currentBalance'=>$currentBalance,
            'totalReferralAmount'=>$totalReferralAmount,
            'totalReferrals'=>$totalReferrals,
            'userInvestment'=>$userInvestment,
        ])->layout('layouts.base');
    }
}
