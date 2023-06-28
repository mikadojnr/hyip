<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Transaction;

class AdminTransactionDetailComponent extends Component
{
    public $transaction_id;

    public function mount($transaction_id)
    {
        $this->transaction_id = $transaction_id;
    }

    public function changeStatus($transaction_id)
    {
        $record = Transaction::find($transaction_id); // Assuming YourModel represents your model name and $id is the record's ID

        if ($record) {
            if ($record->status === 'pending') {
                $record->status = 'approved';
            } elseif ($record->status === 'approved') {
                $record->status = 'pending';
            }

            $record->save();
            session()->flash('message', 'Transaction status updated successfully!');
        }

        return redirect()->route('admin.transaction-details',['transaction_id'=>$transaction_id]);

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
