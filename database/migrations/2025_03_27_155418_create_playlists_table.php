<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        //
        Schema::create('playlists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->boolean('is_public')->default(false);
            $table->string('cover_image')->nullable();
            $table->text('description')->nullable();
            $table->string('slug')->unique(); // Identifiant unique pour les URLs
            $table->integer('likes_count')->default(0); // Nombre de like
            $table->integer('total_duration')->default(0); // Durée totale des morceaux en secondes
            $table->timestamps(); // created_at & updated_at
        });

        // Table pivot entre les playlists et les chansons
        Schema::create('playlist_songs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('playlist_id')->constrained()->onDelete('cascade');
            $table->foreignId('song_id')->constrained()->onDelete('cascade');
            $table->integer('position')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('playlists');
        Schema::dropIfExists('playlist_songs');
    }
};
