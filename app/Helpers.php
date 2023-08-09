<?php

use App\Models\User;


function generateReferralCode()
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
        return generateReferralCode();
    }

    return $code;
}
