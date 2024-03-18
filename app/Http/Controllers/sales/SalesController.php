<?php

namespace App\Http\Controllers\sales;

use App\Http\Controllers\Controller;
use App\Models\MedicalRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
	public function index()
	{
		$title = 'Expenses Report';
		$url = app('router')
			->getRoutes()
			->getByName('inventory-management.sales.index')
			->uri();

		$totalSales = MedicalRecord::whereMonth('created_at', now())->sum(DB::raw('quantity * price'));

		return view('content.sales.index', compact('title', 'totalSales'));
	}
}
