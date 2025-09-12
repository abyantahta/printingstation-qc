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
        Schema::table('histories', function (Blueprint $table) {
            $table->string('printed_by')->nullable()->after('quantity'); // who printed it
            $table->string('shift')->nullable()->after('printed_by'); // shift information
            $table->string('print_status')->default('pending')->after('shift'); // success, error, pending
            $table->text('error_message')->nullable()->after('print_status'); // error details if any
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('histories', function (Blueprint $table) {
            $table->dropColumn(['printed_by', 'shift', 'print_status', 'error_message']);
        });
    }
};
