<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();
            $table->string('image_resume')->nullable();   // Foto/resume image
            $table->string('nama');
            $table->string('posisi');
            $table->string('negara');
            $table->foreignId('created_by')
                  ->constrained('users')
                  ->onDelete('cascade');
            $table->foreignId('updated_by')
                  ->nullable()
                  ->constrained('users')
                  ->onDelete('cascade');
            $table->timestamps();  // created_at, updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('resumes');
    }
};
