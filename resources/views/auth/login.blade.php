@extends('layouts.apps')

@section('main')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <style>
        .bg-image-vertical {
            position: relative;
            overflow: hidden;
            background-repeat: no-repeat;
            background-position: right center;
            background-size: auto 100%;
        }
    </style>
    <!-- <form action="{{ route('login') }}" method="POST">
        @csrf
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Login</button>
    </form> -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 text-black">

                <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

                <form action="{{ route('login') }}" method="POST" style="width: 23rem;">
                    @csrf
                    <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="form2Example18">Email address</label>
                        <input type="email" name="email" id="email" class="form-control form-control-lg" />
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="form2Example28">Password</label>
                        <input type="password"  name="password" id="password" class="form-control form-control-lg" />
                    </div>

                    <div class="pt-1 mb-4">
                        <button class="btn btn-info btn-block" type="submit">Login</button>
                    </div>

                    <p class="small mb-5 pb-lg-2"><a class="text-muted" href="#!">Forgot password?</a></p>
                    <p>Don't have an account? <a href="#!" class="link-info">Register here</a></p>

                </form>

                </div>

            </div>
        </div>
    </div>
</body>
@endsection
