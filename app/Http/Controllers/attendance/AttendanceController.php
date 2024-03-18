<?php

namespace App\Http\Controllers\attendance;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
	public function index()
	{
		$attendanceToday = Attendance::with('user', 'healthCenter')
			->latest()
			->get();
		$title = 'Attendance';
		return view('content.attendance.index', compact('title', 'attendanceToday'));
	}

	public function inOut()
	{
		$attendance = Attendance::where('user_id', Auth::user()->id)
			->whereDate('created_at', now())
			->first();

		if ($attendance) {
			$attendance->update([
				'time_out' => now(),
			]);
			return back();
		} else {
			Attendance::create([
				'user_id' => Auth::user()->id,
				'health_center_id' => Auth::user()->health_center_id,
				'time_in' => now(),
			]);
			return back();
		}
	}
}
