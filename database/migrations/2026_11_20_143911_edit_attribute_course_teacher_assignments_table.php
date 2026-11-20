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
        Schema::table('course_teacher_assignments', function (Blueprint $table) {
            $table->dropForeign(['teacher_id']);
            $table->dropForeign(['course_id']);

            $table->foreign('teacher_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();

            $table->foreign('course_id')
                ->references('id')
                ->on('courses')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('course_teacher_assignments', function (Blueprint $table) {
            $table->dropForeign(['teacher_id']);
            $table->dropForeign(['course_id']);

            $table->foreign('teacher_id')->references('id')->on('users');
            $table->foreign('course_id')->references('id')->on('courses');
        });
    }
};
