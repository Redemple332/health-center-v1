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

	public function inOut(Request $request, $id)
	{
		$attendance = Attendance::where('id', $id)
			->whereDate('created_at', now())
			->first();

		if ($attendance) {
			$attendance->update([
				'status' => '1',
			]);
			return back();
		}
	}
}
