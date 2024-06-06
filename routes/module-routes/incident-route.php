<?php


use App\Livewire\IncidentReportAdd;
use App\Livewire\IncidentReportView;
use Illuminate\Support\Facades\Route;

Route::prefix('/incident-report')->group(function () {
    Route::get('/',  IncidentReportView::class)->name('incident-report.view');
    Route::get('/add',  IncidentReportAdd::class)->name('incident-report.add');
});
