<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Referral;
use App\Models\User;
use Livewire\WithPagination;



use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserReferralsComponent extends Component
{
    use WithPagination;

    public $searchTerm;


    public function render()
    {

        $totalReferralAmount = Referral::where('referrer_id', Auth::user()->id)
        ->sum('referral_amount');

        $totalReferrals = Referral::where('referrer_id', Auth::user()->id)
        ->count();

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
            'totalReferralAmount'=>$totalReferralAmount,
            'totalReferrals'=>$totalReferrals,
        ])->layout('layouts.base');
    }
}
