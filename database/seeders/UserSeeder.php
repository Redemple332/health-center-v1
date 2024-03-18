<?php

namespace Database\Seeders;

use App\Models\HealthCenter;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		User::truncate();

		$role = Role::where('name', 'Admin')->first();

		User::create([
			'first_name' => 'Administrator',
			'last_name' => 'Administrator',
			'email' => 'administrator@example.com',
			'password' => '12345678',
			'qr_code' => '12345678',
			'role_id' => $role->id,
		]);
	}
}
