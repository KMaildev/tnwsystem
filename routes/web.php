<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManagementDashboardController;
use App\Http\Controllers\MarketingDashboardController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PropertyListingsController;
use App\Http\Controllers\PropertyListsDatatableController;
use App\Http\Controllers\PropertyTypeController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TownshipController;
use App\Http\Controllers\WardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();
Route::get('/', function () {
    return view('auth.login');
});
Auth::routes(['register' => false]);

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('management_dashboard', ManagementDashboardController::class);
    Route::resource('permission', PermissionController::class);
    Route::resource('role', RoleController::class);
    Route::resource('employee', EmployeeController::class);
    Route::post('employeesortable', [EmployeeController::class, 'employeeSortable']);


    // Marketing
    Route::resource('marketing_dashboard', MarketingDashboardController::class);
    Route::resource('property_type', PropertyTypeController::class);
    Route::resource('region', RegionController::class);
    Route::resource('township', TownshipController::class);
    Route::resource('ward', WardController::class);
    Route::get('ward_list_ajax', [WardController::class, 'ward_list_ajax']);

    Route::resource('property_listings', PropertyListingsController::class);
    Route::get('already_live_filter_search', [PropertyListingsController::class, 'already_live_filter_search']);
    Route::get('get_phone_number/{id}', [PropertyListingsController::class, 'get_phone_number']);

    Route::resource('property_lists_datatable', PropertyListsDatatableController::class);
    Route::get('property_lists_datatable_marketing', [PropertyListsDatatableController::class, 'propertyListsDatatableMarketing'])->name('property_lists_datatable_marketing');
});
