<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Referral;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\Transaction;
use Livewire\WithPagination;



use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserReferralsComponent extends Component
{
    use WithPagination;

    public $searchTerm;
    public $currentBonusBalance;
    public $totalWithdrawnBonus;
    public $totalPeopleReferred;
    public $getTotalEarnedBonus;

    public $amount;
    public $mode;

    public $showElement = false;

    public function mount()
    {
        $this->currentBonusBalance = round($this->getCurrentBonusBalance(), 2);
        $this->totalWithdrawnBonus = $this->getTotalWithdrawnBonus();
        $this->totalPeopleReferred = $this->gettotalPeopleReferred();
        $this->getTotalEarnedBonus = $this->getTotalEarnedBonus();
    }

    public function toggleElement()
    {
        $this->showElement = !$this->showElement;
    }

    public function requestBonusWithdrawal()
    {
        $bonusBalance = round($this->getCurrentBonusBalance(), 2);

        if ($bonusBalance > 50)
        {
            $transaction = Transaction::create([
                'user_id' => Auth::user()->id,
                'mode' => 'usdt',
                'status' => 'pending',
                'type' => 'withdrawal',
                'amount' => $bonusBalance,
                'description' => 'bonus',
            ]);
        }
        else{
            session()->flash('error_message', 'Minimum withdrawal is 20 USDT');
            return redirect()->route('user.referrals');
        }
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


    public function render()
    {

        if ($this->searchTerm) {

            $referrals = Referral::join('users', 'referrals.referee_id', '=', 'users.id')
            ->where('users.name', 'LIKE', '%' . $this->searchTerm . '%')
            ->where('users.email', 'LIKE', '%' . $this->searchTerm . '%')
            ->where('referrals.referrer_id', Auth::user()->id)
            ->orderBy('referrals.created_at', 'desc')
            ->select('users.*')
            ->get();
        }
        else {
            $referrals = Referral::where('referrer_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(20);
        }

        $referralCode = User::where('id', Auth::user()->id)->value('referral_code');

        return view('livewire.user.user-referrals-component',[
            'referrals'=>$referrals,
            'referralCode'=>$referralCode,
        ])->layout('layouts.base');
    }
}
