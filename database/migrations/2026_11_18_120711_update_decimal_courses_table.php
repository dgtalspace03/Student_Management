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
         Schema::table('courses', function (Blueprint $table) {
            $table->decimal('price',10,2)->change();
            $table->decimal('orginal_price',10,2)->change();
            $table->renameColumn('orginal_price', 'original_price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->decimal('price',2)->change();
            $table->decimal('original_price',2)->change();
            $table->renameColumn('original_price', 'orginal_price');
        });
    }
};
