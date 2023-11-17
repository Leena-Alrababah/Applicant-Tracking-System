<?php

namespace App\Http\Controllers;

use App\DataTables\RequirementsDataTable;
use App\Models\Job;
use App\Models\Requirement;
use Illuminate\Http\Request;

class RequirementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RequirementsDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.requirements.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jobs = Job::all();
        return view('admin.pages.requirements.create', compact('jobs'));

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
            'title' => ['required', 'max:255'],
            'text' => ['required'],
            'job' => ['required'],
        ]);

        $requirement = new Requirement();



        $requirement->title = $request->title;
        $requirement->text = $request->text;
        $requirement->job_id = $request->job;

        $requirement->save();

        $notification = [
            'message' => 'New Requirment Created Successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->route('requirements.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Requirement  $requirement
     * @return \Illuminate\Http\Response
     */
    public function show(Requirement $requirement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Requirement  $requirement
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $requirement = Requirement::findOrFail($id);
        $jobs = Job::all();

        return view('admin.pages.requirements.edit', compact('requirement', 'jobs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Requirement  $requirement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'max:255'],
            'text' => ['required'],
            'job' => ['required'],
        ]);

        $requirement = Requirement::findOrFail($id);

        $requirement->title = $request->title;
        $requirement->text = $request->text;
        $requirement->job_id = $request->job;

        $requirement->save();

        $notification = [
            'message' => 'Requirement Updated Successfully!!',
            'alert-type' => 'success',
        ];

        return redirect()->route('requirements.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Requirement  $requirement
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $requirement = Requirement::findOrFail($id);
        $requirement->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
