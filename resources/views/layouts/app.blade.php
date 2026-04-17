<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Krishna Niswarth Seva Trust') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">

    <!-- Scripts -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fade.css') }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-EWS1NNPFEV"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-EWS1NNPFEV');
    </script>
    <!-- End Google tag -->

</head>


<body class="ltr app sidebar-mini">

    <!-- <div id="global-loader">
        <img src="{{ asset('images/loader.svg') }}" class="loader-img" alt="Loader">
    </div> -->
    <div class="page is-expanded overflow-auto">
        <div class="page-main">
            <div class="app-content mt-0 overflow-auto">
                @include('admin.parts.sidebar')
                <div class="main-content">
                    <div class="side-app">
                        <div class="main-container container-fluid">
                            @include('admin.parts.header')
                            <hr class="dropdown-divider" />
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="#top" id="back-to-top" style="display: none;"><i class="fa fa-long-arrow-up"></i></a>

    {{-- <script type="text/Javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script> <!-- jquery --> --}}
    {{-- <script src="{{ asset('js/jquery.min.js') }}"></script> --}}

    <!-- jQuery (compatible version for jQuery UI) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>

    @yield('scripts')

    <script src="{{ asset('js/spinner.js') }}"></script>
    <script src="{{ asset('bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('sidemenu/sidemenu.js') }}"></script>
    <!-- <script src="{{ asset('assets/plugins/inputtags/inputtags.js') }}"></script> -->
    <script src="{{ asset('js/custom.js') }}"></script>

    <!-- datepicker -->
    <!-- <script src="{{ asset('assets/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}">
    </script> -->

    <!--datetimepicker-->
    <!-- <script src="{{ asset('assets/adminlte/bower_components/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('assets/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script> -->

    <!-- Include Leaflet CSS and JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script>
        // ── Number input masking ──────────────────────────────────────────────
        (function () {
            function formatMobile(val) {
                // Strip non-digits
                var d = val.replace(/\D/g, '');
                // Strip leading country code (91 or 0)
                if (d.length === 12 && d.startsWith('91')) d = d.slice(2);
                if (d.length === 11 && d.startsWith('0'))  d = d.slice(1);
                d = d.slice(0, 10);
                return d.length > 5 ? d.slice(0, 5) + ' ' + d.slice(5) : d;
            }

            function formatAdhar(val) {
                var d = val.replace(/\D/g, '').slice(0, 12);
                var out = '';
                for (var i = 0; i < d.length; i++) {
                    if (i > 0 && i % 4 === 0) out += ' ';
                    out += d[i];
                }
                return out;
            }

            function applyMasking() {
                document.querySelectorAll('input[data-type="mobile"]').forEach(function (el) {
                    el.value = formatMobile(el.value);
                    el.removeEventListener('input', el._mobileHandler);
                    el._mobileHandler = function () {
                        var pos = el.selectionStart;
                        el.value = formatMobile(el.value);
                    };
                    el.addEventListener('input', el._mobileHandler);
                });

                document.querySelectorAll('input[data-type="adhar"]').forEach(function (el) {
                    el.value = formatAdhar(el.value);
                    el.removeEventListener('input', el._adharHandler);
                    el._adharHandler = function () {
                        el.value = formatAdhar(el.value);
                    };
                    el.addEventListener('input', el._adharHandler);
                });

                // Strip spaces on submit so controller gets plain digits
                document.querySelectorAll('form').forEach(function (form) {
                    if (form._maskSubmitBound) return;
                    form._maskSubmitBound = true;
                    form.addEventListener('submit', function () {
                        form.querySelectorAll('input[data-type="mobile"], input[data-type="adhar"]').forEach(function (el) {
                            el.value = el.value.replace(/\s/g, '');
                        });
                    });
                });
            }

            document.addEventListener('DOMContentLoaded', applyMasking);
            // Re-apply after AJAX loads (e.g., attendance view partial)
            document.addEventListener('ajax:complete', applyMasking);
        })();
        // ─────────────────────────────────────────────────────────────────────
    </script>

    {{-- ── Auto Logout Modal ──────────────────────────────────────────────── --}}
    <style>
        /* Responsive auto-logout modal */
        #autoLogoutModal .modal-dialog {
            margin: 1rem auto;
            width: calc(100% - 2rem);
            max-width: 420px;
        }
        @media (max-width: 575px) {
            #autoLogoutModal .modal-dialog {
                margin: auto 0.75rem;
                width: calc(100% - 1.5rem);
            }
            #autoLogoutModal .als-header  { padding: 1.1rem 1.25rem !important; }
            #autoLogoutModal .als-body    { padding: 1.25rem 1rem 0.75rem !important; }
            #autoLogoutModal .als-footer  { padding: 0.75rem 1rem 1.25rem !important; }
            #autoLogoutModal .als-circle-wrap { width: 100px !important; height: 100px !important; margin-bottom: 1rem !important; }
            #autoLogoutModal .als-circle-wrap svg { width: 100px !important; height: 100px !important; }
            #autoLogoutModal #als-number  { font-size: 2rem !important; }
            #autoLogoutModal .als-footer .btn { font-size: 0.875rem; padding: 0.55rem 0.75rem; }
        }
    </style>

    <div class="modal fade" id="autoLogoutModal" tabindex="-1" aria-labelledby="autoLogoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius:20px;border:none;overflow:hidden;box-shadow:0 25px 60px rgba(0,0,0,0.18);">

                {{-- Header --}}
                <div class="als-header" style="background:linear-gradient(135deg,#f59e0b 0%,#d97706 100%);padding:1.5rem 2rem;">
                    <div class="d-flex align-items-center gap-3">
                        <div style="width:52px;height:52px;background:rgba(255,255,255,0.2);border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <i class="fa fa-clock-o" style="color:white;font-size:1.5rem;"></i>
                        </div>
                        <div>
                            <h5 id="autoLogoutModalLabel" class="mb-0" style="color:white;font-weight:700;font-size:1.1rem;">Session Expiring</h5>
                            <small style="color:rgba(255,255,255,0.85);font-size:0.82rem;">You will be logged out soon</small>
                        </div>
                    </div>
                </div>

                {{-- Body --}}
                <div class="als-body modal-body text-center" style="padding:2rem 2rem 1rem;">
                    {{-- SVG Countdown Circle --}}
                    <div class="als-circle-wrap" style="position:relative;width:130px;height:130px;margin:0 auto 1.5rem;">
                        <svg width="130" height="130" style="transform:rotate(-90deg);" aria-hidden="true">
                            <circle cx="65" cy="65" r="56" fill="none" stroke="#fef3c7" stroke-width="9"/>
                            <circle id="als-circle" cx="65" cy="65" r="56" fill="none" stroke="#f59e0b" stroke-width="9"
                                stroke-dasharray="351.86" stroke-dashoffset="0"
                                style="transition:stroke-dashoffset 1s linear;stroke-linecap:round;"/>
                        </svg>
                        <div style="position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);text-align:center;">
                            <span id="als-number" style="font-size:2.6rem;font-weight:800;color:#1e293b;line-height:1;">30</span>
                            <div style="font-size:0.65rem;color:#94a3b8;font-weight:600;text-transform:uppercase;letter-spacing:1px;margin-top:2px;">sec</div>
                        </div>
                    </div>
                    <p style="color:#475569;font-size:0.95rem;line-height:1.6;margin-bottom:0;">
                        Due to inactivity, your session will expire in&nbsp;<strong id="als-text">30</strong>&nbsp;seconds.<br>
                        <span style="font-size:0.85rem;color:#94a3b8;">Click anywhere on the screen to stay logged in.</span>
                    </p>
                </div>

                {{-- Footer --}}
                <div class="als-footer modal-footer" style="border:none;padding:1rem 2rem 1.75rem;gap:0.75rem;">
                    <form id="als-logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">@csrf</form>
                    <button type="button" onclick="alsLogoutNow()" class="btn btn-outline-secondary" style="flex:1;border-radius:10px;font-weight:500;">
                        Logout Now
                    </button>
                    <button type="button" onclick="alsStayLoggedIn()" class="btn" style="flex:1;border-radius:10px;font-weight:600;background:linear-gradient(135deg,#1417a3,#0f1285);color:white;border:none;">
                        Stay Logged In
                    </button>
                </div>

            </div>
        </div>
    </div>
    {{-- ── End Auto Logout Modal ───────────────────────────────────────────── --}}

    <script>
        (function () {
            var IDLE_MS        = 5 * 60 * 1000;   // 5 minutes idle before warning
            var COUNTDOWN_SEC  = 30;               // 30-second countdown
            var CIRCUMFERENCE  = 2 * Math.PI * 56; // ≈ 351.86 (matches r=56 in SVG)

            var idleTimer      = null;
            var countdownTimer = null;
            var timeLeft       = COUNTDOWN_SEC;
            var modalInstance  = null;
            var loggingOut     = false;

            /* ── Start / reset the idle countdown ── */
            function startIdleTimer() {
                clearTimeout(idleTimer);
                idleTimer = setTimeout(showWarning, IDLE_MS);
            }

            /* ── Show the warning modal ── */
            function showWarning() {
                timeLeft = COUNTDOWN_SEC;
                updateDisplay();

                var el = document.getElementById('autoLogoutModal');
                modalInstance = new bootstrap.Modal(el, { backdrop: false, keyboard: false });
                modalInstance.show();

                clearInterval(countdownTimer);
                countdownTimer = setInterval(function () {
                    timeLeft--;
                    updateDisplay();
                    if (timeLeft <= 0) {
                        clearInterval(countdownTimer);
                        document.getElementById('als-logout-form').submit();
                    }
                }, 1000);
            }

            /* ── Update the circle + number ── */
            function updateDisplay() {
                var numEl    = document.getElementById('als-number');
                var txtEl    = document.getElementById('als-text');
                var circleEl = document.getElementById('als-circle');
                if (numEl)    numEl.textContent    = timeLeft;
                if (txtEl)    txtEl.textContent    = timeLeft;
                if (circleEl) {
                    var offset = CIRCUMFERENCE * (1 - timeLeft / COUNTDOWN_SEC);
                    circleEl.style.strokeDashoffset = offset;
                }
            }

            /* ── Dismiss modal and restart idle timer ── */
            function dismissAndReset() {
                clearInterval(countdownTimer);
                timeLeft = COUNTDOWN_SEC;
                if (modalInstance) {
                    modalInstance.hide();
                    modalInstance = null;
                }
                startIdleTimer();
            }

            /* ── Exposed to button onclick handlers ── */
            window.alsStayLoggedIn = function () { dismissAndReset(); };
            window.alsLogoutNow    = function () {
                loggingOut = true;
                clearInterval(countdownTimer);
                clearTimeout(idleTimer);
                document.getElementById('als-logout-form').submit();
            };

            /* ── mousemove / keypress / scroll / touch: reset idle timer only, never dismiss modal ── */
            ['mousemove', 'keypress', 'scroll', 'touchstart'].forEach(function (evt) {
                document.addEventListener(evt, function () {
                    if (loggingOut || modalInstance) return;
                    startIdleTimer();
                }, { passive: true });
            });

            /* ── click only: reset idle timer AND dismiss modal if it is showing ── */
            document.addEventListener('click', function () {
                if (loggingOut) return;
                if (modalInstance) {
                    dismissAndReset();
                } else {
                    startIdleTimer();
                }
            }, { passive: true });

            /* ── Kick off on page load ── */
            startIdleTimer();
        })();
    </script>

    {{-- ── Language Selection Modal ─────────────────────────────────────────── --}}
    @if(session('show_language_popup'))
    <style>
        /* ── Blurred backdrop: override Bootstrap's backdrop directly ── */
        .modal-backdrop {
            backdrop-filter: blur(14px) !important;
            -webkit-backdrop-filter: blur(14px) !important;
            background-color: rgba(6, 6, 40, 0.70) !important;
        }
        .modal-backdrop.show { opacity: 1 !important; }

        /* ── Modal entrance animation ── */
        #langSelectModal .modal-dialog {
            animation: langModalIn 0.48s cubic-bezier(0.34, 1.56, 0.64, 1) both;
        }
        @keyframes langModalIn {
            from { opacity: 0; transform: scale(0.80) translateY(50px); }
            to   { opacity: 1; transform: scale(1) translateY(0); }
        }

        /* ── Language cards ── */
        #langSelectModal .lang-card {
            cursor: pointer;
            border: 2px solid #e2e8f0;
            border-radius: 22px;
            padding: 2rem 0.75rem 1.6rem;
            text-align: center;
            transition: all 0.30s cubic-bezier(0.34, 1.56, 0.64, 1);
            background: #ffffff;
            user-select: none;
            position: relative;
            overflow: hidden;
        }
        #langSelectModal .lang-card:hover {
            border-color: #1417a3;
            background: #f4f5fe;
            transform: translateY(-7px) scale(1.03);
            box-shadow: 0 18px 44px rgba(20,23,163,0.16);
        }
        #langSelectModal .lang-card.selected {
            border-color: #1417a3;
            background: linear-gradient(160deg, #eef0fb 0%, #e3e6ff 100%);
            transform: translateY(-7px) scale(1.03);
            box-shadow: 0 18px 44px rgba(20,23,163,0.26);
        }

        /* ── Flag image wrapper ── */
        #langSelectModal .lang-flag-wrap {
            width: 78px; height: 78px;
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 1rem;
            overflow: hidden;
            transition: all 0.32s cubic-bezier(0.34, 1.56, 0.64, 1);
            box-shadow: 0 6px 18px rgba(0,0,0,0.12);
            border: 3px solid #e2e8f0;
        }
        #langSelectModal .lang-flag-wrap img {
            width: 100%; height: 100%;
            object-fit: cover;
            display: block;
        }
        #langSelectModal .lang-card.selected .lang-flag-wrap {
            box-shadow: 0 10px 30px rgba(20,23,163,0.35);
            border-color: #1417a3;
            transform: scale(1.1);
        }

        /* ── Text ── */
        #langSelectModal .lang-name {
            font-size: 1.08rem; font-weight: 700; color: #1e293b;
            transition: color 0.25s;
        }
        #langSelectModal .lang-card.selected .lang-name { color: #1417a3; }

        /* ── Check badge (top-right) ── */
        #langSelectModal .check-badge {
            position: absolute; top: 11px; right: 11px;
            width: 26px; height: 26px;
            background: linear-gradient(135deg, #1417a3, #6366f1);
            border-radius: 50%;
            display: none; align-items: center; justify-content: center;
            box-shadow: 0 3px 10px rgba(20,23,163,0.45);
        }
        #langSelectModal .lang-card.selected .check-badge {
            display: flex;
            animation: checkPop 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
        @keyframes checkPop {
            from { transform: scale(0) rotate(-60deg); opacity: 0; }
            to   { transform: scale(1) rotate(0deg); opacity: 1; }
        }

        /* ── Continue button ── */
        #saveLangBtn {
            position: relative; overflow: hidden;
            border-radius: 50px !important;
            font-size: 1rem; font-weight: 700;
            background: linear-gradient(135deg, #1417a3 0%, #4f46e5 60%, #6366f1 100%) !important;
            border: none !important; color: white !important;
            box-shadow: 0 10px 28px rgba(20,23,163,0.38) !important;
            letter-spacing: 0.04em;
            transition: transform 0.22s ease, box-shadow 0.22s ease !important;
        }
        /* animated shimmer sweep */
        #saveLangBtn::before {
            content: '';
            position: absolute; top: 0; left: -120%;
            width: 60%; height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.28), transparent);
            transform: skewX(-18deg);
            animation: btnShimmer 2.6s ease-in-out infinite;
        }
        @keyframes btnShimmer {
            0%   { left: -120%; }
            40%  { left: 160%; }
            100% { left: 160%; }
        }
        #saveLangBtn:hover:not(:disabled) {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 18px 40px rgba(20,23,163,0.48) !important;
        }
        #saveLangBtn:active:not(:disabled) { transform: translateY(0) scale(1); }
        #saveLangBtn .btn-arrow {
            display: inline-flex; align-items: center; justify-content: center;
            width: 28px; height: 28px;
            background: rgba(255,255,255,0.20);
            border-radius: 50%;
            margin-left: 0.6rem;
            transition: transform 0.22s ease;
        }
        #saveLangBtn:hover .btn-arrow { transform: translateX(3px); }

        /* ── Responsive ── */
        @media (max-width: 575px) {
            #langSelectModal .modal-dialog { margin: auto 1rem; width: calc(100% - 2rem); }
            #langSelectModal .lang-card { padding: 1.6rem 0.5rem 1.3rem; }
            #langSelectModal .lang-flag-wrap { width: 64px; height: 64px; }
        }
    </style>

    <div class="modal fade" id="langSelectModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="langSelectModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width:480px;">
            <div class="modal-content" style="border-radius:28px;border:none;overflow:hidden;box-shadow:0 48px 100px rgba(0,0,0,0.32);">

                {{-- Header --}}
                <div style="background:linear-gradient(135deg,#1417a3 0%,#2d2acc 55%,#4f46e5 100%);padding:2rem 2rem 1.8rem;position:relative;overflow:hidden;">
                    <div style="position:absolute;width:140px;height:140px;background:rgba(255,255,255,0.07);border-radius:50%;top:-45px;right:-40px;pointer-events:none;"></div>
                    <div style="position:absolute;width:85px;height:85px;background:rgba(255,255,255,0.06);border-radius:50%;bottom:-28px;left:12px;pointer-events:none;"></div>
                    <div style="position:absolute;width:50px;height:50px;background:rgba(255,255,255,0.09);border-radius:50%;top:16px;right:115px;pointer-events:none;"></div>
                    <div style="position:absolute;width:24px;height:24px;background:rgba(255,255,255,0.10);border-radius:50%;bottom:22px;right:60px;pointer-events:none;"></div>

                    <div class="d-flex align-items-center gap-3" style="position:relative;z-index:1;">
                        <div style="width:64px;height:64px;background:rgba(255,255,255,0.15);border-radius:18px;display:flex;align-items:center;justify-content:center;flex-shrink:0;border:1.5px solid rgba(255,255,255,0.25);box-shadow:0 6px 18px rgba(0,0,0,0.18);">
                            <i class="fa fa-globe" style="color:white;font-size:1.8rem;"></i>
                        </div>
                        <div>
                            <h5 id="langSelectModalLabel" class="mb-0" style="color:white;font-weight:700;font-size:1.22rem;letter-spacing:-0.01em;">Choose Your Language</h5>
                            <small style="color:rgba(255,255,255,0.70);font-size:0.80rem;letter-spacing:0.01em;">ભાષા પસંદ કરો &nbsp;•&nbsp; Select Language</small>
                        </div>
                    </div>
                </div>

                {{-- Body --}}
                <div class="modal-body" style="padding:2rem 1.75rem 1.25rem;background:linear-gradient(180deg,#f6f7ff 0%,#ffffff 100%);">
                    <p style="color:#64748b;font-size:0.87rem;margin-bottom:1.6rem;text-align:center;line-height:1.7;">
                        Select your preferred language to personalize your experience.<br>
                        <span style="font-size:0.78rem;color:#94a3b8;">Your choice will be saved for future sessions.</span>
                    </p>
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="lang-card" data-lang="en" onclick="selectLang('en')">
                                <div class="check-badge">
                                    <i class="fa fa-check" style="color:white;font-size:0.65rem;"></i>
                                </div>
                                <div class="lang-flag-wrap">
                                    <img src="https://flagcdn.com/w160/gb.png" alt="United Kingdom flag">
                                </div>
                                <div class="lang-name">English</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="lang-card" data-lang="gu" onclick="selectLang('gu')">
                                <div class="check-badge">
                                    <i class="fa fa-check" style="color:white;font-size:0.65rem;"></i>
                                </div>
                                <div class="lang-flag-wrap">
                                    <img src="https://flagcdn.com/w160/in.png" alt="India flag">
                                </div>
                                <div class="lang-name">ગુજરાતી</div>
                            </div>
                        </div>
                    </div>
                    <div id="lang-error" class="text-center mt-3" style="font-size:0.83rem;display:none;color:#ef4444;">
                        <i class="fa fa-exclamation-circle me-1"></i>Please select a language to continue.
                    </div>
                </div>

                {{-- Footer --}}
                <div class="modal-footer" style="border:none;padding:0.25rem 1.75rem 1.9rem;background:linear-gradient(180deg,#ffffff 0%,#f6f7ff 100%);">
                    <button type="button" id="saveLangBtn" onclick="saveLang()" class="btn w-100">
                        <span id="saveLangSpinner" class="spinner-border spinner-border-sm me-2" style="display:none;" role="status" aria-hidden="true"></span>
                        Continue
                        <span class="btn-arrow" id="saveLangIcon">
                            <i class="fa fa-arrow-right" style="font-size:0.72rem;"></i>
                        </span>
                    </button>
                </div>

            </div>
        </div>
    </div>

    <script>
        var _selectedLang = null;

        function selectLang(lang) {
            _selectedLang = lang;
            document.querySelectorAll('#langSelectModal .lang-card').forEach(function(c) {
                c.classList.remove('selected');
            });
            document.querySelector('#langSelectModal .lang-card[data-lang="' + lang + '"]').classList.add('selected');
            document.getElementById('lang-error').style.display = 'none';
        }

        function saveLang() {
            if (!_selectedLang) {
                document.getElementById('lang-error').style.display = 'block';
                return;
            }
            var btn = document.getElementById('saveLangBtn');
            var spinner = document.getElementById('saveLangSpinner');
            var icon = document.getElementById('saveLangIcon');
            btn.disabled = true;
            spinner.style.display = 'inline-block';
            icon.style.display = 'none';

            fetch('{{ route("admin.save.language") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({ language: _selectedLang }),
            })
            .then(function(r) { return r.json(); })
            .then(function(data) {
                if (data.success) {
                    window.location.reload();
                } else {
                    btn.disabled = false;
                    spinner.style.display = 'none';
                    icon.style.display = '';
                }
            })
            .catch(function() {
                btn.disabled = false;
                spinner.style.display = 'none';
                icon.style.display = '';
            });
        }

        document.addEventListener('DOMContentLoaded', function () {
            var langModal = new bootstrap.Modal(document.getElementById('langSelectModal'), {
                backdrop: 'static',
                keyboard: false
            });
            langModal.show();
        });
    </script>
    @endif
    {{-- ── End Language Selection Modal ─────────────────────────────────────── --}}

    <script>
        let map;
        let marker;

        function loadMap() {
            // Give time for modal to fully open before loading the map
            setTimeout(() => {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        const lat = position.coords.latitude;
                        const lon = position.coords.longitude;

                        // If map already exists, remove and recreate it
                        if (map) {
                            map.remove();
                        }

                        map = L.map('map').setView([lat, lon], 13);

                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            maxZoom: 19,
                            attribution: '© OpenStreetMap'
                        }).addTo(map);

                        marker = L.marker([lat, lon]).addTo(map)
                            .bindPopup("You are here!")
                            .openPopup();

                    }, function(error) {
                        alert("Error: " + error.message);
                    });
                } else {
                    alert("Geolocation is not supported by your browser.");
                }
            }, 500); // slight delay to ensure modal is rendered
        }

        function handleLanguageChange(selectElement) {
            const selectedLang = selectElement.value;
            // Redirect to the same page with the new language code in the URL
            window.location.href = 'lang/' + selectedLang;
        }
    </script>

</body>

</html>
