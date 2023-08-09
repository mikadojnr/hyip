<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

use App\Models\User;
use App\Models\UserDetail;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Hash;

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


    public $oldPassword;
    public $newPassword;
    public $confirmPassword;

    public function mount($user_id)
    {
        $this->user_id = $user_id;

        $user = User::where('id', Auth::user()->id)->first();

        $this->get_name = Str::title($user->name);
        $this->get_email = $user->email;
        $this->get_referral_code = $user->referral_code;

        $userdetail = UserDetail::where('user_id', Auth::user()->id)->first();

        if ($userdetail) {
            $this->get_bank_name = Str::upper($userdetail->bank_name);
            $this->get_account_number = $userdetail->account_number;
            $this->get_account_name = Str::upper($userdetail->account_name);
            $this->get_usdt_wallet = $userdetail->usdt_wallet;
        }

    }

    public function updateDetails()
    {
        $this->validate([
            'get_bank_name' => 'required',
            'get_account_number' => 'required',
            'get_account_name' => 'required',
            'get_usdt_wallet' => 'required',
        ]);

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
        return redirect()->route('user.profile',['user_id'=>Auth::user()->id]);
    }

    public function changePassword()
    {
        $this->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required|min:8',
            'confirmPassword' => 'required|same:newPassword',

        ]);

        $user = Auth::user();

        // check if old password matches entered password
        if(!Hash::check($this->oldPassword, $user->password))
        {
            session()->flash("error_message", "Old Password and current password does not match!");
            return redirect()->route('user.profile',['user_id'=>Auth::user()->id]);
        }
        else{
            $user->password = Hash::make($this->newPassword);
            $user->save();

            // clear the form fields
            $this->oldPassword ='';
            $this->newPassword ='';
            $this->confirmPassword = '';

            session()->flash("message", "Password was changed successfully!");
            return redirect()->route('user.profile',['user_id'=>Auth::user()->id]);
        }
    }

    public function render()
    {
        return view('livewire.user.user-profile-component')->layout('layouts.base');
    }
}
