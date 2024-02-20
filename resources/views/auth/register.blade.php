<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/assets/img/favicon.png" type="image/x-icon">

    @include('component.styleGeneral')

    <title>Register | {{ config('app.name') }}</title>

</head>

<body>
    <!-- HEADER -->
    @include('component.header_viewer')

    <main>
        <div class="container my-3 p-3 ">
            <div class="row justify-content-center">

                <div class="col-md-6">
                    <h2>Register</h2>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="mb-1">Full Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Your Name" value="{{ old('name') }}" required autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="mb-1">Email</label>
                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Your Email" value="{{ old('email') }}" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="mb-1">Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Input Your Password" required>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="mb-1">Password Confirmation</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Input Your Password Again">
                        </div>
                        <button class="btn btn-primary d-block w-100 mb-3" type="submit">Sign Up</button>
                        <p class="mb-0 text-secondary text-center">
                            Already have an account? <a href="{{ route('login') }}">Login</a>
                        </p>
                    </form>

                </div>
            </div>
        </div>
    </main>

    @include('component.scriptGeneral')

</body>

</html>
