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
        Schema::create('educational_resources', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->enum('type', ['document', 'infographic', 'video']);
            $table->string('file_path')->nullable(); 
            $table->string('thumbnail')->nullable(); 
            $table->string('video_url')->nullable(); 
            $table->string('image_path')->nullable(); 
            $table->boolean('featured')->default(false);
            $table->unsignedInteger('download_count')->default(0);
            $table->string('file_size')->nullable(); 
            $table->string('file_format')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('educational_resources');
    }
};
