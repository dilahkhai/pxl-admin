@extends('layouts.apps')
@section('main')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 text-black">

                <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

                <form action="{{ route('register') }}" method="POST" style="width: 23rem;">
                    @csrf
                    <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign Up</h3>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control form-control-lg" />
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="name">Email address</label>
                        <input type="email" name="email" id="email" class="form-control form-control-lg" />
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="password">Password</label>
                        <input type="password"  name="password" id="password" class="form-control form-control-lg" />
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="confirm_password">Confirm Password</label>
                        <input type="password"  name="confirm_password" id="confirm_password" class="form-control form-control-lg" />
                    </div>

                    <div class="pt-1 mb-4">
                        <button class="btn btn-info btn-block" type="submit">Sign Up</button>
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