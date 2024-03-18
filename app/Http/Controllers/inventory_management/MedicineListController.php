<?php

namespace App\Http\Controllers\inventory_management;

use App\Http\Controllers\Controller;
use App\Http\Requests\inventory_management\MedicineRequest;
use App\Models\Medicine;
use App\Models\MedicineCategory;
use App\Models\MedicineType;
use App\Models\Supplier;

class MedicineListController extends Controller
{
	public function index()
	{
		$title = 'Medicine Lists';

		$categories = MedicineCategory::orderBy('name', 'ASC')->get();
		$types = MedicineType::orderBy('name', 'ASC')->get();
		$suppliers = Supplier::orderBy('name', 'ASC')->get();

		$url = app('router')
			->getRoutes()
			->getByName('inventory-management.medicine-list.index')
			->uri();
		$data = $this->tableData();

		return view(
			'content.inventory-management.medicine-list.index',
			compact('title', 'url', 'data', 'categories', 'suppliers', 'types')
		);
	}

	private function tableData()
	{
		return Medicine::with('type', 'category', 'supplier')
			->latest()
			->get();
	}

	public function store(MedicineRequest $request)
	{
		$validatedData = $request->validated();
		$validatedData['health_center_id'] = auth()->user()->health_center_id ?? null;

		Medicine::create($validatedData);
		$data = $this->tableData();
		$table_data = view('content.inventory-management.medicine-list.table', compact('data'))->render();
		return compact('table_data');
	}

	public function update(MedicineRequest $request, $id)
	{
		$validatedData = $request->validated();

		$model = Medicine::find($id);

		if ($model) {
			$model->update($validatedData);
			$data = $this->tableData();
			$table_data = view('content.inventory-management.medicine-list.table', compact('data'))->render();
			return compact('table_data');
		}
	}

	public function delete($id)
	{
		$model = Medicine::find($id);

		if ($model) {
			$model->delete();
			$data = $this->tableData();
			$table_data = view('content.inventory-management.medicine-list.table', compact('data'))->render();
			return compact('table_data');
		}
	}
}
