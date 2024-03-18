<?php

namespace App\Http\Controllers\medical_record;

use App\Http\Controllers\Controller;
use App\Http\Requests\MedicalRecordRequest;
use App\Models\MedicalRecord;
use App\Models\Medicine;
use App\Models\Patient;

class MedicalRecordController extends Controller
{
	public function index()
	{
		$title = 'Medical Records List';
		$url = app('router')
			->getRoutes()
			->getByName('medical-records.index')
			->uri();
		$data = $this->tableData();

		$medicines = Medicine::where('expiration_date', '>=', now())->get();
		$patients = Patient::get();

		return view('content.medical-record.index', compact('title', 'url', 'data', 'medicines', 'patients'));
	}

	private function tableData()
	{
		return MedicalRecord::with('healthCenter', 'medicine', 'patient')
			->latest()
			->get();
	}

	public function store(MedicalRecordRequest $request)
	{
		$validatedData = $request->validated();
		$validatedData['health_center_id'] = auth()->user()->health_center_id ?? null;

		//Update Quantity on Medicine Table
		$medicine = Medicine::find($request->medicine_id);
		$quantity = $medicine->quantity - $request->quantity;
		$medicine->update(['quantity' => $quantity]);
		$validatedData['price'] = $medicine->price;
		$medicalRecord = MedicalRecord::create($validatedData);

		$data = $this->tableData();
		$table_data = view('content.medical-record.table', compact('data'))->render();
		return compact('table_data');
	}

	public function update(MedicalRecordRequest $request, $id)
	{
		$validatedData = $request->validated();

		$model = MedicalRecord::find($id);

		if ($model) {
			$model->update($validatedData);

			$data = $this->tableData();
			$table_data = view('content.medical-record.table', compact('data'))->render();
			return compact('table_data');
		}
	}

	public function delete($id)
	{
		$model = MedicalRecord::find($id);

		if ($model) {
			$model->delete();
			$data = $this->tableData();
			$table_data = view('content.medical-record.table', compact('data'))->render();
			return compact('table_data');
		}
	}
}
