<?php

namespace App\Http\Controllers\inventory_management;

use App\Http\Controllers\Controller;
use App\Http\Requests\inventory_management\MedicineCategoryRequest;
use App\Models\MedicineCategory;
use Illuminate\Http\Request;

class MedicineCategoryController extends Controller
{
	public function index()
	{
		$title = 'Medicine Category';
		$url = app('router')
			->getRoutes()
			->getByName('inventory-management.medicine-category.index')
			->uri();
		$data = $this->tableData();
		return view('content.inventory-management.medicine-category.index', compact('title', 'url', 'data'));
	}
	private function tableData()
	{
		return MedicineCategory::latest()->get();
	}
	public function store(MedicineCategoryRequest $request)
	{
		$validatedData = $request->validated();
		$validatedData['health_center_id'] = auth()->user()->health_center_id ?? null;
		MedicineCategory::create($validatedData);

		$data = $this->tableData();
		$table_data = view('content.inventory-management.medicine-type.table', compact('data'))->render();
		return compact('table_data');
	}
	public function update(MedicineCategoryRequest $request, $id)
	{
		$validatedData = $request->validated();

		$model = MedicineCategory::find($id);

		if ($model) {
			$model->update($validatedData);
			$data = $this->tableData();
			$table_data = view('content.inventory-management.medicine-category.table', compact('data'))->render();
			return compact('table_data');
		}
	}
	public function delete($id)
	{
		$model = MedicineCategory::find($id);

		if ($model) {
			$model->delete();
			$data = $this->tableData();
			$table_data = view('content.inventory-management.medicine-category.table', compact('data'))->render();
			return compact('table_data');
		}
	}
}
