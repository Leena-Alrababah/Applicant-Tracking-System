<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'location', 'image', 'application_deadline', 'status'];


    public function applicants()
    {
        return $this->hasMany(Applicant::class);
    }

    public function requirements()
    {
        return $this->hasMany(Requirement::class);
    }

    public function benefits()
    {
        return $this->hasMany(Benefit::class);
    }
}
