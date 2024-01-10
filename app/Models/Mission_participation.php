<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mission_participation extends Model
{
    use HasFactory;
    protected $fillable = [
        'mission_id',
        'team_id',
        'flag',
        'achievement_time',
        'photo_evidence',
    ];
    protected $table = 'mission_participations';
    // public function Missions() {
    //     return $this->hasMany('App\Models\Missions');
    // }
}
