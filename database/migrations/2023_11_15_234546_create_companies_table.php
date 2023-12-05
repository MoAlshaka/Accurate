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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string("company_name");
            $table->string("company_owner");
            $table->string("activity");
            $table->string("phone");
            $table->string("number_of_recorder");
            $table->string("number_of_credit");
            $table->string("email");
            $table->string("website");
            $table->string("zone");
            $table->string("head_of_report");
            $table->string("footer_of_report");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
