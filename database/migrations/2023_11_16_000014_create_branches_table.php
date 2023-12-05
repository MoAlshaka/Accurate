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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string("branch_code");
            $table->string("branch_name");
            $table->string("country");
            $table->string("city");
            $table->string("mohafza");
            $table->string("zone");
            $table->string("address");
            $table->string("phone");
            $table->string("fax");
            $table->enum("status", [0, 1]);
            $table->enum("type", [0, 1]);
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};
