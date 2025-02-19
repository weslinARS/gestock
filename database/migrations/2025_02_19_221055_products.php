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
        Schema::create("categories", function(Blueprint $table){
            $table->id();
            $table->string("name");
        });
        Schema::create("products", function(Blueprint $table){
            $table->id();
            $table->string("name")->unique()->nullable(false);
            $table->text("description")->nullable();
            $table->float("purchase_price")->nullable(false)->comment("precio de compra del producto");
            $table->float("sale_price")->nullable(false)->comment("precio de venta del producto");
            $table->foreignId("supplier_id")->references("id")->on("suppliers")->onDelete("no action");
            $table->foreignId("category_id")->references("id")->on("categories")->onDelete("no action");
            $table->float("stock")->nullable(false)->comment("stock del producto");
            $table->float("stock_policy")->nullable(false)->comment("politica de stock del producto");
            $table->boolean("is_under_policy")->default(false)->comment("indica si el producto esta bajo politica de stock");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists("categories");
        Schema::dropIfExists("products");
    }
};