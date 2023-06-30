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
        $profit = (($record->investmentPlan->percentage/100) * $record->amount) + $record->amount;
        if ($record) {

            $record->status = 'approved';
            $record->save();

            $investment = UserInvestment::where('transaction_id', $record->id)->first();

            if ($investment) {
                $investment->is_active = true;
                $investment->save();
            }
            else {
                // Create a new user investment record
                $userInvestment = UserInvestment::create([
                    'user_id' => $record->user_id,
                    'investment_plan_id' => $record->investment_plan_id,
                    'duration' => $record->investmentPlan->duration,
                    'amount' => $record->amount,
                    'is_active' => true,
                    'is_completed' => false,
                    'transaction_id' => $record->id,
                    'profit'=> $profit,
                ]);
            }


            // Find the referrals
            $referees = Referral::where('referee_id', $record->user_id)->get();

            if ($referees) {
                foreach ($referees as $referee) {

                    if ($referee->referral_amount < 1) {
                        $referralAmount = $record->amount * 0.05;

                        // Update the referral amount in the referrals table

                        $referee->referral_amount = $referralAmount;
                        $referee->save();
                    }

                }
            }


            session()->flash('message', 'Transaction status updated successfully!');
            return redirect()->route('admin.transaction-details',['transaction_id'=>$transaction_id]);
        }

    }


    public function makeTransactionPending($transaction_id)
    {
        $record = Transaction::find($transaction_id);

        if ($record) {
            $record->status = 'pending';
            $record->save();

            $investment = UserInvestment::where('transaction_id', $record->id)->first();

            if($investment)
            {
                $investment->is_active = false;
                $investment->save();
            }

        }
        session()->flash('message', 'Transaction status updated successfully!');
        return redirect()->route('admin.transaction-details',['transaction_id'=>$this->transaction_id]);


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
