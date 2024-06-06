<?php

use App\Livewire\Resident\AddInformation;
use App\Livewire\Resident\ViewInformation;
use App\Livewire\ResidentView;
use Illuminate\Support\Facades\Route;

Route::prefix('/resident')->group(function () {
    Route::get('/', ResidentView::class)->name('resident');
    Route::get('/add', AddInformation::class)->name('resident.add');
    Route::get('/view/{data}', ViewInformation::class)->name('resident.view');
});
