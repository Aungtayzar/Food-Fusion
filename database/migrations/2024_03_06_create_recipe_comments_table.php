<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('recipe_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recipe_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('content');
            $table->timestamps();
        });

        Schema::create('recipe_favorites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recipe_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->unique(['recipe_id', 'user_id']);
        });

        Schema::table('recipes', function (Blueprint $table) {
            $table->text('cooking_tips')->nullable()->after('instructions');
            $table->text('personal_notes')->nullable()->after('cooking_tips');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('recipe_comments');
        Schema::dropIfExists('recipe_favorites');
        Schema::table('recipes', function (Blueprint $table) {
            $table->dropColumn(['cooking_tips', 'personal_notes']);
        });
    }
};
