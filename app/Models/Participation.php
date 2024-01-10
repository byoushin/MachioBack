<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participation extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'event_id',
        'team_id',
        'user_id',
        'classification',
        'score',
        'rank',
        'latitude',
        'longitude',
    ];
    protected $table = 'participations';
    public function Team() {
        return $this->hasMany('App\Models\Team');
    }
    
}