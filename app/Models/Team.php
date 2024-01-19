<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $fillable = [
        'leader_id',
        'team_name',
        'score',
        'latitude',
        'longitude',
    ];
    protected $table = 'teams';
    
    protected $primaryKey = 'team_id';
    public function Participation() {
        return $this->belongsTo('App\Models\Participation');
    }
}