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
        Schema::create("cash_registers", function(Blueprint $table){
            $table->id();
            $table->float("starting_amount")->nullable(false)->default(0)->comment("Cantidad de dinero con la que se inicia la caja");
            $table->float("closing_amount")->nullable(true)->default(0)->comment("Cantidad de dinero con la que se cierra la caja");
            $table->timestamp("opening_date")->nullable(false)->comment("Fecha de apertura de la caja");
            $table->timestamp("closing_date")->nullable(false)->comment(" Fecha de cierre de la caja");
            $table->float("total_sales_amount_collected")->nullable(false)->default(0)->comment("Cantidad total de ventas realizadas");
            $table->foreignId("user_id")->references("id")->on("users")->onDelete("no action");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists("cash_registers");
    }
};