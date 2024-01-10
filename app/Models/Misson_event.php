<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Misson_event extends Model
{
    use HasFactory;
    protected $fillable = [
        'mission_id',
        'event_id',
        'mission_no',
    ];
    protected $table = 'mission_events';
}
