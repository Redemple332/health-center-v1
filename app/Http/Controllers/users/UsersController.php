<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\HealthCenter;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
	public function index()
	{
		$title = 'User Management';
		$url = app('router')
			->getRoutes()
			->getByName('users.index')
			->uri();

		$roles = Role::where('name', '!=', 'Admin')->get();
		$healthCenters = HealthCenter::get();
		$data = $this->tableData();
		return view('content.users.index', compact('title', 'url', 'data', 'roles', 'healthCenters'));
	}

	private function tableData()
	{
		$healthCenter =
			Auth::user()->role->name == 'Admin' ? session('health_center') : Auth::user()->health_center_id;
		return User::with(['healthCenter', 'role'])
			->whereHas('role', function ($query) {
				$query->where('name', '!=', 'Admin');
			})
			->where('health_center_id', $healthCenter)
			->latest()
			->get();
	}

	public function store(StoreUserRequest $request)
	{
		$validatedData = $request->validated();
		$validatedData['health_center_id'] = auth()->user()->health_center_id ?? $request->health_center_id;
		User::create($validatedData);
		$data = $this->tableData();
		$table_data = view('content.users.table', compact('data'))->render();
		return compact('table_data');
	}

	public function update(UpdateUserRequest $request, $id)
	{
		$validatedData = $request->validated();
		$model = User::find($id);

		if ($model) {
			$model->update($validatedData);

			$data = $this->tableData();
			$table_data = view('content.users.table', compact('data'))->render();
			return compact('table_data');
		}
	}

	public function delete($id)
	{
		$model = User::find($id);

		if ($model) {
			$model->delete();
			$data = $this->tableData();
			$table_data = view('content.users.table', compact('data'))->render();
			return compact('table_data');
		}
	}
}
