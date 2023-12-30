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
        Schema::create('storedmedicalkitdata', function (Blueprint $table) {
            $table->id();
            $table->string('phone_number', 10);
            $table->string('medikit_name');
            $table->timestamp('stored_at')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('storedmedicalkitdata');
    }
};