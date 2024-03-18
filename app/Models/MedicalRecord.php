<?php

namespace App\Models;

use App\Traits\SpecificHealthCenter;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicalRecord extends Model
{
	use HasFactory, HasUuids, SoftDeletes, SpecificHealthCenter;

	protected $fillable = [
		'health_center_id',
		'medicine_id',
		'patient_id',
		'quantity',
		'price',
		'purpose',
		'description',
	];

	public function healthCenter(): BelongsTo
	{
		return $this->belongsTo(HealthCenter::class, 'health_center_id');
	}

	public function medicine(): BelongsTo
	{
		return $this->belongsTo(Medicine::class, 'medicine_id');
	}

	public function patient(): BelongsTo
	{
		return $this->belongsTo(Patient::class, 'patient_id');
	}
}
