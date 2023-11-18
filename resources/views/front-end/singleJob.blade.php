<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('front-end/single.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <title>Laravel Software Engineer Internship</title>
</head>

<body>

    <div class="job-details">
        <div class="job-content">
            <img src="{{ asset($job->image) }}" alt="Job Image" class="job-image">

            <h1>{{ $job->title }}</h1>
            <p class="text-warning"><strong>{{ $job->status }}</strong> {{ $job->application_deadline }}</p>
            <p> HTML, JavaScript, PHP, SQL, Laravel, Restful API, MySQL, Mango DP, PostgreSQL, Git, Bitbucket, AWS,
                Azure</p>
            <hr>
            <h5>Job Description</h5>
            <p>
                {{ $job->description }}
            </p>

            <h5>Requirements</h5>
            <ul>
                @foreach ($job->requirements as $requirement)
                    <li><strong>{{ $requirement->title }}:</strong> {{ $requirement->text }}</li>
                @endforeach

            </ul>

            <h5>Benefits</h5>
            <ul>
                @foreach ($job->benefits as $benefit)
                    <li><strong>{{ $benefit->title }}:</strong> {{ $benefit->text }}</li>
                @endforeach

            </ul>
            <br>
            <center>
                <button type="button" class="btn btn-outline-primary"><a
                        href="{{ route('showApplicationForm', ['id' => $job->id]) }}">Apply Now</a></button>
            </center>

        </div>
    </div>

</body>

</html>
