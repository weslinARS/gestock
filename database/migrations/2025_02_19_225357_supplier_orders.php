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
        //
        Schema::create("supplier_orders", function(Blueprint $table){
            $table->id();
            $table->timestamps();
            $table->enum("satus", ["pending", "completed", "cancelled"])->default("pending");
            $table->foreignId("supplier_id")->references("id")->on("suppliers")->onDelete("no action");
            $table->date("order_date")->nullable(false);
            $table->date("delivery_date")->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists("supplier_orders");
    }
};