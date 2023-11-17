<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'phone', 'linkedin_profile', 'resume', 'job_id'];


    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
