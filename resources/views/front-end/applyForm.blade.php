<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.19.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">

    <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
    <link href="{{ asset('admin/plugins/material/css/materialdesignicons.min.css') }}" rel="stylesheet" />

    <link id="main-css-href" rel="stylesheet" href="{{ asset('admin/css/style.css') }}" />
    {{-- <link rel="stylesheet" href="{{ asset('front-end/style.css') }}" /> --}}

    <title>Applicant Data</title>
</head>

<body>

    <div class="container" style="background-color: rgba(96, 96, 94, 0.089); padding:20px; margin-top:50px">
        
        <h2 class="mb-4 text-center"><i class="bi bi-person"></i> Applicant Data</h2>

        <form action="{{ route('submitApplicationForm', ['id' => $job->id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xl-12">
                    <div class="mb-5">
                        <label class="text-dark font-weight-medium" for="name">Name</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text mdi mdi-account" id="mdi-name"></span>
                            </div>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="mb-5">
                        <label class="text-dark font-weight-medium" for="email">Email</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text mdi mdi-email" id="mdi-email"></span>
                            </div>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="mb-5">
                        <label class="text-dark font-weight-medium" for="phone">Phone</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text mdi mdi-phone" id="mdi-phone"></span>
                            </div>
                            <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                            @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="mb-5">
                        <label class="text-dark font-weight-medium" for="linkedin_profile">LinkedIn
                            Profile</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text mdi mdi-linkedin" id="mdi-linkedin"></span>
                            </div>
                            <input type="text" class="form-control" name="linkedin_profile"
                                value="{{ old('linkedin_profile') }}">
                            @error('linkedin_profile')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="mb-5">
                        <label class="text-dark font-weight-medium" for="resume">Resume</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text mdi mdi-file" id="mdi-resume"></span>
                            </div>
                            <input type="file" class="form-control" name="resume" id="resume"
                                accept=".pdf,.doc,.docx">
                            @error('resume')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="form-footer pt-5 border-top text-center">
                    <button type="submit" class="btn btn-primary btn-pill">Submit</button>
                </div>
            </div>
        </form>
    </div>
    @include('sweetalert::alert')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</body>

</html>
