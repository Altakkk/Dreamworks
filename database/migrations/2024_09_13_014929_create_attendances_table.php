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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('courseID')->index();
            $table->unsignedBigInteger('studentID')->index();
            $table->unsignedBigInteger('statusID')->index();
            $table->string('aDate');


            $table->foreign('courseID')->references('id')->on('courses')->cascadeOnDelete();
            $table->foreign('studentID')->references('id')->on('student')->cascadeOnDelete();
            $table->foreign('statusID')->references('id')->on('status')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
