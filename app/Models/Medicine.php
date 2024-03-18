<?php

namespace App\Models;

use App\Traits\SpecificHealthCenter;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medicine extends Model
{
	use HasFactory, SoftDeletes, HasUuids, SpecificHealthCenter;

	protected $fillable = [
		'health_center_id',
		'name',
		'description',
		'medicine_type_id',
		'medicine_category_id',
		'supplier_id',
		'expiration_date',
		'quantity',
		'price',
	];

	public function type(): BelongsTo
	{
		return $this->belongsTo(MedicineType::class, 'medicine_type_id');
	}

	public function category(): BelongsTo
	{
		return $this->belongsTo(MedicineCategory::class, 'medicine_category_id');
	}

	public function supplier(): BelongsTo
	{
		return $this->belongsTo(Supplier::class, 'supplier_id');
	}
}
