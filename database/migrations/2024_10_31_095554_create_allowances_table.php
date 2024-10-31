<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('allowances', function (Blueprint $table) {
            $table->id();
            $table->foreignId("employee_id")->constrained("employees")->cascadeOnDelete()->cascadeOnUpdate();
            $table->decimal("accommodation_allowance",15,2)->default(0);
            $table->decimal("medical_allowance",15,2)->default(0);
            $table->decimal("conveyance_allowance",15,2)->default(0);
            $table->decimal("mobile_allowance",15,2)->default(0);
            $table->decimal("fuel_allowance",15,2)->default(0);
            $table->decimal("total_allowance",15,2);
            $table->timestamps();
   });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('allowances');
    }
};
