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
        Schema::create("sales", function(Blueprint $table){
           $table->id();
           $table->timestamps();
           $table->timestamp("sale_date");
           $table->float("sale_amount_collected")->nullable(false)->default(0)->comment("Cantidad total de la venta");
           $table->foreignId("user_id")->references("id")->on("users")->onDelete("no action"); 
        });

        Schema::create("sales_details", function(Blueprint $table){
            $table->id();
            $table->timestamps();
            $table->float("amount")->nullable(false)->default(0)->comment("Cantidad de productos vendidos");
            $table->float("unit_price")->nullable(false)->default(0)->comment("Precio unitario del producto");
            $table->foreignId("product_id")->references("id")->on("products")->onDelete("no action");
            $table->foreignId("sale_id")->references("id")->on("sales")->onDelete("no action");
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists("sales");
        Schema::dropIfExists("sales_details");
    }
};