<?php

namespace App\Models;

use App\Traits\SpecificHealthCenter;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendance extends Model
{
	use HasFactory, SoftDeletes, HasUuids, SpecificHealthCenter;

	protected $fillable = ['health_center_id', 'user_id', 'time_in', 'time_out'];

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}

	public function healthCenter(): BelongsTo
	{
		return $this->belongsTo(HealthCenter::class);
	}
}
