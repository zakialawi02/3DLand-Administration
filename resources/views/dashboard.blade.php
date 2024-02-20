<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/assets/img/favicon.png" type="image/x-icon">

    @include('component.styleGeneral')

    <style>

    </style>

    <title>Dashboard</title>
</head>



<body>
    <!-- HEADER -->
    @include('component.header_dashboard')

    <main>
        <div class="container-fluid d-flex flex-column justify-content-center align-items-center my-3 py-3">
            <div class="text-center mb-5">
                <h1 class="fw-bold">Welcome</h1>
            </div>
            <h3 class="fw-bold">Menu:</h3>
            <div class="row justify-content-center">
                <a href="{{ route('parcel.index') }}" class="col-6  btn btn-primary text-center text-lg-start text-decoration-none p-3 rounded-xl text-light fw-bold fs-5 border border-2 border-dark m-2">
                    <i class="bi bi-building-fill-gear"></i>
                    Parcel Data
                </a>
                <a href="{{ route('resident.index') }}" class="col-6  btn btn-primary text-center text-lg-start text-decoration-none p-3 rounded-xl text-light fw-bold fs-5 border border-2 border-dark m-2">
                    <i class="bi bi-file-person"></i>
                    Resident Data
                </a>
                <a href="{{ route('uri.index') }}" class="col-6  btn btn-primary text-center text-lg-start text-decoration-none p-3 rounded-xl text-light fw-bold fs-5 border border-2 border-dark m-2">
                    <i class="bi bi-link-45deg"></i>
                    URI Data
                </a>
                <a href="" class="col-6  btn btn-primary text-center text-lg-start text-decoration-none p-3 rounded-xl text-light fw-bold fs-5 border border-2 border-dark m-2">
                    <i class="bi bi-people-fill"></i>
                    Admin Data
                </a>
            </div>
        </div>

    </main>

    <footer>
        <!-- place footer here -->
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="/assets/js/script.js"></script>



</body>

</html>
