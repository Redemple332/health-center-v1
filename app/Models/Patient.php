<?php

namespace App\Models;

use App\Traits\SpecificHealthCenter;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
	use HasFactory, SoftDeletes, HasUuids, SpecificHealthCenter;

	protected $fillable = ['health_center_id', 'first_name', 'age', 'last_name', 'contact', 'address', 'description'];

	protected $appends = ['full_name'];

	public function getFullNameAttribute()
	{
		return $this->first_name . ' ' . $this->last_name;
	}
}
