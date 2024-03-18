<?php

namespace App\Models;

use App\Traits\SpecificHealthCenter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class MedicineCategory extends Model
{
	use HasFactory, SoftDeletes, HasUuids, SpecificHealthCenter;
	protected $fillable = ['health_center_id', 'name', 'description'];
}
