<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

trait ResumeUploadTrait
{
    public function uploadResume(Request $request, $inputName, $path)
    {
        if ($request->hasFile($inputName)) {

            $resume = $request->{$inputName};
            $ext = $resume->getClientOriginalExtension();
            $resumeName = 'resume_' . uniqid() . '.' . $ext;
            $resume->move(public_path($path), $resumeName);

            return asset($path . "/" . $resumeName);
        }
    }

    public function updateResume(Request $request, $inputName, $path, $oldPath = null)
    {
        if ($request->hasFile($inputName)) {
            if (File::exists(public_path($oldPath))) {
                File::delete(public_path($oldPath));
            }
            $resume = $request->{$inputName};
            $ext = $resume->getClientOriginalExtension();
            $resumeName = 'resume_' . uniqid() . '.' . $ext;
            $resume->move(public_path($path), $resumeName);

            return $path . "/" . $resumeName;
        }
    }

    // Handle delete resume file
    public function deleteResume(string $path)
    {
        if (File::exists(public_path($path))) {
            File::delete(public_path($path));
        }
    }
}
