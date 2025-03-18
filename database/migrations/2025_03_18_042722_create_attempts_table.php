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
        Schema::create('attempts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('question_id');
            $table->unsignedBigInteger('answer_id');
            $table->unsignedBigInteger('student_id');
            $table->timestamps();
            $table->foreign('question_id')->references('id')->on('questions')->cascadeOnDelete();
            $table->foreign('answer_id')->references('id')->on("answers")->cascadeOnDelete();
            $table->foreign("student_id")->references("id")->on("users")->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attempts');
    }
};
