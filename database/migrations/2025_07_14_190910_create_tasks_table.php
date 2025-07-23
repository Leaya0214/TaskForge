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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');                  // Task title
            $table->text('description')->nullable();  // Optional detailed description
            $table->enum('status', ['pending', 'in_progress', 'completed'])->default('pending');
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // The user who created the task
            $table->timestamp('due_date')->nullable(); // Optional due date
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
