<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AudCandidat extends Model
{
    use HasFactory;
    protected $fillable = [
        "badge",
        "photo",
        "nom",
        "prenom",
        "gender",
        "chanson",
        "ville_provenance",
        "date_naissance",
        "episode_id",
    ];

    public function episode()
    {
        return $this->belongsTo(Episode::class);
    }

    public function aud_jury_vote()
    {
        return $this->hasOne(AudJuryVote::class);
    }
}
