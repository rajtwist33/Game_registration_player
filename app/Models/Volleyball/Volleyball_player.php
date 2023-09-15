<?php

namespace App\Models\Volleyball;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volleyball_player extends Model
{
    use HasFactory;
    protected $fillable = [
        'team_name',
        'address',
        'captain_name',
        'captain_phone'
    ];
}
