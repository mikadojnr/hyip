<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\AboutComponent;
use App\Http\Livewire\FaqsComponent;
use App\Http\Livewire\ContactComponent;

use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminInvestmentPlanComponent;
use App\Http\Livewire\Admin\AdminAddInvestmentPlanComponent;



use App\Http\Livewire\User\UserDashboardComponent;
Route::get('/', HomeComponent::class)->name('home');
Route::get('/about', AboutComponent::class)->name('about');
Route::get('/faqs', FaqsComponent::class)->name('faqs');
Route::get('/contact-us', ContactComponent::class)->name('contact');


// ADMIN ROUTES
Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function () {
    Route::get('admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('admin/investment-plans', AdminInvestmentPlanComponent::class)->name('admin.investment-plans');
    Route::get('admin/add-investment-plans', AdminAddInvestmentPlanComponent::class)->name('admin.add-investment-plans');
});

// USER ROUTES
Route::middleware(['auth:sanctum', 'verified', 'authuser'])->group(function () {
    Route::get('user/dashboard', UserDashboardComponent::class)->name('user.dashboard');
});
