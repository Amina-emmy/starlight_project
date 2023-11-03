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
        Schema::create('aud_candidats', function (Blueprint $table) {
            $table->id();
            $table->string("badge");
            $table->string('photo');
            $table->string("nom");
            $table->string("prenom");
            $table->string("gender");
            $table->string("chanson");
            $table->string("ville_provenance");
            $table->string("date_naissance");
            $table->foreignId("episode_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aud_candidats');
    }
};
