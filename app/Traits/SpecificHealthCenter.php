<?php

namespace App\Traits;

use App\Models\HealthCenter;
use Illuminate\Support\Facades\Auth;

trait SpecificHealthCenter
{
	protected static function bootSpecificHealthCenter()
	{
		if (Auth::user()) {
			$sessionHealthCenter = session('health_center') ?? HealthCenter::first()->id;
			Auth::user()->role->name != 'Admin' ? Auth::user()->health_center_id : $sessionHealthCenter;

			if (Auth::user()->role->name != 'Admin') {
				static::addGlobalScope('health_center_id', function ($query) {
					$query->where('health_center_id', Auth::user()->health_center_id);
				});
			} else {
				static::addGlobalScope('health_center_id', function ($query) use ($sessionHealthCenter) {
					$query->where('health_center_id', $sessionHealthCenter);
				});
			}
		}
	}
}
