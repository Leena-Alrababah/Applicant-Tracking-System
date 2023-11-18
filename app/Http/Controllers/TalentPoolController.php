<?php

namespace App\Http\Controllers;

use App\DataTables\TalentPoolsDataTable;
use App\Models\TalentPool;
use Illuminate\Http\Request;

class TalentPoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TalentPoolsDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.talentPools.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.talentPools.create');

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
            'role' => ['required', 'max:255'],
            'location' => ['required', 'max:255'],
            'skill' => ['required', 'max:255'],
            'experience' => ['required', 'max:255'],
        ]);

        $talentPool = new TalentPool();

        $talentPool->title = $request->title;
        $talentPool->role = $request->role;
        $talentPool->location = $request->location;
        $talentPool->skill = $request->skill;
        $talentPool->experience = $request->experience;
        $talentPool->save();

        $notification = [
            'message' => 'New Talent Pool Created Successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->route('talentpools.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TalentPool  $talentPool
     * @return \Illuminate\Http\Response
     */
    public function show(TalentPool $talentPool)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TalentPool  $talentPool
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $talentPool = TalentPool::findOrFail($id);
        return view('admin.pages.talentPools.edit', compact('talentPool'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TalentPool  $talentPool
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'max:255'],
            'role' => ['required', 'max:255'],
            'location' => ['required', 'max:255'],
            'skill' => ['required', 'max:255'],
            'experience' => ['required', 'max:255'],
        ]);

        $talentPool = TalentPool::findOrFail($id);

        
        $talentPool->title = $request->title;
        $talentPool->role = $request->role;
        $talentPool->location = $request->location;
        $talentPool->skill = $request->skill;
        $talentPool->experience = $request->experience;
        $talentPool->save();

        $notification = [
            'message' => 'Talent Pool Updated Successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->route('talentpools.index')->with($notification);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TalentPool  $talentPool
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $talentPool = TalentPool::findOrFail($id);
        $talentPool->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
