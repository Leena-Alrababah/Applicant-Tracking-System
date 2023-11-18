<?php

use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\BenefitController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RequirementController;
use App\Http\Controllers\TalentPoolController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(
    function () {
Route::resource('jobs', JobController::class);
Route::resource( 'requirements', RequirementController::class);
Route:: resource('benefits', BenefitController::class);
Route:: resource('applicants', ApplicantController::class);
Route:: resource('talentpools', TalentPoolController::class);
Route::resource('candidates', CandidateController::class);
Route::resource('home', HomeController::class);
    }
);


// Route::get('/applicants/download-resume/{filename}', 'ApplicantController@downloadResume')->name('applicants.download-resume');
Route::get('download-resume/{filename}', 'ApplicantController@downloadResume')->name('applicants.download-resume');


