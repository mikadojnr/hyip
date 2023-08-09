<?php

namespace App\Http\Livewire\User;


use Livewire\Component;
use App\Models\Transaction;
use App\Models\UserInvestment;
use App\Models\User;
use App\Models\InvestmentPlan;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use Carbon\Carbon;
use App\Http\Livewire\Admin\AdminTransactionDetailComponent;
use Livewire\WithFileUploads;




class PaymentComponent extends Component
{

    use WithFileUploads;

    public $plan_id;

    public $get_userId;
    public $get_planId;
    public $get_name;
    public $get_price;
    public $get_percentage;
    public $get_duration;
    public $get_mode;
    public $get_image;

    public $userTransaction;

    public $activeUserInvestment;

    public function mount($plan_id)
    {
        $activeUserInvestment = UserInvestment::where('user_id', Auth::User()->id)
        ->where('is_active', true)
        ->exists();

        $transaction = Transaction::where('user_id', Auth::user()->id)
        ->where('status', 'pending')
        ->where('type', 'deposit')
        ->exists();

        $this->userTransaction = $transaction;
        $this->activeUserInvestment = $activeUserInvestment;
        $this->plan_id = $plan_id;

        $plan = InvestmentPlan::find($this->plan_id);
        $this->get_name = $plan->name;

        $this->get_userId = Auth::user()->id;

        $this->get_planId = $plan->id;
        $this->get_name = Str::title($plan->name);
        $this->get_price = $plan->price;
        $this->get_percentage = $plan->percentage;
        $this->get_duration = $plan->duration;

    }

    public function makePayment() {

        // The following happens when a user attempts paying for a plan

        // Check if there is an active investment already runnning and prompts the user
        if ($this->activeUserInvestment) {
            session()->flash('error_message', 'Payment Error! An active investment was found on your dashboard');
            return redirect()->route('user.payment', ['plan_id'=>$this->get_planId]);
        }

        // Check if the user has already made payment for a plan that is yet to be approved for investment to be active
        elseif ($this->userTransaction) {
            session()->flash('error_message', 'Payment Error! You still have pending payment!');
            return redirect()->route('user.payment', ['plan_id'=>$this->get_planId]);
        }

        // If no active investment or pending deposit, process payment on DB
        else {

            // validate the image upload field
            $this->validate([
                'get_image' => 'required|image|max:2048', // Validate image file format and size
            ]);

            // create a new record in the Transaction table
            $transaction = new Transaction;
            $transaction->user_id = Auth::user()->id;
            $transaction->mode = $this->get_mode;
            $transaction->status = 'pending';
            $transaction->type = 'deposit';
            $transaction->amount = $this->get_price;
            $transaction->investment_plan_id = $this->get_planId;
            $transaction->description = 'payment';

            // Process image name to save on DB based on the timestamp
            $get_imageName = Carbon::now()->timestamp.'.'.$this->get_image->extension();

            // copy the image to the /proofs folder &change the name
            $this->get_image->storeAs('proofs',$get_imageName);

            // save the image name on DB
            $transaction->proof = $get_imageName;

            $transaction->save();

            session()->flash('message', 'Your Payment is being processed!');
            return redirect()->route('user.payment', ['plan_id'=>$this->get_planId]);
        }


    }

    public function render()
    {


        return view('livewire.user.payment-component',[

        ])->layout('layouts.base');
    }
}
