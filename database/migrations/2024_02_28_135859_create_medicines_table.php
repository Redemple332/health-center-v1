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
		Schema::create('medicines', function (Blueprint $table) {
			$table->uuid('id')->primary();
			$table->foreignUuid('health_center_id')
				->references('id')
				->on('health_centers');
			$table->foreignUuid('medicine_type_id')
				->references('id')
				->on('medicine_types');
			$table->foreignUuid('medicine_category_id')
				->references('id')
				->on('medicine_categories');
			$table->foreignUuid('supplier_id')
				->references('id')
				->on('suppliers');
			$table->string('name');
			$table->text('description')->nullable();
			$table->date('expiration_date');
			$table->integer('quantity');
			$table->decimal('price');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('medicines');
	}
};
