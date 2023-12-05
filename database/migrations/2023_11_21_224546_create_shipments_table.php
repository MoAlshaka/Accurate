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
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->string("shipment_number");
            $table->string('type_of_movement');
            $table->string('request_type');
            $table->string('package_desc');
            $table->string('package_open');
            $table->string('payment_method');
            $table->string('package_price');
            $table->string('account_type');
            $table->double('weight');
            $table->double('width');
            $table->double('long');
            $table->double('high');
            $table->integer('piece_number');
            $table->integer('margay_number');
            $table->string('notes');
            $table->string('sender_name');
            $table->string('service');
            $table->string('sender_city');
            $table->string('sender_zone');
            $table->string('sender_address');
            $table->string('sender_phone');
            $table->string('sender_mobile');
            $table->string('receiver_name');
            $table->string('receiver_city');
            $table->string('receiver_zone');
            $table->string('receiver_address');
            $table->string('receiver_phone');
            $table->string('receiver_mobile');
            $table->foreignId('branch_id')->constrained();
            $table->foreignId('customer_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
