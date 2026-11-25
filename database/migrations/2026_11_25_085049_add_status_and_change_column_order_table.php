<?php

use App\Enum\OrderStatus;
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
        Schema::table('orders', function (Blueprint $table) {
          $table->enum('status',['pending','paid','failed','cancelled'])->default('pending');
          $table->string('stripe_session_id')->nullable()->change();
          $table->string('stripe_payment_intent_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('status');
          $table->string('stripe_session_id')->change();
          $table->string('stripe_payment_intent_id')->change();
        });
    }
};
