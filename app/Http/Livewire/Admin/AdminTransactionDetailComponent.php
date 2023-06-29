<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Transaction;
use App\Models\Referral;
use App\Models\UserInvestment;

class AdminTransactionDetailComponent extends Component
{
    public $transaction_id;

    public function mount($transaction_id)
    {
        $this->transaction_id = $transaction_id;
    }

    public function approveTransaction($transaction_id)
    {
        $record = Transaction::find($transaction_id); // Assuming YourModel represents your model name and $id is the record's ID

        if ($record) {
            if ($record->status === 'pending') {
                $record->status = 'approved';
                $record->save();

                // Create a new user investment record
                $userInvestment = UserInvestment::create([
                    'user_id' => $record->user_id,
                    'investment_plan_id' => $record->investment_id,
                    'duration' => $record->investmentPlan->duration,
                    'amount' => $record->amount,
                    'is_active' => true,
                    'is_completed' => false,
                    'transaction_id' => $record->id,
                ]);

            }
            session()->flash('message', 'Transaction status updated successfully!');
        }

        $user = $record->user_id;


        // Find the referrals for the currently logged in user
        $referrers = Referral::where('referrer_id', $user)->get();

        foreach ($referrers as $referrer) {
            // Check if there is a transaction record for the referee
            $transaction = Transaction::where('user_id', $referrer->referee_id)
                ->where('type', 'deposit')
                ->where('status', 'approved')
                ->first();

            if ($transaction && $transaction->amount < 1) {
                $referralAmount = $transaction->amount * 0.05;

                // Update the referral amount in the referrals table
                $referral->referral_amount = $referralAmount;
                $referral->save();
            }
        }

        return redirect()->route('admin.transaction-details',['transaction_id'=>$this->transaction_id]);

    }

    public function makeTransactionPending($transaction_id)
    {
        $record = Transaction::find($transaction_id); // Assuming YourModel represents your model name and $id is the record's ID

        if ($record) {
            if ($record->status === 'approved') {
                $record->status = 'pending';
                $record->save();

            $investment = UserInvestment::where('transaction_id', $record->id)->first();
            if ($investment) {
                $investment->is_active = false;
                $investment->save();
            }

            }
            session()->flash('message', 'Transaction status updated successfully!');

            return redirect()->route('admin.transaction-details',['transaction_id'=>$this->transaction_id]);
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
