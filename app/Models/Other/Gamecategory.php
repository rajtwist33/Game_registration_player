<?php

namespace App\Models\Other;

use App\Models\Admin\Gender;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gamecategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'game_name',
        'age_description',
        'gender_id',
        'description'
    ];

    public function gender(){
        return $this->belongsTo(Gender::class);
    }
}
