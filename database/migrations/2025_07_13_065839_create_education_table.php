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
        Schema::create('educations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // jika terkait user
            $table->string('degree');                 // gelar, misal 'Bachelor of Science'
            $table->string('institution');            // nama institusi
            $table->year('start_year')->nullable();   // tahun mulai
            $table->year('end_year')->nullable();     // tahun selesai
            $table->text('description')->nullable();  // deskripsi tambahan
            $table->unsignedTinyInteger('order')->default(0); // urutan tampil
            $table->timestamps();                     // created_at, updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('educations');
    }
};
