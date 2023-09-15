<?php

namespace App\Models\Dance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dance extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'age',
        'address',
        'song_name'
    ];
}
