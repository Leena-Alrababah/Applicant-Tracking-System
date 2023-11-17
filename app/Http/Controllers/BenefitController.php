<?php

namespace App\Http\Controllers;

use App\DataTables\BenefitsDataTable;
use App\Models\Benefit;
use App\Models\Job;
use Illuminate\Http\Request;

class BenefitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BenefitsDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.benefits.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jobs = Job::all();
        return view('admin.pages.benefits.create', compact('jobs'));
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

        $benefit = new Benefit();



        $benefit->title = $request->title;
        $benefit->text = $request->text;
        $benefit->job_id = $request->job;

        $benefit->save();

        $notification = [
            'message' => 'New Benefit Created Successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->route('benefits.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Benefit  $benefit
     * @return \Illuminate\Http\Response
     */
    public function show(Benefit $benefit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Benefit  $benefit
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $benefit = Benefit::findOrFail($id);
        $jobs = Job::all();

        return view('admin.pages.benefits.edit', compact('benefit', 'jobs'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Benefit  $benefit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'max:255'],
            'text' => ['required'],
            'job' => ['required'],
        ]);

        $benefit = Benefit::findOrFail($id);

        $benefit->title = $request->title;
        $benefit->text = $request->text;
        $benefit->job_id = $request->job;

        $benefit->save();

        $notification = [
            'message' => 'Benefit Updated Successfully!!',
            'alert-type' => 'success',
        ];

        return redirect()->route('benefits.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Benefit  $benefit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $benefit = Benefit::findOrFail($id);
        $benefit->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
