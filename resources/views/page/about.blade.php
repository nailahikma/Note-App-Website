<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simplee Notes</title>
    <meta name="description" content="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;700&family=Unbounded:wght@300;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    @auth
    @include('page.part.header2')
    @else
    @include('page.part.header1')
    @endauth

    <div class="d-flex justify-content-between">
        <img src="{{ asset('img/notes.jpg') }}" alt="notes" class="img-fluid w-100 opacity-80" style="height: 290px; object-fit: cover; opacity: 0.8;">
        <h1 class="text-4xl text-center text-white fw-bold position-absolute w-100" style="margin-top: 100px;">About Us</h1>
    </div>

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-start">
                    <h3 class="display-4 fw-bold text-primary">Welcome to Simpleé!</h3>
                    <p class="my-4 text-primary">Your ultimate destination for all things related to note-taking! Whether you're a student, a professional, or a casual note-taker, our platform is designed to cater to your unique needs. Join us as we celebrate the joy of organized thoughts and effective learning. Let the journey begin – because every note has a story, and we're here to help you tell yours. Welcome to the world of Simpleé Note!</p>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="about-item text-white rounded-2 p-4" style="border: 2px solid transparent;">
                                <h2 class="display-5 fw-bold">500</h2>
                                <h4 class="font-weight-semibold">Notes Created</h4>
                                <p>With specific formats for every need!</p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="about-item text-white rounded-2 p-4" style="border: 2px solid transparent;">
                                <h2 class="display-5 fw-bold">1k</h2>
                                <h4 class="font-weight-semibold">Happy Users</h4>
                                <p>Completely free, with just registration required!</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-end">
                    <img src="{{ asset('img/people-notes.png') }}" alt="Notes">
                </div>
            </div>
        </div>
    </section>

    @include('page.part.footer')

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>