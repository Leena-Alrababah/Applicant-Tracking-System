<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TalentPool extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'role', 'location', 'skill', 'experience'];


    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }
}
