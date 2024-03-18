<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\HealthCenter;
use App\Models\MedicalRecord;
use App\Models\Medicine;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;

class Analytics extends Controller
{
	public function index()
	{
		if (request('health_center')) {
			$hltctr = HealthCenter::where('name', request('health_center'))->first();
			session(['health_center' => $hltctr->id]);
		}
		$analytics = [
			'patientsCount' => Patient::get()->count(),
			'medicinesCount' => Medicine::get()->count(),
			'expiredCount' => Medicine::where('expiration_date', '<=', now())
				->get()
				->count(),
			'medicalRecordsCount' => MedicalRecord::get()->count(),
		];
		$attendanceToday = Attendance::with('user', 'healthCenter')
			->whereDate('created_at', now())
			->get();

		$attendance = Attendance::where('user_id', Auth::user()->id)
			->whereDate('created_at', now())
			->first();
		$healthCenters = HealthCenter::get();

		$healthCenter = session('health_center');
		return view(
			'content.dashboard.dashboards-analytics',
			compact('attendanceToday', 'analytics', 'attendance', 'healthCenters', 'healthCenter')
		);
	}
}
