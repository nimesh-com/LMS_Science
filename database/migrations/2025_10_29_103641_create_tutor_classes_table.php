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
        Schema::create('tutor_classes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('class_id')->foreign()->references('id')->on('classes')->onDelete('cascade');
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('thumbnail')->nullable();
            $table->unsignedBigInteger('teacher_id')->foreign()->references('id')->on('users')->onDelete('cascade');
            $table->time('scheduled_at');
            $table->date('scheduled_date');
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tutor_classes');
    }
};
