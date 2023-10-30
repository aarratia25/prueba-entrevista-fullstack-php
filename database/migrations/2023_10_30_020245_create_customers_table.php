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
            $table->string('dni', 45)->primary();
            $table->unsignedInteger('id_reg');
            $table->unsignedInteger('id_com');
            $table->string('email', 120)->unique();
            $table->string('name', 45);
            $table->string('last_name', 45);
            $table->string('address', 255)->nullable();
            $table->dateTime('date_reg');
            $table->enum('status', ['A', 'I', 'trash'])->default('A');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign(['id_com', 'id_reg'])->references(['id_com', 'id_reg'])->on('communes')->onDelete('cascade');
        
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
