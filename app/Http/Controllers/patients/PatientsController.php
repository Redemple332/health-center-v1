<?php

namespace App\Http\Controllers\patients;

use App\Http\Controllers\Controller;
use App\Http\Requests\PatientRequest;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientsController extends Controller
{
	public function index()
	{
		$title = 'Patients List';
		$url = app('router')
			->getRoutes()
			->getByName('patients.index')
			->uri();
		$data = $this->tableData();
		return view('content.patients.index', compact('title', 'url', 'data'));
	}

	private function tableData()
	{
		return Patient::latest()->get();
	}

	public function store(PatientRequest $request)
	{
		$validatedData = $request->validated();
		$validatedData['health_center_id'] = auth()->user()->health_center_id ?? null;

		Patient::create($validatedData);
		$data = $this->tableData();
		$table_data = view('content.patients.table', compact('data'))->render();
		return compact('table_data');
	}

	public function update(PatientRequest $request, $id)
	{
		$validatedData = $request->validated();

		$model = Patient::find($id);

		if ($model) {
			$model->update($validatedData);

			$data = $this->tableData();
			$table_data = view('content.patients.table', compact('data'))->render();
			return compact('table_data');
		}
	}

	public function delete($id)
	{
		$model = Patient::find($id);

		if ($model) {
			$model->delete();
			$data = $this->tableData();
			$table_data = view('content.patients.table', compact('data'))->render();
			return compact('table_data');
		}
	}
}
