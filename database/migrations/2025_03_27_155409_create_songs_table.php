<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Titre de la musique
            $table->string('artist'); // Nom de l'artiste
            $table->string('album')->nullable(); // Nom de l'album (optionnel)
            $table->string('genre')->nullable(); // Genre musical
            $table->integer('duration')->default(0); // Durée en secondes
            $table->string('cover_image')->nullable(); // Image de couverture
            $table->string('audio_file'); // URL du fichier audio
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('songs');
    }
};
