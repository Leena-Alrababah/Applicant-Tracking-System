@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="card card-default">
                <div class="card-header">
                    <h2>Edit Talent Pool</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('talentpools.update', $talentPool->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <!-- Title Section -->
                            <div class="col-xl-12">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">Title</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-certificate" id="mdi-account"></span>
                                        </div>
                                        <input type="text" class="form-control" name="title"
                                            value="{{ $talentPool->title }}">
                                    </div>
                                </div>
                            </div>
                            <!-- Role Section -->
                            <div class="col-xl-12">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium" for="role">Role</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-account" id="basic-addon1"></span>
                                        </div>
                                        <input type="text" class="form-control" name="role" value="{{ $talentPool->role }}">
                                    </div>
                                </div>
                            </div>
                            <!-- Location Section -->
                            <div class="col-xl-12">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium" for="location">Location</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-map-marker" id="mdi-location"></span>
                                        </div>
                                        <input type="text" class="form-control" name="location" value="{{ $talentPool->location }}">
                                    </div>
                                </div>
                            </div>
                            <!-- Skill Section -->
                            <div class="col-xl-12">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium" for="skill">Skill</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-hammer-wrench" id="mdi-skill"></span>
                                        </div>
                                        <input type="text" class="form-control" name="skill" value="{{ $talentPool->skill }}">
                                    </div>
                                </div>
                            </div>
                            <!-- Experience Section -->
                            <div class="col-xl-12">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium" for="experience">Experience</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-clock-time-four" id="mdi-experience"></span>
                                        </div>
                                        <input type="text" class="form-control" name="experience" value="{{ $talentPool->experience }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-footer pt-5 border-top">
                                <button type="submit" class="btn btn-primary btn-pill">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
