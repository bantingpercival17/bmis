<?php

use App\Http\Controllers\GenerateReports;
use App\Http\Controllers\SetupController;
use App\Livewire\Administrator\DashboardView as AdministratorDashboardView;
use App\Livewire\Barangay\BarangayClearanceView;
use App\Livewire\DashboardView;
use App\Livewire\Administrator\Regions;
use App\Livewire\IncidentReportAdd;
use Illuminate\Support\Facades\Route;

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

/* Route::get('/migrate', function () {
    Artisan::migrate();
}); */

Route::get('/set-up', [SetupController::class, 'setup_address']);
Route::get('/set-up/provinces', [SetupController::class, 'setup_provinces'])->name('set-up.provinces');
Route::get('/', function () {
    return redirect(route('login'));
});


Route::prefix('administrator')->middleware(['auth', 'administrator'])
    ->group(function () {

        require __DIR__ . '/module-routes/accounts-route.php';
        require __DIR__ . '/module-routes/residents-route.php';
        require __DIR__ . '/module-routes/incident-route.php';
        Route::get('/', AdministratorDashboardView::class)->name('dashboard');
        Route::get('/dashboard', AdministratorDashboardView::class)->name('dashboard');
        Route::prefix('/regions')->group(function () {
            Route::get('/',  Regions::class)->name('regions.view');
        });
        /*  require __DIR__ . '/module-routes/accounts-route.php'; */
    });

Route::prefix('barangay')->middleware(['auth', 'barangay'])
    ->group(function () {
        require __DIR__ . '/module-routes/residents-route.php';
        require __DIR__ . '/module-routes/incident-route.php';
        Route::get('/', DashboardView::class)->name('dashboard');
        Route::get('/dashboard', DashboardView::class)->name('dashboard');

        Route::prefix('/barangay-clearance')->group(function () {
            Route::get('/',  BarangayClearanceView::class)->name('barangay-clearance.view');
            Route::get('/report', [GenerateReports::class, 'barangay_clearance'])->name('report.barangay-clearance');
        });
    });







/* Route::middleware([
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


    Route::prefix('/accounts')->group(function () {
        Route::get('/', AccountView::class)->name('account.view');
    });
}); */

/* Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
 */
require __DIR__ . '/auth.php';
