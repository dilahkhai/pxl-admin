@extends('layouts.apps')

@section('main')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <style>
        .cardbody-color{
  background-color: #ebf2fa;
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

    <div class="container">
        <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2 class="text-center text-dark mt-5">Login Form</h2>
            <div class="card my-5">
                <form action="{{ route('login') }}" method="POST" class="card-body cardbody-color p-lg-5">
                    @csrf
                    <div class="text-center">
                    <img src="https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                        width="200px" alt="profile">
                    </div>

                    <div class="mb-3">
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp"
                            placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                    </div>
                    <div class="text-center"><button type="submit" class="btn btn-outline-primary px-5 mb-5 w-100">Login</button></div>
                </form>
            </div>

        </div>
        </div>
    </div>
    <script>
        function togglePassword(inputId) {
            const input = document.getElementById(inputId);
            const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
            input.setAttribute('type', type);
        }
    </script>
</body>
@endsection
