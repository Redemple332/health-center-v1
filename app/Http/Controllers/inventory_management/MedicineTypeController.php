<?php

namespace App\Http\Controllers\inventory_management;

use App\Http\Controllers\Controller;
use App\Http\Requests\inventory_management\MedicineTypeRequest;
use App\Models\MedicineType;
use Illuminate\Http\Request;

class MedicineTypeController extends Controller
{
	public function index()
	{
		$title = 'Medicine Types';
		$url = app('router')
			->getRoutes()
			->getByName('inventory-management.medicine-type.index')
			->uri();
		$data = $this->tableData();
		return view('content.inventory-management.medicine-type.index', compact('title', 'url', 'data'));
	}

	private function tableData()
	{
		return MedicineType::latest()->get();
	}

	public function store(MedicineTypeRequest $request)
	{
		$validatedData = $request->validated();
		$validatedData['health_center_id'] = auth()->user()->health_center_id ?? null;

		MedicineType::create($validatedData);
		$data = $this->tableData();
		$table_data = view('content.inventory-management.medicine-type.table', compact('data'))->render();
		return compact('table_data');
	}

	public function update(MedicineTypeRequest $request, $id)
	{
		$validatedData = $request->validated();

		$model = MedicineType::find($id);

		if ($model) {
			$model->update($validatedData);

			$data = $this->tableData();
			$table_data = view('content.inventory-management.medicine-type.table', compact('data'))->render();
			return compact('table_data');
		}
	}

	public function delete($id)
	{
		$model = MedicineType::find($id);

		if ($model) {
			$model->delete();
			$data = $this->tableData();
			$table_data = view('content.inventory-management.medicine-type.table', compact('data'))->render();
			return compact('table_data');
		}
	}
}
