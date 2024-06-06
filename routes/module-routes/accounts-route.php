<?php

use App\Livewire\Account\AccountView;
use App\Livewire\Account\AddAccount;
use Illuminate\Support\Facades\Route;

Route::prefix('/accounts')->group(function () {
    Route::get('/', AccountView::class)->name('account.view');
    Route::get('/create', AddAccount::class)->name('account.create');
});
