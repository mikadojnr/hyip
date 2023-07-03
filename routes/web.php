<?php

use Illuminate\Support\Facades\Route;
use App\Actions\Fortify\CreateNewUser;

use App\Http\Livewire\RegistrationWithReferralComponent;


Route::get('/register/{referral_code?}', RegistrationWithReferralComponent::class)
    ->middleware(['guest'])
    ->name('register');

use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\AboutComponent;
use App\Http\Livewire\FaqsComponent;
use App\Http\Livewire\ContactComponent;


use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminInvestmentPlanComponent;
use App\Http\Livewire\Admin\AdminAddInvestmentPlanComponent;
use App\Http\Livewire\Admin\AdminDisplayUsersComponent;
use App\Http\Livewire\Admin\AdminDisplayAdminsComponent;
use App\Http\Livewire\Admin\AdminAllTransactions;
use App\Http\Livewire\Admin\AdminTransactionDetailComponent;


use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\User\UserInvestmentPlanComponent;
use App\Http\Livewire\User\PaymentComponent;
use App\Http\Livewire\User\UserReferralsComponent;
use App\Http\Livewire\User\UserTransactionComponent;
use App\Http\Livewire\User\UserProfileComponent;
// use App\Http\Livewire\User\UserWithdrawalComponent;
use App\Http\Livewire\User\UserViewTransactionDetailsComponent;


Route::get('/', HomeComponent::class)->name('home');
Route::get('/about', AboutComponent::class)->name('about');
Route::get('/faqs', FaqsComponent::class)->name('faqs');
Route::get('/contact-us', ContactComponent::class)->name('contact');


// ADMIN ROUTES
Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function () {
    Route::get('admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('admin/investment-plans', AdminInvestmentPlanComponent::class)->name('admin.investment-plans');
    Route::get('admin/add-investment-plans', AdminAddInvestmentPlanComponent::class)->name('admin.add-investment-plans');
    Route::get('admin/view-user', AdminDisplayUsersComponent::class)->name('admin.view-users');
    Route::get('admin/view-admin', AdminDisplayAdminsComponent::class)->name('admin.view-admins');
    Route::get('admin/transactions', AdminAllTransactions::class)->name('admin.transactions');
    Route::get('admin/transaction-details/{transaction_id}', AdminTransactionDetailComponent::class)->name('admin.transaction-details');

});

// USER ROUTES
Route::middleware(['auth:sanctum', 'verified', 'authuser'])->group(function () {
    Route::get('user/dashboard', UserDashboardComponent::class)->name('user.dashboard');
    Route::get('user/investment-plans', UserInvestmentPlanComponent::class)->name('user.investment-plans');
    Route::get('user/plan/{plan_id}', PaymentComponent::class)->name('user.payment');
    Route::get('user/referrals', UserReferralsComponent::class)->name('user.referrals');
    Route::get('user/profile/{user_id}', UserProfileComponent::class)->name('user.profile');
    Route::get('user/transactions', UserTransactionComponent::class)->name('user.transactions');

    Route::get('user/transaction/{transaction_id}', UserViewTransactionDetailsComponent::class)->name('user.transaction-details');
    // Route::get('user/withdraw', UserWithdrawalComponent::class)->name('user.withdraw');



});

