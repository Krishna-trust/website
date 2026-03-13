<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Krishna Niswarth Seva Trust') }} — Login</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --primary:        #D97706;
            --primary-hover:  #B45309;
            --gold:           #F59E0B;
            --gold-light:     #FEF3C7;
            --dark:           #2c2f3e;
            --light-bg:       #FFFBEB;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            display: flex;
            overflow: hidden;
        }

        /* ── Left panel ─────────────────────────────────── */
        .left-panel {
            width: 55%;
            background: linear-gradient(145deg, #78350F 0%, #D97706 55%, #F59E0B 100%);
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 3rem;
            overflow: hidden;
        }

        /* Decorative blobs */
        .left-panel::before {
            content: '';
            position: absolute;
            width: 400px; height: 400px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 50%;
            top: -100px; left: -100px;
        }
        .left-panel::after {
            content: '';
            position: absolute;
            width: 300px; height: 300px;
            background: rgba(255, 255, 255, 0.06);
            border-radius: 50%;
            bottom: -80px; right: -80px;
        }

        .left-panel .brand-logo {
            width: 110px;
            height: auto;
            margin-bottom: 1.8rem;
            filter: drop-shadow(0 4px 12px rgba(0,0,0,0.3));
            position: relative; z-index: 1;
        }

        .left-panel h1 {
            color: #ffffff;
            font-size: 1.9rem;
            font-weight: 700;
            text-align: center;
            line-height: 1.35;
            position: relative; z-index: 1;
            text-shadow: 0 2px 8px rgba(0,0,0,0.2);
        }

        .left-panel p {
            color: rgba(255,255,255,0.75);
            font-size: 0.95rem;
            text-align: center;
            margin-top: 1rem;
            max-width: 340px;
            line-height: 1.7;
            position: relative; z-index: 1;
        }

        .left-panel .gold-badge {
            margin-top: 2rem;
            background: rgba(255, 255, 255, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.45);
            color: #ffffff;
            font-size: 0.82rem;
            font-weight: 500;
            padding: 6px 18px;
            border-radius: 50px;
            position: relative; z-index: 1;
            letter-spacing: 0.5px;
        }

        /* Decorative circles pattern */
        .circle-pattern {
            position: absolute;
            z-index: 0;
        }
        .circle-1 { width: 180px; height: 180px; border: 1.5px solid rgba(255,255,255,0.07); border-radius: 50%; bottom: 120px; left: 30px; }
        .circle-2 { width: 280px; height: 280px; border: 1.5px solid rgba(255,255,255,0.05); border-radius: 50%; bottom: 60px;  left: -20px; }
        .circle-3 { width: 120px; height: 120px; border: 1.5px solid rgba(245,158,11,0.15); border-radius: 50%; top: 80px; right: 40px; }

        /* ── Right panel ─────────────────────────────────── */
        .right-panel {
            width: 45%;
            background: #f8f9ff;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2.5rem;
        }

        .login-box {
            width: 100%;
            max-width: 400px;
        }

        .login-box .login-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 0.35rem;
        }

        .login-box .login-subtitle {
            font-size: 0.9rem;
            color: #6B7280;
            margin-bottom: 2rem;
        }

        /* Form controls */
        .form-label {
            font-size: 0.875rem;
            font-weight: 500;
            color: #374151;
            margin-bottom: 0.4rem;
        }

        .form-control {
            border: 1.5px solid #D1D5DB;
            border-radius: 10px;
            padding: 0.65rem 1rem;
            font-size: 0.95rem;
            font-family: 'Poppins', sans-serif;
            transition: border-color 0.2s, box-shadow 0.2s;
            background-color: #ffffff;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(217, 119, 6, 0.15);
            outline: none;
        }

        .form-control.is-invalid {
            border-color: #EF4444;
        }

        .invalid-feedback {
            font-size: 0.8rem;
            color: #EF4444;
        }

        /* Primary button */
        .btn-login {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-hover) 100%);
            color: #ffffff;
            border: none;
            border-radius: 10px;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            width: 100%;
            cursor: pointer;
            transition: transform 0.15s, box-shadow 0.2s;
            box-shadow: 0 4px 14px rgba(217, 119, 6, 0.4);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            text-decoration: none;
        }

        .btn-login:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(217, 119, 6, 0.55);
            color: #ffffff;
        }

        .btn-login:active {
            transform: translateY(0);
        }

        /* Google button */
        .btn-google {
            background: #ffffff;
            color: #374151;
            border: 1.5px solid #D1D5DB;
            border-radius: 10px;
            padding: 0.72rem 1.5rem;
            font-size: 0.95rem;
            font-weight: 500;
            font-family: 'Poppins', sans-serif;
            width: 100%;
            cursor: pointer;
            transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            text-decoration: none;
        }

        .btn-google:hover {
            border-color: var(--primary);
            box-shadow: 0 2px 10px rgba(217, 119, 6, 0.15);
            color: var(--primary);
            background: var(--light-bg);
        }

        /* Divider */
        .divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 1.4rem 0;
        }
        .divider::before, .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background-color: #E5E7EB;
        }
        .divider span {
            font-size: 0.8rem;
            color: #9CA3AF;
            white-space: nowrap;
        }

        /* Alert */
        .alert-danger {
            background-color: #FEF2F2;
            border: 1px solid #FECACA;
            border-radius: 10px;
            color: #B91C1C;
            font-size: 0.875rem;
            padding: 0.75rem 1rem;
        }

        /* Mobile logo (only shown on small screens) */
        .mobile-logo {
            display: none;
            flex-direction: column;
            align-items: center;
            padding: 1.8rem 1rem 0.5rem;
            background: linear-gradient(135deg, #78350F 0%, #D97706 100%);
            width: 100%;
        }

        .mobile-logo img {
            width: 72px;
            height: auto;
            margin-bottom: 0.6rem;
            filter: drop-shadow(0 2px 6px rgba(0,0,0,0.25));
        }

        .mobile-logo h2 {
            color: #ffffff;
            font-size: 1.1rem;
            font-weight: 700;
            text-align: center;
            margin: 0;
            line-height: 1.4;
        }

        .mobile-logo span {
            color: rgba(255,255,255,0.75);
            font-size: 0.78rem;
            text-align: center;
            margin-top: 0.25rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            body { flex-direction: column; overflow-y: auto; }
            .left-panel { display: none; }
            .mobile-logo { display: flex; }
            .right-panel {
                width: 100%;
                padding: 1.5rem;
                background: #fffbf0;
                flex: 1;
                align-items: flex-start;
                padding-top: 2rem;
            }
            .login-box { max-width: 100%; }
        }
    </style>
</head>

<body>

    <!-- ── Mobile logo (shown only on small screens) ──────── -->
    <div class="mobile-logo">
        <img src="{{ asset('images/logo.png') }}" alt="Krishna Trust Logo">
        <h2>Krishna Niswarth Seva Trust</h2>
        <span>Serving with Love since 2018</span>
    </div>

    <!-- ── Left decorative panel ──────────────────────────── -->
    <div class="left-panel">
        <div class="circle-pattern circle-1"></div>
        <div class="circle-pattern circle-2"></div>
        <div class="circle-pattern circle-3"></div>

        <img src="{{ asset('images/logo.png') }}" alt="Krishna Trust Logo" class="brand-logo">

        <h1>Krishna Niswarth<br>Seva Trust</h1>
        <p>Selflessly serving elders with free meals, compassion, and dignity — every single day.</p>
        <span class="gold-badge">Serving with Love since 2018</span>
    </div>

    <!-- ── Right login panel ───────────────────────────────── -->
    <div class="right-panel">
        <div class="login-box">

            <h2 class="login-title">Welcome back</h2>
            <p class="login-subtitle">Sign in to your admin account</p>

            @if ($errors->any())
            <div class="alert alert-danger mb-3">
                <ul class="mb-0 ps-3">
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
                    <input
                        type="email"
                        class="form-control @error('email') is-invalid @enderror"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="you@example.com"
                        autofocus
                        autocomplete="email"
                    >
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input
                        type="password"
                        class="form-control @error('password') is-invalid @enderror"
                        id="password"
                        name="password"
                        placeholder="••••••••"
                        autocomplete="current-password"
                    >
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn-login">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 3h4a2 2 0 012 2v14a2 2 0 01-2 2h-4M10 17l5-5-5-5M3 12h12"/>
                    </svg>
                    Sign In
                </button>
            </form>

            <div class="divider"><span>OR CONTINUE WITH</span></div>

            <a href="{{ route('auth.google') }}" class="btn-google">
                <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" width="20" height="20" alt="Google">
                Continue with Google
            </a>

            <p class="text-center mt-4" style="font-size:0.8rem; color:#9CA3AF;">
                &copy; {{ date('Y') }} Krishna Niswarth Seva Trust. All rights reserved.
            </p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
