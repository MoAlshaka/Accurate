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
        Schema::create('safes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->string('created_dy');
            $table->enum("status", [0, 1]);
            $table->enum("deposit", [0, 1]);
            $table->enum("incoming_transfer", [0, 1]);
            $table->enum("withdraw", [0, 1]);
            $table->enum("outgoing_transfer", [0, 1]);
            $table->enum("colc", [0, 1]);
            $table->enum("crdt", [0, 1]);
            $table->enum("cash", [0, 1]);
            $table->foreignId('branch_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('safes');
    }
};
