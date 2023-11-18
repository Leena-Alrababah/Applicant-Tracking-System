<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.19.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <title>Applicant Data</title>
</head>

<body>
    @include('sweetalert::alert')

    <div class="container mt-5">
        <h2 class="mb-4"><i class="bi bi-person"></i> Applicant Data</h2>

        <form action="{{ route('submitApplicationForm', ['id' => $job->id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label"><i class="bi bi-person"></i> Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                    placeholder="John Doe">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label"><i class="bi bi-envelope"></i> Email</label>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="email"
                    placeholder="john@example.com">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label"><i class="bi bi-phone"></i> Phone</label>
                <input type="tel" class="form-control" name="phone" value="{{ old('phone') }}" id="phone"
                    placeholder="123-456-7890">
                @error('phone')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="linkedin" class="form-label"><i class="bi bi-linkedin"></i> LinkedIn Profile</label>
                <input type="text" class="form-control" name="linkedin_profile" value="{{ old('linkedin_profile') }}"
                    id="linkedin" placeholder="https://www.linkedin.com/in/johndoe/">
                @error('linkedin_profile')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="resume" class="form-label"><i class="bi bi-file-earmark-text"></i> Resume</label>
                <input type="file" class="form-control" name="resume" value="{{ old('resume') }}" id="resume"
                    accept=".pdf,.doc,.docx">
                @error('resume')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary"><i class="bi bi-check"></i> Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</body>

</html>
