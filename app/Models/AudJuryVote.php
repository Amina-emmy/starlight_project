<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AudJuryVote extends Model
{
    use HasFactory;
    protected $fillable=[
        "vote_jury1",
        "vote_jury2",
        "vote_jury3",
        "vote_jury4",
        "vote_jury5",
        "jury_points",
        "aud_candidat_id",
    ];

    public function aud_candidat()
    {
        return $this->belongsTo(AudCandidat::class);
    }
}
