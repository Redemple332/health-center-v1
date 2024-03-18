<?php

namespace App\Models;

use App\Traits\SpecificHealthCenter;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class MedicineType extends Model
{
	use HasFactory, SoftDeletes, HasUuids, SpecificHealthCenter;

	protected $fillable = ['health_center_id', 'name', 'description'];
}
