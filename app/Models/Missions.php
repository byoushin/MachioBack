<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Missions extends Model
{
    use HasFactory;
    protected $fillable = [
        'mission_id',
        'mission_title',
        'mission_sentence',
        'conditions',
        'mission_class',
        'reward',
    ];
    protected $table = 'missions';
    
}
