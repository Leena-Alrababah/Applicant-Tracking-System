<?php

use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\BenefitController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RequirementController;
use Illuminate\Support\Facades\Route;

Route::resource('jobs', JobController::class);
Route::resource( 'requirements', RequirementController::class);
Route:: resource('benefits', BenefitController::class);
Route::resource('applicants', ApplicantController::class);

// Route::get('/applicants/download-resume/{filename}', 'ApplicantController@downloadResume')->name('applicants.download-resume');
Route::get('download-resume/{filename}', 'ApplicantController@downloadResume')->name('applicants.download-resume');


