<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login | {{ config('app.name', 'Krishna Niswarth Seva Trust') }}</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <style>
        :root {
            --primary: #1417a3;
            --primary-dark: #0f1285;
            --primary-light: #2d35cc;
            --secondary: #f59e0b;
            --text-dark: #1e293b;
            --text-body: #475569;
            --bg-light: #f8fafc;
            --radius-lg: 20px;
            --transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fff;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        .login-container {
            height: 100vh;
            display: flex;
            overflow: hidden; /* Prevent scrolling on laptop */
        }

        @media (max-width: 991px) {
            .login-container {
                height: 100dvh;
                overflow: hidden; /* No scrolling for mobile too */
            }
        }

        /* Left Panel - Image area */
        .login-image-panel {
            flex: 1.25;
            /* background: url('{{ asset('images/kit-vitaran.jpg') }}') center center no-repeat; */
            background-size: cover;
            position: relative;
            display: none; /* Hidden on mobile */
            overflow: hidden;
            height: 100vh;
        }

        @media (min-width: 992px) {
            .login-image-panel {
                display: block;
            }
        }

        .login-image-panel::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(20, 23, 163, 0.9) 0%, rgba(15, 18, 133, 0.7) 100%);
            z-index: 1;
        }

        .image-content {
            position: relative;
            z-index: 2;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 5rem;
            color: white;
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .image-content h1 {
            font-size: 3rem; /* Slightly smaller for better fit */
            font-weight: 800;
            margin-bottom: 1.5rem;
            line-height: 1.1;
            letter-spacing: -1px;
        }

        .image-content p {
            font-size: 1.1rem; /* Slightly smaller for better fit */
            opacity: 0.9;
            max-width: 480px;
            line-height: 1.7;
            font-weight: 300;
        }

        .brand-logo-white {
            position: absolute;
            top: 3rem;
            left: 5rem;
            z-index: 2;
        }

        /* Right Panel - Form area */
        .login-form-panel {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: var(--bg-light);
            padding: 2rem; /* Reduced padding */
            position: relative;
            height: 100vh;
        }

        .form-card {
            width: 100%;
            max-width: 420px;
            background: white;
            padding: 2.5rem 3rem; /* Reduced vertical padding */
            border-radius: var(--radius-lg);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.08);
            position: relative;
            z-index: 2;
            transition: var(--transition);
        }

        .form-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 30px 60px -12px rgba(0, 0, 0, 0.12);
        }

        .mobile-logo {
            display: none;
            text-align: center;
            margin-bottom: 2rem;
        }

        @media (max-width: 991px) {
            .mobile-logo {
                display: block;
                margin-bottom: 1rem; /* Tightened spacing */
            }
            .login-form-panel {
                background-color: white;
                padding: 1rem 1.5rem; /* Reduced vertical padding */
                height: 100dvh;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }
            .form-card {
                box-shadow: none;
                padding: 0 1.25rem; /* Added padding on start and end for mobile */
                max-width: 100%;
                width: 100%;
                display: flex;
                flex-direction: column;
                justify-content: center;
            }
            .login-header {
                text-align: center;
                margin-bottom: 1rem; /* Reduced from 2rem */
            }
            .login-header h2 {
                font-size: 1.6rem; /* Slightly smaller for mobile */
            }
            .form-card .mb-4 {
                margin-bottom: 0.65rem !important; /* Tightened spacing between input fields */
            }
            .separator {
                margin: 0.75rem 0; /* Reduced from 1.5rem */
            }
            .btn-login {
                padding: 0.85rem; /* Slightly tighter */
                margin-top: 0.5rem; /* Reduced from 1.5rem desktop */
            }
            .btn-google {
                padding: 0.7rem;
            }
            .back-to-site {
                margin-top: 0.75rem; /* Reduced from 1.5rem */
            }
            .form-card:hover {
                transform: none;
            }
        }

        .login-header {
            margin-bottom: 2rem; /* Tightened spacing */
        }

        .login-header h2 {
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
            font-size: 1.75rem; /* Slightly smaller for better fit */
            letter-spacing: -0.5px;
        }

        .login-header p {
            color: var(--text-body);
            font-size: 0.95rem;
            opacity: 0.8;
            margin-bottom: 0;
        }

        /* Improved Form Controls */
        .form-label {
            font-weight: 600;
            color: var(--text-dark);
            font-size: 0.85rem;
            margin-bottom: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            opacity: 0.9;
        }

        .input-group {
            background-color: #f8fafc;
            border: 1.5px solid #e2e8f0;
            border-radius: 12px;
            overflow: hidden;
            transition: var(--transition);
        }

        .input-group:focus-within {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(20, 23, 163, 0.1);
            background-color: #fff;
        }

        .input-group-text {
            border: none;
            background: transparent;
            padding-left: 1.25rem;
            padding-right: 0.5rem;
            font-size: 1.1rem;
            color: #94a3b8;
        }

        .form-control {
            border: none;
            padding: 1rem 1.25rem 1rem 0.5rem;
            font-size: 1rem;
            background-color: transparent;
            color: var(--text-dark);
            box-shadow: none !important;
        }

        .form-control::placeholder {
            color: #cbd5e1;
            font-weight: 400;
        }

        .btn-login {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            border: none;
            color: white;
            padding: 1.1rem;
            font-weight: 600;
            font-size: 1rem;
            border-radius: 12px;
            width: 100%;
            margin-top: 1.5rem;
            transition: var(--transition);
            box-shadow: 0 10px 20px -5px rgba(20, 23, 163, 0.3);
            letter-spacing: 0.5px;
        }

        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px -5px rgba(20, 23, 163, 0.4);
            color: white;
            opacity: 1;
        }

        .btn-login:active {
            transform: translateY(-1px);
        }

        .separator {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 1.5rem 0; /* Reduced from 2.5rem */
            color: #94a3b8;
            font-size: 0.8rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .separator::before, .separator::after {
            content: '';
            flex: 1;
            border-bottom: 1.5px solid #f1f5f9;
        }

        .separator::before { margin-right: 1rem; }
        .separator::after { margin-left: 1rem; }

        .btn-google {
            display: flex;
            align-items: center;
            justify-content: center;
            background: white;
            border: 1.5px solid #e2e8f0;
            color: var(--text-dark);
            padding: 0.75rem; /* Slightly reduced */
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: var(--transition);
            width: 100%;
            text-decoration: none;
        }

        .btn-google:hover {
            background: #f8fafc;
            border-color: #cbd5e1;
            color: var(--text-dark);
            transform: translateY(-2px);
        }

        .btn-google img {
            width: 18px; /* Slightly smaller */
            margin-right: 10px;
        }

        .form-check-input {
            width: 1.1rem;
            height: 1.1rem;
            border: 1.5px solid #cbd5e1;
            cursor: pointer;
        }

        .form-check-input:checked {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .form-check-label {
            cursor: pointer;
            user-select: none;
            padding-left: 0.25rem;
            font-size: 0.85rem;
        }

        .alert-danger {
            border-radius: 12px;
            font-size: 0.85rem;
            padding: 0.75rem 1rem;
            margin-bottom: 1.5rem;
            background-color: #fef2f2;
            border: 1px solid #fee2e2;
            color: #b91c1c;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }

        .back-to-site {
            margin-top: 1.5rem; /* Reduced from 2.5rem */
            text-align: center;
        }

        .back-to-site a {
            color: var(--text-body);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
        }

        .back-to-site a i {
            font-size: 1.1rem;
            transition: var(--transition);
        }

        .back-to-site a:hover {
            color: var(--primary);
        }

        .back-to-site a:hover i {
            transform: translateX(-5px);
        }

        /* Floating decoration elements */
        .decor-circle {
            position: absolute;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            opacity: 0.03;
            z-index: 1;
        }

        .circle-1 {
            width: 400px;
            height: 400px;
            top: -100px;
            right: -100px;
        }

        .circle-2 {
            width: 250px;
            height: 250px;
            bottom: -50px;
            left: -50px;
        }
        .password-toggle {
            cursor: pointer;
            padding-right: 1.25rem !important;
            color: #94a3b8;
            transition: var(--transition);
        }

        .password-toggle:hover {
            color: var(--primary);
        }
    </style>
</head>

<body>
    <div class="login-container">
        <!-- Left Panel -->
        <div class="login-image-panel">
            <div class="brand-logo-white">
                <img src="{{ asset('images/logo.png') }}" width="110" alt="Logo">
            </div>
            <div class="image-content">
                <h1>Bridging Minds,<br>Building Futures.</h1>
                <p>Welcome back! Sign in to access your administrative dashboard and continue our mission of selfless service.</p>
            </div>
            <div class="decor-circle circle-1"></div>
            <div class="decor-circle circle-2"></div>
        </div>

        <!-- Right Panel -->
        <div class="login-form-panel">
            <div class="decor-circle circle-1"></div>
            <div class="decor-circle circle-2"></div>
            
            <div class="form-card">
                <div class="mobile-logo">
                    <img src="{{ asset('images/logo.png') }}" width="100" alt="Logo">
                </div>

                <div class="login-header">
                    <h2>Welcome Back</h2>
                    <p>Enter your details to sign in</p>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('login.post') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="form-label">Email Address</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-envelope"></i>
                            </span>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                id="email" name="email" value="{{ old('email') }}" placeholder="name@example.com" required autofocus>
                        </div>
                        @error('email')
                            <div class="invalid-feedback d-block mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-lock"></i>
                            </span>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" placeholder="••••••••" required>
                            <span class="input-group-text password-toggle" id="togglePassword">
                                <i class="bi bi-eye"></i>
                            </span>
                        </div>
                        @error('password')
                            <div class="invalid-feedback d-block mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label text-muted" for="remember" style="font-size: 0.85rem;">
                                Remember me
                            </label>
                        </div>
                        {{-- <a href="{{ route('password.request') }}" class="text-primary text-decoration-none" style="font-size: 0.85rem; font-weight: 500;">
                            Forgot Password?
                        </a> --}}
                    </div>

                    <button type="submit" class="btn btn-login">
                        Sign In
                    </button>
                </form>

                <div class="separator">or sign in with</div>

                <a href="{{ route('auth.google') }}" class="btn-google">
                    <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="Google">
                    Continue with Google
                </a>

                <div class="back-to-site">
                    <a href="{{ url('/') }}">
                        <i class="bi bi-arrow-left me-1"></i> Back to Homepage
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.querySelector("#togglePassword");
            const passwordInput = document.querySelector("#password");

            if (togglePassword && passwordInput) {
                togglePassword.addEventListener("click", function () {
                    // toggle the type attribute
                    const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
                    passwordInput.setAttribute("type", type);
                    
                    // toggle the icon
                    const icon = this.querySelector("i");
                    if (type === "password") {
                        icon.classList.remove("bi-eye-slash");
                        icon.classList.add("bi-eye");
                    } else {
                        icon.classList.remove("bi-eye");
                        icon.classList.add("bi-eye-slash");
                    }
                });
            }
        });
    </script>
</body>
</html>

