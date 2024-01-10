<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $fillable = [
        'team_id',
        'leader_id',
        'team_name',
    ];
    protected $table = 'teams';
    
    public function Participation() {
        return $this->belongsTo('App\Models\Participation');
    }
}