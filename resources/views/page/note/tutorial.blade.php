<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simplee Notes</title>
    <meta name="description" content="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/tutorial.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;700&family=Unbounded:wght@300;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>

    @include('page.part.header2')
    <div class="container-fluid container-fluid-custom">
        <div class="row">
            <div class="col-3 ">
                <img src="/img/human-3.svg" alt="Human pointing hand toward a create button">
            </div>
            <div class="col mt-md-4">
                <div class="mb-5">
                    <h1>Hey, {{ Auth::user()->name }}</h1>
                </div>
                <h2>Okay...</h2>
                <h4>Let's start with your first note!<br /><br />
                </h4>
                <div class="container">
                    <div class="slide">
                        <div class="item" style="background-image: url('/img/tutorial/Step 5.png');"></div>
                        <div class="item" style="background-image: url('/img/tutorial/Step 1.png');"></div>
                        <div class="item" style="background-image: url('/img/tutorial/Step 2.png');"></div>
                        <div class="item" style="background-image: url('/img/tutorial/Step 3.png');"></div>
                        <div class="item" style="background-image: url('/img/tutorial/Step 4.png');"></div>
                    </div>
                    <div class="button">
                        <button class="prev"><i class="fa-solid fa-arrow-left text-warning"></i></button>
                        <button class="next"><i class="fa-solid fa-arrow-right text-warning"></i></button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @include('page.part.footer')

    <script src="{{ asset('js/tutorial.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>