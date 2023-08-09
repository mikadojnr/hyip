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

    public $amount;
    public $mode;

    public $showElement = false;

    public function toggleElement()
    {
        $this->showElement = !$this->showElement;
    }

    public function requestBonusWithdrawal()
    {
        $bonusBalance = round($this->getCurrentBonusBalance(), 2);

        $this->validate([
            'amount' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/|min:50|max:'.$bonusBalance,
            'mode' => 'required'

        ]);



        $bonusBalance = round($this->getCurrentBonusBalance(), 2);

        $user_details = UserDetail::where('user_id', Auth::user()->id)->exists();

        if ($user_details) {
            if ($bonusBalance > 50)
            {
                if ($this->amount <= $bonusBalance) {

                        $transaction = Transaction::create([
                            'user_id' => Auth::user()->id,
                            'mode' => $this->mode,
                            'status' => 'requested',
                            'type' => 'withdrawal',
                            'amount' => $this->amount,
                            'description' => 'bonus',
                        ]);
                        session()->flash('message', 'Withdrawal requested successfully!');
                        return redirect()->route('user.referrals');

                }

            }
            session()->flash('error_message', 'Minimum withdrawal is at 50 USDT');
            return redirect()->route('user.referrals');
        }
        else {
            session()->flash('error_message', 'No Payment Details Found! Add payment details on profile page');
            return redirect()->route('user.referrals');
        }


    }

    public function gettotalPeopleReferred()
    {
        return Referral::where('referrer_id', Auth::user()->id)
            ->count();
    }

    public function getTotalEarnedBonus()
    {
        return Transaction::where('description', 'bonus')
            ->where('user_id', Auth::user()->id)
            ->where('type', 'deposit')
            ->where('status', 'approved')
            ->sum('amount');
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

        return ($earnedBonus - $withdrawnBonus);
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


            'currentBonusBalance' => $this->getCurrentBonusBalance(),
            'totalWithdrawnBonus' => $this->getTotalWithdrawnBonus(),
            'totalPeopleReferred' => $this->gettotalPeopleReferred(),
            'getTotalEarnedBonus' => $this->getTotalEarnedBonus(),

        ])->layout('layouts.base');
    }
}
