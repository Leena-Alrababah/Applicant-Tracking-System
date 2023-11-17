<?php

namespace App\Http\Controllers;

use App\DataTables\ApplicantsDataTable;
use App\Models\Applicant;
use App\Models\Job;
use App\Traits\ResumeUploadTrait;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    use ResumeUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ApplicantsDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.applicants.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jobs = Job::all();
        return view('admin.pages.applicants.create', compact('jobs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'unique:applicants'],
            'phone' => ['nullable', 'max:20'],
            'linkedin_profile' => ['required', 'url'],
            'resume' => ['required', 'file', 'mimes:pdf,doc,docx'],
            'job_id' => ['required', 'exists:jobs,id'],
        ]);

        $applicant = new Applicant();

        if ($request->hasFile('resume')) {
            $resumePath = $this->uploadResume($request, 'resume', 'resumes');
            $applicant->resume = $resumePath;
        }

        $applicant->name = $request->name;
        $applicant->email = $request->email;
        $applicant->phone = $request->phone;
        $applicant->linkedin_profile = $request->linkedin_profile;
        $applicant->job_id = $request->job_id;

        $applicant->save();

        $notification = [
            'message' => 'New Applicant Created Successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->route('applicants.index')->with($notification);
    }



    public function downloadResume($filename)
    {
        $file = storage_path('app/public/resumes/' . $filename);

        return response()->download($file);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function show(Applicant $applicant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function edit(Applicant $applicant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Applicant $applicant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Applicant = Applicant::findOrFail($id);
        $Applicant->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
