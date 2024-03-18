<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
class LoginController extends Controller
{
	/*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

	use AuthenticatesUsers;

	/**
	 * Where to redirect users after login.
	 *
	 * @var string
	 */
	protected $redirectTo = '/';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest')->except('logout');
	}

	public function qrLogin(Request $request)
	{
		$user = User::where('qr_code', $request->qr_code)->first();

		if ($user) {
			$attendance = Attendance::where('user_id', $user->id)
				->whereDate('created_at', now())
				->first();

			if (!$attendance) {
				Attendance::create([
					'user_id' => $user->id,
					'health_center_id' => $user->health_center_id,
					'time_in' => now(),
				]);
				return response()->json(['message' => 'Time In']);
			} elseif ($attendance && !$attendance->time_out) {
				Attendance::find($attendance->id)->update([
					'time_out' => now(),
				]);
				return response()->json(['message' => 'Time Out']);
			} else {
				return response()->json(['message' => 'Already Time Out']);
			}
		} else {
			return false;
		}
	}

	public function InOut()
	{
		return view('auth.in-out');
	}
}
