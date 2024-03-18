<?php

namespace App\Http\Controllers\inventory_management;

use App\Http\Controllers\Controller;
use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineExpiredController extends Controller
{
	public function index()
	{
		$title = 'Medicine Expired';
		$url = app('router')
			->getRoutes()
			->getByName('inventory-management.medicine-expired.index')
			->uri();
		$expiredMedicines = Medicine::where('expiration_date', '<=', now())->get();
		return view(
			'content.inventory-management.medicine-expired.index',
			compact('title', 'url', 'expiredMedicines')
		);
	}
}
