<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Transaction;
use App\Models\Referral;
use App\Models\UserInvestment;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use App\Http\Livewire\User\UserReferralsComponent;


class AdminTransactionDetailComponent extends Component
{
    public $transaction_id;

    public function mount($transaction_id)
    {
        $this->transaction_id = $transaction_id;
    }

    public function approvePayment($transaction_id)
{
    // Check the record for this transaction id
    $record = Transaction::find($transaction_id);
    $profit = (($record->investmentPlan->percentage/100) * $record->amount) + $record->amount;

    // If the record exists, update the status to 'approved'
    if ($record) {

        $record->status = 'approved';
        $record->save();

        $investment = UserInvestment::where('transaction_id', $record->id)->first();

        // Then check for the investment with transaction_id = $record->id and update is_active to true
        if ($investment) {
            $investment->is_active = true;
            $investment->save();
        } else {
            // Create a new user investment record
            // Check for the investment that started when the transaction was approved

            $userInvestment = UserInvestment::create([
                'user_id' => $record->user_id,
                'investment_plan_id' => $record->investment_plan_id,
                'duration' => $record->investmentPlan->duration,
                'amount' => $record->amount,
                'is_active' => true,
                'is_completed' => false,
                'transaction_id' => $record->id,
                'profit' => $profit,
            ]);
        }

        // Find the referees
        $referees = Referral::where('referee_id', $record->user_id)->get();

        if ($referees) {
            // Loop through all the records
            foreach ($referees as $referee) {
                // Check if there is a value on the record or not
                if ($referee->referral_amount < 1) {
                    $referralAmount = $record->amount * 0.05;

                    // Update the referral amount in the referrals table
                    $referee->referral_amount = $referralAmount;
                    $referee->save();

                    // Create transaction record that credits user with referral bonus
                    // Generate deposit to the user
                    $referralDeposit = new Transaction;
                    $referralDeposit->user_id = $referee->referrer_id;
                    $referralDeposit->mode = 'usdt';
                    $referralDeposit->status = 'approved';
                    $referralDeposit->type = 'deposit';
                    $referralDeposit->amount = $referralAmount;
                    $referralDeposit->description = 'bonus';
                    $referralDeposit->save();
                }
            }
        }

        session()->flash('message', 'Transaction status updated successfully!');
        return redirect()->route('admin.transaction-details', ['transaction_id' => $transaction_id]);
    }
}

    public function approveWithdrawal($transaction_id)
    {
        $record = Transaction::findOrFail($transaction_id);

        if ($record) {
            $record->status = 'approved';
            $record->type = 'withdrawal';
            $record->description = 'yield';

            $chargeAmount = $record->amount * 0.05;

            $record->amount -= $chargeAmount;

            $record->save();

            // create a charge transaction
            Transaction::create([
                'user_id' => $record->user_id,
                'mode' => $record->mode,
                'status' => 'approved',
                'type' => 'charge',
                'amount' => $chargeAmount,
                'description' => 'withdrawal charge',
            ]);

            session()->flash('message', 'Withdrawal approved successfully!');
        }
    }

    public function approveBonusWithdrawal()
    {

        $record = Transaction::findOrFail($transaction_id);

        if ($record) {
            $record->status = 'approved';
            $record->type = 'withdrawal';
            $record->description = 'bonus';

            $chargeAmount = $record->amount * 0.05;

            $record->amount -= $chargeAmount;

            $record->save();

            // create a charge transaction
            Transaction::create([
                'user_id' => $record->user_id,
                'mode' => $record->mode,
                'status' => 'approved',
                'type' => 'charge',
                'amount' => $chargeAmount,
                'description' => 'withdrawal charge',
            ]);

            session()->flash('message', 'Withdrawal approved successfully!');
            return $this->render;
        }
    }


    public function render()
    {

        $transaction = Transaction::find($this->transaction_id);

        return view('livewire.admin.admin-transaction-detail-component',[
            'transaction'=>$transaction
        ])
        ->layout('layouts.base');
    }
}
