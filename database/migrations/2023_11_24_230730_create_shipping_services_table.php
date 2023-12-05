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
        Schema::create('shipping_services', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('code');
            $table->integer('days');
            $table->string('shipment_type')->nullable();
            $table->enum("status", [0, 1]);
            $table->foreignId('branch_id')->constrained();
            $table->string('agent_account')->nullable();
            $table->string('account_deliver')->nullable();
            $table->string('account_tahsel')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_services');
    }
};
