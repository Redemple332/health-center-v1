<?php

namespace App\Http\Controllers\profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
	public function index()
	{
		$url = app('router')
			->getRoutes()
			->getByName('users.index')
			->uri();

		$user = Auth::user();
		$title = 'Profile';
		return view('content.profile.index', compact('title', 'user', 'url'));
	}
}
