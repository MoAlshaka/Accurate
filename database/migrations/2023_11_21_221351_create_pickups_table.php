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
        Schema::create('pickups', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->dateTime('date');
            $table->string('type_of_movement');
            $table->foreignId('customer_id')->constrained();;
            $table->foreignId('branch_id')->constrained();
            $table->foreignId('agent_id')->constrained();
            $table->string('agent_answer')->default('انتظار');
            $table->string('transport');
            $table->time('start_at');
            $table->time('end_at');
            $table->string('notes');
            $table->string('status');
            $table->integer('number_of_shipments');
            $table->integer('shipments_receive')->nullable();
            $table->foreignId('user_id')->constrained();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pickups');
    }
};
