<?php

namespace App\Models;

use App\Traits\Slug;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
	use HasFactory, Slug, SoftDeletes, HasUuids;
}
