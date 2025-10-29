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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->foreign()->references('id')->on('students')->onDelete('cascade');
            $table->unsignedBigInteger('class_id')->foreign()->references('id')->on('classes')->onDelete('cascade');
            $table->string('amount');
            $table->boolean('status')->default(0);
            $table->text('receipt');
            $table->unsignedBigInteger('processed_by')->foreign()->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
