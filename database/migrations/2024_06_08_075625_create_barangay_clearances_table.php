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
        Schema::create('barangay_clearances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('resident_id');
            $table->foreign('resident_id')->references('id')->on('resident_models');
            $table->unsignedBigInteger('resident_address_id');
            $table->foreign('resident_address_id')->references('id')->on('resident_address_models');
            $table->string('propose');
            $table->string('occupation');
            $table->integer('length_of_residency');
            $table->string('identification_id_type');
            $table->string('identification_id_number');
            $table->string('identification_issuing_agency');
            $table->string('is_renew')->default(false);
            $table->boolean('is_removed')->default(false);
            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangay_clearances');
    }
};
