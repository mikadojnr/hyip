<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Referral;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use App\Helpers;
class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    public $referral_code;


    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */

    public function create(array $input)
    {
        $referralCode = $this->generateReferralCode();

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),

            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'referral_code' => $this->generateReferralCode(),
        ]);


        if($this->referral_code)
        {
            // Handle the referral code if valid
            $referrer = User::where('referral_code', $this->referral_code)->first();

            if ($referrer) {
                // Create a referral relationship
                Referral::create([
                    'referrer_id' => $referrer->id,
                    'referee_id' => $user->id,
                ]);

            }
        }

        return $user;

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



}
