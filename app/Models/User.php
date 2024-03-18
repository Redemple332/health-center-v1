<?php

namespace App\Models;

use App\Traits\SpecificHealthCenter;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
	use HasApiTokens, HasFactory, Notifiable, HasUuids;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = [
		'health_center_id',
		'first_name',
		'last_name',
		'password',
		'contact',
		'address',
		'qr_code',
		'email',
		'email_verified_at',
		'role_id',
	];

	/**
	 * The attributes that should be hidden for serialization.
	 *
	 * @var array<int, string>
	 */
	protected $hidden = ['password', 'remember_token'];

	/**
	 * The attributes that should be cast.
	 *
	 * @var array<string, string>
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
		'password' => 'hashed',
	];

	protected $appends = ['full_name'];

	protected function password(): Attribute
	{
		return Attribute::make(set: fn($value) => bcrypt($value));
	}

	public function getFullNameAttribute()
	{
		return $this->first_name . ' ' . $this->last_name;
	}

	public function role(): BelongsTo
	{
		return $this->belongsTo(Role::class);
	}

	public function healthCenter(): BelongsTo
	{
		return $this->belongsTo(HealthCenter::class);
	}
}
