<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simplee Notes</title>
    <meta name="description" content="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;700&family=Unbounded:wght@300;700&display=swap" rel="stylesheet">
</head>

<body class="home d-flex flex-column h-100">

    @auth
    @include('page.part.header2-2')
    @else
    @include('page.part.header1-1')
    @endauth

    <div class="container-fluid container-fluid-custom py-md-4 mb-5">
        <main>
            <div class="row py-md-5 text-center justify-content-center">
                <div class="col-md-12 col-lg-6 mb-6 mb-md-0">
                    <h1 class="display-2 fw-bold mb-4 position-relative home-title">
                        Write your thoughts down as they come to you.
                    </h1>
                    <p class="fs-4 mb-4">
                        Notes is a simple to use free note taking app made
                    </p>
                    @auth
                    <a href="{{ route('notes.tutorial') }}" class="btn btn-primary btn-lg">Try Notes, it's FREE!</a>
                    @else
                    <a href="{{ route('register') }}" class="btn btn-primary btn-lg">Try Notes, it's FREE!</a>
                    @endauth
                </div>
            </div>
        </main>
    </div>
    
    @include('page.part.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>