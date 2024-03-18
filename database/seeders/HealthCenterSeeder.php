<?php

namespace Database\Seeders;

use App\Models\HealthCenter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HealthCenterSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		HealthCenter::truncate();

		$healthCentersData = [
			[
				'name' => 'PFCI Health Center',
				'address' => 'Barangay San Andres',
			],
			[
				'name' => 'Gruar Health Center',
				'address' => 'Barangay Sto. Domingo',
			],
			[
				'name' => 'Gen Ricarte Health Center',
				'address' => 'Barangay San Juan',
			],
			[
				'name' => 'Karangalan Health Center',
				'address' => 'Barangay San Isidro',
			],
			[
				'name' => 'Sto. Niño Health Center',
				'address' => 'Barangay Sto. Niño',
			],
			[
				'name' => 'Sta. Rosa Health Center',
				'address' => 'Barangay Sta. Rosa',
			],
			[
				'name' => 'One Cainta Village Health Center ',
				'address' => 'Barangay San Roque',
			],
		];

		foreach ($healthCentersData as $data) {
			HealthCenter::create($data);
		}
	}
}
