<?php

use App\Http\Controllers\dashboard\Analytics;
use Illuminate\Support\Facades\Route;

Route::get('/', [Analytics::class, 'index'])->name('dashboard-analytics');
