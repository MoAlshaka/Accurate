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
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->string("code");
            $table->string("name");
            $table->string("personal_account");
            $table->string("ahda_account");
            $table->string("kind_of_commission");
            $table->string("much_of_commission");
            $table->string("country");
            $table->string("mohafza");
            $table->string("city");
            $table->string("zone");
            $table->string("address");
            $table->string("phone");
            $table->string("phone1");
            $table->string("email_box");
            $table->string("email_sign");
            $table->string("email");
            $table->enum("status", [0, 1]);
            $table->enum("payment", [0, 1]);
            $table->foreignId("branch_id")->constrained();
            $table->foreignId("route_id")->constrained();
            $table->foreignId("commission_id")->constrained('agent_commissions', 'id');
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agents');
    }
};
