<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/assets/img/favicon.png" type="image/x-icon">

    @include('component.styleGeneral')

    <title>Login | {{ config('app.name') }}</title>

</head>

<body>
    <!-- HEADER -->
    @include('component.header_viewer')

    <main>
        <div class="container my-3 p-3 ">
            <div class="row justify-content-center">

                <div class="col-md-6">
                    <h2>Login</h2>

                    <form action="{{ route('login') }}" method="post">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="mb-1">Email</label>
                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Your Email" value="{{ old('email') }}" required autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="mb-1">Password</label>
                            <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" placeholder="Your Password" required>
                            @error('passwords')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Login</button>

                        <p class="mb-0 text-secondary text-center">
                            Don't have an account? <a href="{{ route('register') }}">Register</a>
                        </p>
                        {{-- <p class="mb-0 text-secondary text-center">
                            Forgot Your Password? <a href="{{ route('password.request') }}">Reset Password</a>
                        </p> --}}

                    </form>
                </div>
            </div>
        </div>
    </main>

    @include('component.scriptGeneral')

</body>

</html>
