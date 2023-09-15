<?php

namespace App\Models\Volleyball;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volleyball_team extends Model
{
    use HasFactory;
    protected $fillable = [
        'volleybal_team',
        'player_name'
    ];
}
