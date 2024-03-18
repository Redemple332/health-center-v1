<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		Role::truncate();

		$roles = ['Admin', 'Doctor', 'Encoder', 'Nurse', 'Medical Staff'];

		foreach ($roles as $role) {
			Role::create([
				'name' => $role,
			]);
		}
	}
}
