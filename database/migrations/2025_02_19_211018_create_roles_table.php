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
        Schema::create('profile', function (Blueprint $table) {
            $table->id();
            $table->enum('role', ['admin', 'user'])->nullable(false);
            #relationships
            # user has one role
            $table->foreignId("user_id")->references("id")->on("users")->onDelete("cascade");
            $table->string("name")->nullable();
            $table->string("email")->nullable();
            $table->string("last_name")->nullable();
            $table->date("date_of_birth")->nullable(false);
            $table->string("phone_number",8)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile');
    }
};