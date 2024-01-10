<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    protected $fillable = [
        'chat_id',
        'team_id',
        'user_id',
        'sentence',
        'send_date',
    ];
    protected $table = 'chats';
}
