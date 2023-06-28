<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Actions\Fortify\CreateNewUser;
use App\Models\User;
use App\Models\Referral;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use App\Actions\Fortify\PasswordValidationRules;


class RegistrationWithReferralComponent extends Component
{
    use PasswordValidationRules;

    public $referral_code;

    protected $createNewUser;

    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    public function mount($referral_code)
    {
        if ($referral_code) {
            $this->referral_code = $referral_code;
        }

    }

    public function saveUser() {

        $referralCode = $this->generateReferralCode();

        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),

        ]);

        // check if referral code is in route
        if ($this->referral_code) {

            // Handle the referral code if valid
            $referrer = User::where('referral_code', $this->referral_code)->first();

            // if treferal code exist and is valid
            if ($referrer) {

                // check if password matches
                if ($this->password === $this->password_confirmation )  {
                    $user = User::create([
                        'name' => $this->name,
                        'email' => $this->email,
                        'password' => Hash::make($this->password),
                        'referral_code' => $this->generateReferralCode(),
                    ]);

                    // Create a referral relationship
                    Referral::create([
                        'referrer_id' => $referrer->id,
                        'referee_id' => $user->id,

                    ]);

                }
                // if password does not match
                else {
                    session()->flash('error_message','Passwords do not match!');
                    return $this->render();
                }

            }
            // if referral code is not valid
            else {
                session()->flash('error_message','Wrong or Incorrect Referral Code');
                return $this->render();
            }
        }

        // If referral_code is not found in Route
        else
        {
            if ($this->password === $this->password_confirmation )  {
                $user = User::create([
                    'name' => $this->name,
                    'email' => $this->email,
                    'password' => Hash::make($this->password),
                    'referral_code' => $this->generateReferralCode(),
                ]);
            }
            else {
                session()->flash('error_message','Passwords do not match!');
                return $this->render();
            }
        }

        // Log in the user
        Auth::login($user);

        return redirect()->route('home');

    }


    protected static function generateReferralCode()
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $code = '';

        while (strlen($code) < 5) {
            $code .= $characters[rand(0, strlen($characters) - 1)];
        }

        // Check if the generated code already exists in the users table
        $existingCode = User::where('referral_code', $code)->exists();

        if ($existingCode) {
            // If the code already exists, generate a new one recursively
            return self::generateReferralCode();
        }

        return $code;
    }

    public function render()
    {
        return view('livewire.registration-with-referral-component')->layout('layouts.base');
    }
}
