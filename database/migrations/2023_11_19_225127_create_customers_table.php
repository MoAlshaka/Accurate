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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string("code");
            $table->string("name");
            $table->string("company_representative");
            $table->foreignId('branch_id')->constrained();
            $table->string("personal_account");
            $table->string("activity");
            $table->string("account_type");
            $table->string("request_type");
            $table->string("package_open");
            $table->string("category");
            $table->foreignId('price_list_id')->constrained();
            $table->string("tax");
            $table->string("payment_method");
            $table->string("payment_schedule");
            $table->string("phone_hiden");
            $table->enum("shipping_code", [0, 1]);
            $table->enum("return_fees", [0, 1]);
            $table->enum("uncollected_shipments", [0, 1]);
            $table->enum("storage", [0, 1]);
            $table->enum("receipt_code", [0, 1]);
            $table->string("city");
            $table->string("zone");
            $table->string("phone");
            $table->string("mobile");
            $table->string("postal_code");
            $table->string("address");
            $table->string("email");
            $table->enum("colc", [0, 1]);
            $table->enum("crdt", [0, 1]);
            $table->enum("cash", [0, 1]);
            $table->enum("status", [0, 1]);
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
