<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

		if ($user && Hash::check($request->password, $user->password)) {
			$attendance = Attendance::where('user_id', $user->id)
				->whereDate('created_at', now())
				->first();

			if (!$attendance) {
				Attendance::create([
					'user_id' => $user->id,
					'health_center_id' => $user->health_center_id,
					'status' => 0,
					'time_in' => now(),
				]);
				return response()->json(['message' => 'Time In. Waiting for Confirmation of the Admin']);
			} elseif ($attendance && !$attendance->time_out) {
				Attendance::find($attendance->id)->update([
					'time_out' => now(),
					'status' => 0,
				]);
				return response()->json(['message' => 'Time Out. Waiting for Confirmation of the Admin']);
			} else {
				return response()->json(['message' => 'Already Time Out']);
			}
		} else {
			return response()->json(['message' => 'Invalid Password or QR Code'], 422);
		}
	}

	public function InOut()
	{
		return view('auth.in-out');
	}
}
