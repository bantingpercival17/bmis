<?php

use App\Http\Controllers\SetupController;
use App\Livewire\DashboardView;
use App\Livewire\IncidentReportAdd;
use App\Livewire\IncidentReportView;
use App\Livewire\Resident\AddInformation;
use App\Livewire\Resident\ViewInformation;
use App\Livewire\ResidentView;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/migrate', function () {
    Artisan::migrate();
});
Route::get('/set-up', [SetupController::class, 'setup_address']);
Route::get('/set-up/provinces', [SetupController::class, 'setup_provinces'])->name('set-up.provinces');
Route::get('/', function () {
    return redirect(route('login'));
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', DashboardView::class)->name('dashboard');
    Route::prefix('/resident')->group(function () {
        Route::get('/', ResidentView::class)->name('resident');
        Route::get('/add', AddInformation::class)->name('resident.add');
        Route::get('/view/{data}', ViewInformation::class)->name('resident.view');
    });
    Route::prefix('/incident-report')->group(function () {
        Route::get('/',  IncidentReportView::class)->name('incident-report.view');
        Route::get('/add',  IncidentReportAdd::class)->name('incident-report.add');
    });
});
