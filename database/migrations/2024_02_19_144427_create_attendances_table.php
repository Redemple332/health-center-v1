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
		Schema::create('attendances', function (Blueprint $table) {
			$table->uuid('id')->primary();
			$table->foreignUuid('health_center_id')
				->references('id')
				->on('health_centers');
			$table->foreignUuid('user_id')
				->references('id')
				->on('users');
			$table->dateTime('time_in');
			$table->dateTime('time_out')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('attendances');
	}
};
