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
    Schema::create('medicine_categories', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table
        ->foreignUuid('health_center_id')
        ->references('id')
        ->on('health_centers');
      $table->string('name');
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
    Schema::dropIfExists('medicine_categories');
  }
};
