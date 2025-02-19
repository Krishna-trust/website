<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
    <title>Selcom Portal</title>

    <!-- CSRF Token -->
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
    <link rel="icon" type="image/x-icon" href="images/favicon.png">

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="css/guest.css" />
    <link rel="stylesheet" href="css/fonts.css">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-keyboard@latest/build/css/index.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body class="font-sans antialiased text-gray-900">
    <div class="container-fluid">

        <div class="row">
            <!-- Left Column -->
            <div class="col-lg-4 col-xl-4 col-xxl-4 bg-guest d-none d-lg-flex flex-column justify-content-between">
                <div class="d-flex flex-column v-100">
                    <div class="d-flex justify-content-between flex-column vh-100">
                        <div class="pt-5 pb-5 mx-5 d-flex flex-column">
                            <img src="{{ asset('images/logo.png') }}" width="124" height="80" />
                            <span class="text-white guest-line-typography">Krishna Niswarth Seva Trust</span>
                        </div>
                        <!-- <div class="pt-5 pb-5 mx-5 d-flex flex-column">
                            <span class="ml-1 text-white fs-6">
                                Having Troubles?
                                <a href="mailto:help@selcom.net" class="text-reset text-decoration-underline text-white">
                                    Get Help
                                </a>
                            </span>
                        </div> -->
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="col-lg-8 col-xl-8 col-xxl-8 bg-light d-flex justify-content-center flex-column vh-100">
                <div class="row d-flex justify-content-center align-items-center ">
                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                        <div class="bg-white p-4" style="border-radius:29px;">
                            <div class="text-center">
                                <img src="{{ asset('images/logo.png') }}" width="124" height="80" />
                                <h2 class="guest-heading mt-4">Login</h2>
                                <!-- <p class="guest-subline text-center ">Login</p> -->
                            </div>
                            <div class="mt-4 mx-4 mb-4">
                                <!-- <form method="POST" action="dashboard.php">
                                    <div class="form-group">
                                        <label for="email" class="form-label">User Name</label>
                                        <input type="email" class="form-control" id="email" name="email" value="" placeholder="abc@gmail.com" autofocus autocomplete="off">
                                    </div>
                                    <div class="form-group mt-4">
                                        <label for="password" class="form-label">Pin</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="******************" autocomplete="current-password">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block mt-6 py-3" data-loading-text="Processing Order">
                                        Login
                                    </button>
                                </form> -->
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                                <form action="{{ route('login.post') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email Address</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email" value="{{ old('email') }}">
                                        @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            id="password" name="password">
                                        @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary btn-block mt-6 py-3">
                                            Login
                                        </button>
                                    </div>
                                </form>
                                <div class="mt-3 text-center">
                                    <p>Don't have an account? <a class="text-primary" href="{{ route('register') }}">Register here</a></p>
                                </div>
                            </div>
                            <!-- <div class="mt-4 mx-4 text-center">
                                <a href="forgot_pin.php" class="text-danger fw-bold">Forgot Password?</a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>
