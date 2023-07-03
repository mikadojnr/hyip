<?php

namespace App\Http\Livewire\Admin;

use App\Models\Transaction;
use Livewire\Component;
use Livewire\WithPagination;

class AdminAllTransactions extends Component
{
    public $searchTerm;

    use WithPagination;




    public function render()
    {
        if ($this->searchTerm) {
            // $transactions = Transaction::where('name', 'like', '%' . $this->searchTerm . '%')->get();

            $transactions = Transaction::join('users', 'transactions.user_id', '=', 'users.id')
            ->where('users.name', 'LIKE', '%' . $this->searchTerm . '%')
            ->orderBy('transactions.updated_at', 'desc')
            ->select('transactions.*')
            ->get();
        }
        else {
            $transactions = Transaction::orderBy('updated_at', 'desc')->paginate(20);
        }


        return view('livewire.admin.admin-all-transactions',[
            'transactions'=>$transactions,
        ])->layout('layouts.base');
    }
}
