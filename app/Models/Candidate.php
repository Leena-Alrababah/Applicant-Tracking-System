<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'phone', 'linkedin_profile', 'resume', 'talent_pool_id'];


    public function talentPool()
    {
        return $this->belongsTo(TalentPool::class);
    }

    
}
