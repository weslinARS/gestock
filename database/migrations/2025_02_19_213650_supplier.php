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
        Schema::create("suppliers", function (Blueprint $table){
            $table->id();
            $table->string("name",70);
        });
        Schema::create("supplier_emails",function(Blueprint $table){
            $table->id();
            $table->string("email",100);
            $table->string("contact_name",70);
            $table->foreignId("supplier_id")->references("id")->on("suppliers")->onDelete("cascade");
            $table->timestamps();
        });
        Schema::create("supplier_phone_numbers", function(Blueprint $table){
            $table->id();
            $table->timestamps();
            $table->foreignId("supplier_id")->references("id")->on("suppliers")->onDelete("cascade");
            $table->string("phone_number",8);
            $table->string("contact_name", 70);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("suppliers");
        Schema::dropIfExists("supplier_emails");
        Schema::dropIfExists("supplier_phone_numbers");
    }
};