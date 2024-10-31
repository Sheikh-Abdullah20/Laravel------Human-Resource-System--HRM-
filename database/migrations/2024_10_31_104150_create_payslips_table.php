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
        Schema::create('payslips', function (Blueprint $table) {
            $table->id();
            $table->foreignId("employee_id")->constrained("employees")->cascadeOnDelete()->cascadeOnUpdate();
            $table->string("salary_month");
            $table->decimal("base_salary",15,2);
            $table->decimal("total_allowance",15,2)->default(0);
            $table->decimal("total_deduction",15,2)->default(0);
            $table->decimal("net_pay",15,2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payslips');
    }
};
