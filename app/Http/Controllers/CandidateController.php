<?php

namespace App\Http\Controllers;

use App\DataTables\CandidatesDataTable;
use App\Models\Applicant;
use App\Models\Candidate;
use App\Models\TalentPool;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CandidatesDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.candidates.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $candidates = Applicant::all();
        $talentPools = TalentPool::all();
        return view('admin.pages.candidates.create', compact('candidates', 'talentPools'));
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
            'talent_pool' => ['required', 'exists:talent_pools,id'],
            'candidates' => ['required', 'exists:applicants,id'],
        ]);

        $talentPoolId = $request->input('talent_pool');
        $applicantId = $request->input('candidates');

        $talentPool = TalentPool::findOrFail($talentPoolId);

        // Fetch the applicant by their ID
        $applicant = Applicant::findOrFail($applicantId);

        // Create a candidate from the applicant
        $candidate = new Candidate();

        $candidate->name = $applicant->name;
        $candidate->email = $applicant->email;
        $candidate->phone = $applicant->phone;
        $candidate->linkedin_profile = $applicant->linkedin_profile;
        $candidate->resume = $applicant->resume;
        $candidate->talent_pool_id = $talentPoolId;

        $candidate->save();

        $notification = [
            'message' => 'New Candidate Created Successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->route('candidates.index')->with($notification);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function show(Candidate $candidate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidate $candidate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidate $candidate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $candidate = Candidate::findOrFail($id);
        $candidate->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
