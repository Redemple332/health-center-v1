<?php

namespace App\Http\Controllers\inventory_management;

use App\Http\Controllers\Controller;
use App\Http\Requests\inventory_management\MedicineSupplierRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;

class MedicineSupplierController extends Controller
{
	public function index()
	{
		$title = 'Medicine Supplier';
		$url = app('router')
			->getRoutes()
			->getByName('inventory-management.medicine-supplier.index')
			->uri();
		$data = $this->tableData();
		return view('content.inventory-management.medicine-supplier.index', compact('title', 'url', 'data'));
	}
	private function tableData()
	{
		return Supplier::latest()->get();
	}
	public function store(MedicineSupplierRequest $request)
	{
		$validatedData = $request->validated();
		$validatedData['health_center_id'] = auth()->user()->health_center_id ?? null;

		Supplier::create($validatedData);

		$data = $this->tableData();
		$table_data = view('content.inventory-management.medicine-supplier.table', compact('data'))->render();
		return compact('table_data');
	}
	public function update(MedicineSupplierRequest $request, $id)
	{
		$validatedData = $request->validated();

		$model = Supplier::find($id);

		if ($model) {
			$model->update($validatedData);

			$data = $this->tableData();
			$table_data = view('content.inventory-management.medicine-supplier.table', compact('data'))->render();
			return compact('table_data');
		}
	}

	public function delete($id)
	{
		$model = Supplier::find($id);

		if ($model) {
			$model->delete();
			$data = $this->tableData();
			$table_data = view('content.inventory-management.medicine-supplier.table', compact('data'))->render();
			return compact('table_data');
		}
	}
}
