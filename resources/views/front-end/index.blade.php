<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />

    <link rel="stylesheet" href="{{ asset('front-end/style.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <title>Job Card</title>
</head>

<body>
  @include('sweetalert::alert')

    <div class="container">

        <div class="row">

            @foreach ($jobs as $job)
                @if ($job->status == 'open')
                    <div class="col-lg-4">
                        <div class="card">
                            <img src="{{ $job->image }}" alt="Card Image" class="card-image" />
                            <div class="card-content">
                                <h2><a href="{{ route('showSingleJob', ['id' => $job->id]) }}">{{ $job->title }}</a></h2>

                                <p class="text-dark">{{ $job->location }}</p>
                                <p class="text-warning"><strong>{{ $job->status }}</strong> to
                                    {{ $job->application_deadline }}</p>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

        </div>


    </div>




    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</body>

</html>
