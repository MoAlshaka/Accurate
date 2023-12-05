<?php

use App\Http\Controllers\Admin\AgentCommissionController;
use App\Http\Controllers\Admin\AgentController;
use App\Http\Controllers\Admin\AlertController;
use App\Http\Controllers\Admin\ZoneController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\CancellationReasonController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\JournalTypeController;
use App\Http\Controllers\Admin\PickupController;
use App\Http\Controllers\Admin\PkmController;
use App\Http\Controllers\Admin\PriceListController;
use App\Http\Controllers\Admin\RouteController;
use App\Http\Controllers\Admin\SafeController;
use App\Http\Controllers\Admin\ShipmentController;
use App\Http\Controllers\Admin\ShipmentTransactionController;
use App\Http\Controllers\Admin\ShippingServiceController;
use App\Http\Controllers\Admin\SubsidiarieController;
use App\Http\Controllers\Admin\SupportCateController;
use App\Http\Controllers\Admin\SupportTeamController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\Admin\WarehouseController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('auth.login');
})->name('auth.login');

Route::group(['prefix' => 'admin', 'middleware' => 'auth:web'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('/company', CompanyController::class);
    Route::resource('/branches', BranchController::class);
    Route::resource('/zones', ZoneController::class);
    Route::resource('/agent-commission', AgentCommissionController::class);
    Route::resource('/routes', RouteController::class);
    Route::resource('/agents', AgentController::class);
    Route::get('/agent/{id}', [AgentController::class, 'agents'])->name('agents');
    Route::resource('/price-list', PriceListController::class);
    Route::resource('/customers', CustomerController::class);
    Route::resource('/shipping-services', ShippingServiceController::class);
    Route::resource('/cancellation-reasons', CancellationReasonController::class);
    Route::resource('/warehouses', WarehouseController::class);
    Route::resource('/subsidiaries', SubsidiarieController::class);
    Route::resource('/shipments', ShipmentController::class);
    Route::get('/shipment/{id}', [ShipmentController::class, 'shipments'])->name('shipments');
    Route::resource('/safes', SafeController::class);
    Route::resource('/journal-types', JournalTypeController::class);
    Route::resource('/shipment-transactions', ShipmentTransactionController::class);
    Route::resource('/pickups', PickupController::class);
    Route::resource('/crm/support-cates', SupportCateController::class);
    Route::resource('/crm/tickets', TicketController::class);
    Route::resource('/crm/teams', SupportTeamController::class);
    Route::resource('/alerts', AlertController::class);
    Route::resource('manifests/pkms', PkmController::class);
});
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
require __DIR__ . '/auth.php';
Route::get('/{page}', [AdminController::class, 'index']);
