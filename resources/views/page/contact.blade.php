<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simplee Notes</title>
    <meta name="description" content="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
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
        <h1 class="text-4xl text-center text-white fw-bold position-absolute w-100" style="margin-top: 100px;">Our Contact</h1>
    </div>

    <section class="py-5">
        <div class="container">
            <div class="row text-center text-sm g-5">

                <div class="col-md-4">
                    <div class="contact-item p-4 rounded-3 shadow-lg">
                        <i class="fa-solid fa-envelope text-primary bg-warning rounded-circle p-3 mb-3"></i>
                        <h3 class="fw-semibold  fs-4 mb-3 text-warning">Our Email</h3>
                        <p class="fw-light fs-6 text-warning"><a href="mailto:blabla@gmail.com" class="text-decoration-none text-warning">simpleenote@gmail.com</a> Interactively grow backend ideas for cross-platform models.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="contact-item p-4 rounded-3 shadow-lg">
                        <i class="fa-solid fa-phone-volume text-primary bg-warning rounded-circle p-3 mb-3"></i>
                        <h3 class="fw-semibold fs-4 mb-3 text-warning">Call Us</h3>
                        <p class="fw-light fs-6 text-warning">+62 8123456789 Distinctively exploit optimal alignments for intuitive bandwidth.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="contact-item p-4 rounded-3 shadow-lg">
                        <i class="fa-brands fa-google-play text-primary bg-warning rounded-circle p-3 mb-3"></i>
                        <h3 class="fw-semibold fs-4 mb-3 text-warning">Go to our Application!</h3>
                        <p class="fw-light fs-6 text-warning">Download it on now...</p>
                    </div>
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