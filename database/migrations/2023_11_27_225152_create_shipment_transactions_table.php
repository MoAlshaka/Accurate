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
        Schema::create('shipment_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->string('document');
            $table->string('sersies');
            $table->string('personal_account');
            $table->enum("status", [0, 1]);
            $table->foreignId("branch_id")->constrained();
            $table->foreignId("journal_type_id")->constrained('journal_types', 'id');
            $table->foreignId('subsidiary_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipment_transactions');
    }
};
