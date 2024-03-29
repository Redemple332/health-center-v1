<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('medical_records', function (Blueprint $table) {
			$table->uuid('id')->primary();
			$table->foreignUuid('health_center_id')
				->references('id')
				->on('health_centers');
			$table->foreignUuid('patient_id')
				->references('id')
				->on('patients');
			$table->foreignUuid('medicine_id')
				->references('id')
				->on('medicines');
			$table->integer('quantity');
			$table->decimal('price');
			$table->text('purpose')->nullable();
			$table->text('description')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('medical_records');
	}
};
