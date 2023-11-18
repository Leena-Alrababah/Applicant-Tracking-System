<?php

namespace App\Http\Controllers;

use App\DataTables\JobsDataTable;
use App\Models\Applicant;
use App\Models\Job;
use App\Traits\ImageUploadTrait;
use App\Traits\ResumeUploadTrait;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class JobController extends Controller
{
    use ImageUploadTrait;
    use ResumeUploadTrait;


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(JobsDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.jobs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('admin.pages.jobs.create');
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
            'image' => ['nullable', 'max:4196', 'image'],
            'title' => ['required', 'max:255'],
            'description' => ['required'],
            'location' => ['required', 'max:255'],
            'application_deadline' => ['required', 'date'],
            'status' => ['required', 'in:open,closed'],
        ]);

        $job = new Job();

        if ($request->hasFile('image')) {
            $imagePath = $this->uploadImage($request, 'image', 'uploads');
            $job->image = $imagePath;
        } 

        $job->title = $request->title;
        $job->description = $request->description;
        $job->location = $request->location;
        $job->application_deadline = $request->application_deadline;
        $job->status = $request->status;
        $job->save();

        $notification = [
            'message' => 'New Job Created Successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->route('jobs.index')->with($notification);
      
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $jobs = Job::all();

        return view('front-end.index', compact('jobs'));
    }

    public function showSingleJop($id)
    {
        $job = Job::with(['benefits', 'requirements'])->findOrFail($id);

        return view('front-end.singleJob', compact('job'));
    }

    public function showApplicationForm($id)
    {
        // Retrieve the job details based on the provided ID
        $job = Job::findOrFail($id);

        // You can pass additional data to the view if needed

        return view('front-end.applyForm', compact('job'));
    }

    public function submitApplicationForm(Request $request, $id)
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

        // if ($request->hasFile('resume')) {
        //     $resumePath = $this->uploadResume($request, 'resume', 'resumes');
        //     $applicant->resume = $resumePath;
        // }
        $filename = '';

        if ($request->hasFile('resume')) {
            $filename = $request->getSchemeAndHttpHost() . '/resumes/' . time() . '.' . $request->resume->extension();
            $request->resume->move(public_path('/resumes/'), $filename);
        } 

        $applicant->resume = $filename;

        $applicant->name = $request->name;
        $applicant->email = $request->email;
        $applicant->phone = $request->phone;
        $applicant->linkedin_profile = $request->linkedin_profile;
        $applicant->job_id = $id;

        $applicant->save();

        
        Alert::success('Success', 'Application confirmed!');

        return redirect()->back();
    } 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Job::findOrFail($id);
        return view('admin.pages.jobs.edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => ['nullable', 'max:4196', 'image'],
            'title' => ['required', 'max:50'],
            'description' => ['required'],
            'location' => ['required'],
            'application_deadline' => ['required', 'date'],
            'status' => ['required', 'in:open,closed'],
        ]);

        $job = Job::findOrFail($id);

    
        $imagePath = $this->updateImage($request, 'image', 'uploads', $job->image);
        $job->image = empty($imagePath) ? $job->image : $imagePath;

        $job->title = $request->title;
        $job->description = $request->description;
        $job->location = $request->location;
        $job->application_deadline = $request->application_deadline;
        $job->status = $request->status;
        $job->save();

        $notification = [
            'message' => 'Job Updated Successfully!!',
            'alert-type' => 'success',
        ];

        return redirect()->route('jobs.index')->with($notification);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = Job::findOrFail($id);
        $job->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
