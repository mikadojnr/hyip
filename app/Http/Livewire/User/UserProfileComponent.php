<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

use App\Models\User;
use App\Models\UserDetail;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserProfileComponent extends Component
{
    public $user_id;

    public $get_name;
    public $get_email;
    public $get_referral_code;

    public $get_bank_name;
    public $get_account_number;
    public $get_account_name;
    public $get_usdt_wallet;

    public function mount($user_id)
    {
        $this->user_id = $user_id;

        $user = User::where('id', Auth::user()->id)->first();

        $this->get_name = $user->name;
        $this->get_email = $user->email;
        $this->get_referral_code = $user->referral_code;

        $userdetail = UserDetail::where('user_id', Auth::user()->id)->first();

        if ($userdetail) {
            $this->get_bank_name = $userdetail->bank_name;
            $this->get_account_number = $userdetail->account_number;
            $this->get_account_name = $userdetail->account_name;
            $this->get_usdt_wallet = $userdetail->usdt_wallet;
        }

    }

    public function updateDetails()
    {
        $findUserDetail = ['user_id' => Auth::user()->id];

        $data = [
            'user_id' => Auth::user()->id,
            'bank_name' => $this->get_bank_name,
            'account_number' => $this->get_account_number,
            'account_name' => $this->get_account_name,
            'usdt_wallet' => $this->get_usdt_wallet,
        ];

        $update = UserDetail::updateOrCreate($findUserDetail, $data);

        if ($update->wasRecentlyCreated) {
            session()->flash('message', 'Record was created successfully.');

        }
        else {
            session()->flash('message', 'Record was updated successfully.');

        }
        return redirect()->route('user.detail',['user_id'=>Auth::user()->id]);
    }
    public function render()
    {
        return view('livewire.user.user-profile-component')->layout('layouts.base');
    }
}
