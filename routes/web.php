<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\Analytics;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\inventory_management\MedicineCategoryController;
use App\Http\Controllers\inventory_management\MedicineTypeController;
use App\Http\Controllers\inventory_management\MedicineListController;
use App\Http\Controllers\inventory_management\MedicineExpiredController;
use App\Http\Controllers\inventory_management\MedicineSupplierController;
use App\Http\Controllers\inventory_management\MedicineReceivingController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\attendance\AttendanceController;
use App\Http\Controllers\medical_record\MedicalRecordController;
use App\Http\Controllers\patients\PatientsController;
use App\Http\Controllers\sales\SalesController;
use App\Http\Controllers\users\UsersController;

// Main Page Route
Route::middleware(['auth'])->group(function () {
	Route::get('/', [Analytics::class, 'index'])->name('dashboard-analytics');

	Route::prefix('users')
		->name('users.')
		->controller(UsersController::class)
		->group(function () {
			Route::get('/', 'index')->name('index');
			Route::post('/', 'store')->name('store');
			Route::put('/{id}', 'update')->name('update');
			Route::delete('/{id}', 'delete')->name('delete');
		});
	Route::prefix('profile')
		->name('profile.')
		->controller(ProfileController::class)
		->group(function () {
			Route::get('/', 'index')->name('index');
		});

	Route::prefix('attendance')
		->name('attendance.')
		->controller(AttendanceController::class)
		->group(function () {
			Route::get('/', 'index')->name('index');
			Route::get('/inOut', 'inOut')->name('inOut');
		});

	Route::prefix('patients')
		->name('patients.')
		->controller(PatientsController::class)
		->group(function () {
			Route::get('/', 'index')->name('index');
			Route::post('/', 'store')->name('store');
			Route::put('/{id}', 'update')->name('update');
			Route::delete('/{id}', 'delete')->name('delete');
		});

	Route::prefix('medical-records')
		->name('medical-records.')
		->controller(MedicalRecordController::class)
		->group(function () {
			Route::get('/', 'index')->name('index');
			Route::post('/', 'store')->name('store');
			Route::put('/{id}', 'update')->name('update');
			Route::delete('/{id}', 'delete')->name('delete');
		});

	Route::prefix('inventory-management')
		->name('inventory-management.')
		->group(function () {
			Route::prefix('sales')
				->name('sales.')
				->controller(SalesController::class)
				->group(function () {
					Route::get('/', 'index')->name('index');
				});

			Route::prefix('medicine-type')
				->name('medicine-type.')
				->controller(MedicineTypeController::class)
				->group(function () {
					Route::get('/', 'index')->name('index');
					Route::post('/', 'store')->name('store');
					Route::put('/{id}', 'update')->name('update');
					Route::delete('/{id}', 'delete')->name('delete');
				});

			Route::prefix('medicine-category')
				->name('medicine-category.')
				->controller(MedicineCategoryController::class)
				->group(function () {
					Route::get('/', 'index')->name('index');
					Route::post('/', 'store')->name('store');
					Route::put('/{id}', 'update')->name('update');
					Route::delete('/{id}', 'delete')->name('delete');
				});

			Route::prefix('medicine-list')
				->name('medicine-list.')
				->controller(MedicineListController::class)
				->group(function () {
					Route::get('/', 'index')->name('index');
					Route::post('/', 'store')->name('store');
					Route::put('/{id}', 'update')->name('update');
					Route::delete('/{id}', 'delete')->name('delete');
				});

			Route::controller(MedicineExpiredController::class)->group(function () {
				Route::get('/medicine-expired', 'index')->name('medicine-expired.index');
			});

			Route::prefix('medicine-supplier')
				->name('medicine-supplier.')
				->controller(MedicineSupplierController::class)
				->group(function () {
					Route::get('/', 'index')->name('index');
					Route::post('/', 'store')->name('store');
					Route::put('/{id}', 'update')->name('update');
					Route::delete('/{id}', 'delete')->name('delete');
				});

			// Route::controller(MedicineReceivingController::class)->group(function () {
			// 	Route::get('/medicine-receiving', 'index')->name('medicine-receiving.index');
			// });
		});
});

Route::post('/login-qr-code', [LoginController::class, 'qrLogin'])->name('login-qr-code');
Route::get('/in-out', [LoginController::class, 'InOut'])->name('in-out');

Auth::routes();
