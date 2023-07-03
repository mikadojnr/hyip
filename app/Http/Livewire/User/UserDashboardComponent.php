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
    public $countdown;

    public $userInvestment;
    public $yieldSum;
    public $yieldPerDay;
    public $increasePerDay;

    public $daysPassed;
    public $nextDivisibleBySeven;
    public $daysLeftToNextDivisibleBySeven;

    public $expiryDate;





    public function mount()
    {
        $userInvestment = UserInvestment::where('user_id', auth()->id())
            ->where('is_active', true)
            ->where('is_completed', false)
            ->latest('created_at')
            ->first();

        $this->userInvestment = $userInvestment;

        if ($userInvestment) {

            // New
            $createdDate = Carbon::parse($userInvestment->created_at);
            $expiryDate = $createdDate->addDays($userInvestment->investmentPlan->duration);
            $currentDate = Carbon::now();
            $countdown = $createdDate->diffInDays($currentDate);

            $this->daysPassed = $countdown;

            $yieldPercentage = $userInvestment->investmentPlan->percentage/100;
            $totalYield = $userInvestment->amount * $yieldPercentage;
            $yieldPerDay = $totalYield / $userInvestment->duration;
            $increasePerDay = $userInvestment->amount * $yieldPercentage / $userInvestment->investmentPlan->duration;

            // Calculate the yield sum
            $yieldSum = 0;
            $loopDate = $currentDate->copy()->addDay(); // Start from the next day
            $daysPassed = $userInvestment->duration - $countdown; // Calculate the number of days that have passed

            while ($daysPassed > 0) {
                $yieldSum += $yieldPerDay;
                $loopDate->addDay();
                $daysPassed--;
            }

            $this->expiryDate = $expiryDate;

            $this->increasePerDay = round($increasePerDay, 2);
            $this->yieldSum = round($yieldSum, 2);
            $this->yieldPerDay = $yieldPerDay;

            // Calculate the expected completion date
            if ($this->daysPassed % $userInvestment->duration === 0) {
                // Mark the user investment as completed
                $userInvestment->is_completed = true;
                $userInvestment->is_active = false;
                $userInvestment->save();

                Transaction::create([
                    'user_id' => $userInvestment->user_id,
                    'user_investment_id' => $userInvestment->id,
                    'investment_plan_id' => $userInvestment->investment_plan_id,
                    'amount' => $userInvestment->profit,
                    'status' => 'pending',
                    'mode' => 'usdt',
                    'type' => 'withdrawal',
                    'description' => 'yield'
                ]);
            }

        }
    }
    public function getTotalAmountWithdrawnByUser()
    {
        return Transaction::where('user_id', Auth::user()->id)
            ->where('type', 'withdrawal')
            ->where('status', 'approved')
            ->sum('amount');
    }

    // public function getTotalAmountEarnedByUser()
    // {
    //     return Transaction::where('user_id', Auth::user()->id)
    //         ->whereIn('description', ['bonus', 'yield'])
    //         ->where('type', ['withdrawal', 'deposit'])
    //         ->where('status', 'approved')
    //         ->sum('amount');
    // }

    public function getCurrentBalanceOfUser()
    {
        // the current balance is the returns of staking awaiting withdrawals
       return Transaction::where('user_id', Auth::user()->id)

            ->where('type', 'withdrawal')
            ->where('status', 'pending')
            ->where('description', 'yield')
            ->sum('amount');

    }

    public function getTotalEarnedBonus()
    {
        return Transaction::where('description', 'bonus')
            ->where('user_id', Auth::user()->id)
            ->where('status', 'approved')
            ->sum('amount');
    }

    public function gettotalPeopleReferred()
    {
        return Transaction::where('description', 'bonus')
        ->where('user_id', Auth::user()->id)
            ->where('status', 'approved')
            ->count();
    }

    public function getTotalWithdrawnBonus()
    {
        return Transaction::where('description', 'bonus')
        ->where('user_id', Auth::user()->id)
            ->where('type', 'withdrawal')
            ->where('status', 'approved')
            ->sum('amount');
    }

    public function getCurrentBonusBalance()
    {
        $earnedBonus = $this->getTotalEarnedBonus();
        $withdrawnBonus = $this->getTotalWithdrawnBonus();

        return $earnedBonus - $withdrawnBonus;
    }

    public function getRecordsTotalPendingWithdrawalFromInvestmentYield()
    {
        return Transaction::where('type', 'withdrawal')
            ->where('user_id', Auth::user()->id)
            ->where('status', 'pending')
            ->where('description', 'yield')
            ->get();
    }


    public function render()
    {
        $userId = Auth::user()->id;

        $totalReferralAmount = $this->getTotalEarnedBonus();

        $totalReferrals = Referral::where('referrer_id', Auth::user()->id)
        ->count();

        $referralCode = User::where('id', Auth::user()->id)->value('referral_code');

        $pendingWithdrawals = $this->getRecordsTotalPendingWithdrawalFromInvestmentYield();

        // $totalAmountEarned = $this->getTotalAmountEarnedByUser($userId);


        $totalWithdrawal = $this->getTotalAmountWithdrawnByUser($userId);

        $currentBalance = $this->getCurrentBalanceOfUser($userId);

        return view('livewire.user.user-dashboard-component',[
            'referralCode'=>$referralCode,
            'pendingWithdrawals'=>$pendingWithdrawals,
            // 'totalAmountEarned'=>$totalAmountEarned,
            'totalWithdrawal'=>$totalWithdrawal,
            'currentBalance'=>$currentBalance,
            'totalReferralAmount'=>$totalReferralAmount,
            'totalReferrals'=>$totalReferrals,
        ])->layout('layouts.base');
    }
}
