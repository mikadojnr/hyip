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
    public $valueToday;
    public $userInvestment;
    public $yieldSum;
    public $yieldPerDay;
    public $increasePerDay;



    public function mount()
    {
        $userInvestment = UserInvestment::where('user_id', auth()->id())
            ->where('is_active', true)
            ->where('is_completed', false)
            ->latest('created_at')
            ->first();

        $this->userInvestment = $userInvestment;

        if ($userInvestment) {
            $createdDate = Carbon::parse($userInvestment->created_at);
            $expiryDate = $createdDate->addDays($userInvestment->investmentPlan->duration);
            $currentDate = Carbon::now();
            $countdown = $currentDate->diffInDays($expiryDate);

            $yieldPercentage = $userInvestment->investmentPlan->percentage/100;
            $totalYield = $userInvestment->amount * $yieldPercentage;
            $yieldPerDay = $totalYield / $userInvestment->duration;
            $increasePerDay = $userInvestment->amount * $yieldPercentage / $userInvestment->investmentPlan->duration;

            // Calculate the yield sum
            $yieldSum = 0;
            $loopDate = $currentDate->copy()->addDay(); // Start from the next day
            while ($countdown > $userInvestment->investmentPlan->duration) {
                $yieldSum += $yieldPerDay;
                $loopDate->addDay();
                $countdown = $loopDate->diffInDays($expiryDate);
            }
            $this->countdown = $countdown;
            $this->increasePerDay = round($increasePerDay, 2);
            $this->yieldSum = $yieldSum;
            $this->yieldPerDay = $yieldPerDay;

            // Calculate the expected completion date
            if ($currentDate->greaterThanOrEqualTo($expiryDate)) {
                // Mark the user investment as completed
                $userInvestment->is_completed = true;
                $userInvestment->is_active = false;
                $userInvestment->save();

                Transaction::create([
                    'user_id' => $userInvestment->user_id,
                    'investment_id' => $userInvestment->id,
                    'amount' => $withdrawalAmount,
                    'status' => 'pending',
                    'mode' => 'usdt',
                    'type' => 'withdrawal'
                ]);
            }

        }
    }

    public function withdrawalPermission($packageSelectedDate){
        // get the last deposited transaction date from the user class and store in the $packageSelectedDate variable;
        $packageSelectedDate;
        // Calculate the difference between the two dates in days
        $interval = $packageSelectedDate->diff(date('Y-m-d'));
        $daysDifference = $interval->days;
        if($daysDifference % 7 == 0){
            return true;
            // if it is true you can call the transaction method and use the credit type transaction
        }else{
            return false;
        }
    }


    public function render()
    {

        $totalReferralAmount = Referral::where('referrer_id', Auth::user()->id)
        ->sum('referral_amount');

        $totalReferrals = Referral::where('referrer_id', Auth::user()->id)
        ->count();

        $referralCode = User::where('id', Auth::user()->id)->value('referral_code');

        $pendingWithdrawals = Transaction::where('user_id', Auth::user()->id)
        ->where('status', 'pending')->where('type', 'withdrawal')
        ->orderBy('created_at', 'desc')->get();

        $totalAmountEarned = Transaction::where('user_id', Auth::user()->id)
        ->where('status', 'approved')
        ->where('type', 'pending')
        ->sum('amount');


        $totalWithdrawal = Transaction::where('user_id', Auth::user()->id)
        ->where('status', 'approved')->where('type', 'withdrawal')
        ->sum('amount');

        $currentBalance = Transaction::where('type', 'withdrawal')
        ->where('status', 'pending')
        ->where('user_id', Auth::user()->id)
        ->sum('amount');

        return view('livewire.user.user-dashboard-component',[
            'referralCode'=>$referralCode,
            'pendingWithdrawals'=>$pendingWithdrawals,
            'totalAmountEarned'=>$totalAmountEarned,
            'totalWithdrawal'=>$totalWithdrawal,

            'currentBalance'=>$currentBalance,
            'totalReferralAmount'=>$totalReferralAmount,
            'totalReferrals'=>$totalReferrals,
        ])->layout('layouts.base');
    }
}
