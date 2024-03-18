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
		Schema::create('users', function (Blueprint $table) {
			$table->uuid('id')->primary();
			$table->foreignUuid('health_center_id')
				->nullable()
				->onDelete('set null');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('password');
			$table->string('contact')->nullable();
			$table->string('address')->nullable();
			$table->string('qr_code');
			$table->string('email')->unique();
			$table->timestamp('email_verified_at')->nullable();
			$table->foreignUuid('role_id')
				->nullable()
				->onDelete('set null');
			$table->rememberToken();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('users');
	}
};
