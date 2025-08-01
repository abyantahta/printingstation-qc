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
        Schema::create('labels', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('part_no')->unique();
            $table->string('customer');
            $table->string('model');
            $table->string('part_name');
            $table->integer('qty');
            $table->string('job_no')->nullable();
            $table->string('kode_unik')->nullable();
            $table->string('kode')->nullable();
            $table->string('marking')->nullable();
            $table->string('warna_kertas')->nullable();
            // $table->string('line_id');
            $table->foreignId('line_id')->constrained()->onDelete('cascade');
            // $table->foreign('line_id')->references('line_id')->on('lines')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('labels');
    }
};
