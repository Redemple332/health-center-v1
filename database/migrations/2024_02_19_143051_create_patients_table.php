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
		Schema::create('patients', function (Blueprint $table) {
			$table->uuid('id')->primary();
			$table->foreignUuid('health_center_id')
				->references('id')
				->on('health_centers');
			$table->string('first_name', 50);
			$table->string('last_name', 50);
			$table->integer('age');
			$table->string('contact');
			$table->text('address')->nullable();
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
		Schema::dropIfExists('patients');
	}
};
