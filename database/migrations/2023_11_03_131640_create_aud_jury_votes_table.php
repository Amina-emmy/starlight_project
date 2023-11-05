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
        Schema::create('aud_jury_votes', function (Blueprint $table) {
            $table->id();
            $table->boolean("vote_jury1");
            $table->boolean("vote_jury2");
            $table->boolean("vote_jury3");
            $table->boolean("vote_jury4");
            $table->boolean("vote_jury5");
            $table->integer("jury_points");
            $table->foreignId("aud_candidat_id")->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aud_jury_votes');
    }
};
