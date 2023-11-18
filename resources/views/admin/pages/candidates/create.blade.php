@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="card card-default">
                <div class="card-header">
                    <h2>Assign Candidates to Talent Pool</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('candidates.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <!-- Talent Pool Section -->
                            <div class="col-xl-12">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium" for="talent_pool">Talent Pool</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-pool" id="basic-addon1"></span>
                                        </div>
                                        <select class="form-control" name="talent_pool">
                                            <option value="" selected disabled>Select a Talent Pool</option>
                                            @foreach ($talentPools as $talentPool)
                                                <option value="{{ $talentPool->id }}">{{ $talentPool->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Candidates Section -->
                            <div class="col-xl-12">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium" for="candidates">Select Candidate</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text fas fa-users" id="basic-addon1"></span>

                                        <!-- Use a multi-select dropdown or checkboxes to select candidates -->
                                        <select class="form-control" name="candidates" id="candidates">
                                            <option value="" selected disabled>Select a Candidate</option>

                                            @foreach ($candidates as $candidate)
                                                <option value="{{ $candidate->id }}">
                                                    {{ $candidate->name }} - {{ $candidate->email }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-footer pt-5 border-top">
                                <button type="submit" class="btn btn-primary btn-pill">Assign Candidates</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
