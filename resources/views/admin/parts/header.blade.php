<div class="d-flex justify-content-end animate-left">
    <div class="d-flex align-items-center">
        @if(request()->routeIs('admin.dashboard'))
        {{-- Language Switcher --}}
        <div class="lang-switcher me-3" id="langSwitcher">
            <button class="lang-btn" id="langBtn" type="button">
                @if(app()->getLocale() == 'gu')
                    <img src="https://flagcdn.com/w20/in.png" width="20" height="14" alt="India" class="lang-flag-img">
                    <span class="lang-label">ગુજરાતી</span>
                @else
                    <img src="https://flagcdn.com/w20/gb.png" width="20" height="14" alt="UK" class="lang-flag-img">
                    <span class="lang-label">English</span>
                @endif
                <svg class="lang-chevron" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>

            <div class="lang-dropdown" id="langDropdown">
                <div class="lang-dropdown-header">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/>
                        <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>
                    </svg>
                    Language
                </div>

                <a href="{{ url('admin/lang/en') }}" class="lang-option {{ app()->getLocale() == 'en' ? 'active' : '' }}">
                    <div class="lang-flag-wrap">
                        <img src="https://flagcdn.com/w40/gb.png" width="28" height="20" alt="English" class="lang-flag-img-lg">
                    </div>
                    <div class="lang-option-text">
                        <span class="lang-name">English</span>
                        <span class="lang-native">English (UK)</span>
                    </div>
                    @if(app()->getLocale() == 'en')
                        <span class="lang-active-dot"></span>
                    @endif
                </a>

                <a href="{{ url('admin/lang/gu') }}" class="lang-option {{ app()->getLocale() == 'gu' ? 'active' : '' }}">
                    <div class="lang-flag-wrap">
                        <img src="https://flagcdn.com/w40/in.png" width="28" height="20" alt="Gujarati" class="lang-flag-img-lg">
                    </div>
                    <div class="lang-option-text">
                        <span class="lang-name">Gujarati</span>
                        <span class="lang-native">ગુજરાતી</span>
                    </div>
                    @if(app()->getLocale() == 'gu')
                        <span class="lang-active-dot"></span>
                    @endif
                </a>
            </div>
        </div>

        <style>
            .lang-switcher { position: relative; }

            .lang-btn {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                padding: 6px 12px 6px 8px;
                background: #ffffff;
                border: 1.5px solid #e2e8f0;
                border-radius: 50px;
                cursor: pointer;
                font-size: 13px;
                font-weight: 600;
                color: #1e293b;
                transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
                box-shadow: 0 1px 4px rgba(0,0,0,0.07);
                white-space: nowrap;
            }
            .lang-btn:hover {
                border-color: #6366f1;
                background: #f5f3ff;
                box-shadow: 0 0 0 3px rgba(99,102,241,0.12);
            }
            .lang-flag-img {
                border-radius: 3px;
                object-fit: cover;
                display: block;
                box-shadow: 0 0 0 1px rgba(0,0,0,0.1);
            }
            .lang-chevron {
                width: 10px;
                height: 10px;
                color: #94a3b8;
                transition: transform 0.2s ease;
                flex-shrink: 0;
            }
            .lang-switcher.open .lang-chevron {
                transform: rotate(180deg);
            }

            /* Dropdown */
            .lang-dropdown {
                display: none;
                position: absolute;
                top: calc(100% + 10px);
                right: 0;
                width: 200px;
                background: #ffffff;
                border: 1px solid #e5e7eb;
                border-radius: 14px;
                box-shadow: 0 8px 32px rgba(0,0,0,0.13), 0 2px 8px rgba(0,0,0,0.06);
                z-index: 9999;
                overflow: hidden;
            }
            .lang-switcher.open .lang-dropdown {
                display: block;
                animation: langFadeIn 0.16s ease;
            }
            @keyframes langFadeIn {
                from { opacity: 0; transform: translateY(-6px) scale(0.98); }
                to   { opacity: 1; transform: translateY(0) scale(1); }
            }

            .lang-dropdown-header {
                display: flex;
                align-items: center;
                gap: 6px;
                padding: 11px 14px 8px;
                font-size: 10px;
                font-weight: 700;
                text-transform: uppercase;
                letter-spacing: 0.1em;
                color: #94a3b8;
            }
            .lang-dropdown-header svg { flex-shrink: 0; }

            .lang-option {
                display: flex;
                align-items: center;
                gap: 11px;
                padding: 10px 14px;
                text-decoration: none !important;
                color: #374151;
                transition: background 0.15s;
                border-top: 1px solid #f1f5f9;
                position: relative;
            }
            .lang-option:hover {
                background: #f5f3ff;
                color: #4f46e5;
                text-decoration: none !important;
            }
            .lang-option.active {
                background: #eef2ff;
                color: #4338ca;
            }

            .lang-flag-wrap {
                width: 32px;
                height: 24px;
                border-radius: 5px;
                overflow: hidden;
                flex-shrink: 0;
                box-shadow: 0 0 0 1px rgba(0,0,0,0.1);
                display: flex;
                align-items: center;
                justify-content: center;
                background: #f3f4f6;
            }
            .lang-flag-img-lg {
                width: 100%;
                height: 100%;
                object-fit: cover;
                display: block;
            }

            .lang-option-text {
                display: flex;
                flex-direction: column;
                gap: 1px;
                flex: 1;
                min-width: 0;
            }
            .lang-name {
                font-size: 13px;
                font-weight: 600;
                line-height: 1.2;
            }
            .lang-native {
                font-size: 11px;
                color: #94a3b8;
                line-height: 1.2;
            }
            .lang-option.active .lang-native { color: #818cf8; }

            .lang-active-dot {
                width: 7px;
                height: 7px;
                border-radius: 50%;
                background: #6366f1;
                flex-shrink: 0;
                box-shadow: 0 0 0 2px rgba(99,102,241,0.2);
            }
        </style>

        <script>
            (function () {
                var switcher = document.getElementById('langSwitcher');
                var btn = document.getElementById('langBtn');
                var dropdown = document.getElementById('langDropdown');

                btn.addEventListener('click', function (e) {
                    e.stopPropagation();
                    switcher.classList.toggle('open');
                });
                document.addEventListener('click', function () {
                    switcher.classList.remove('open');
                });
                dropdown.addEventListener('click', function (e) {
                    e.stopPropagation();
                });
            })();
        </script>
        @endif

        <div class="dropdown d-flex profile-1">
            <a href="{{ route('admin.dashboard') }}" data-bs-toggle="dropdown"
                class="leading-none nav-link pe-0 d-flex justify-content-start animate">
                <img src="{{ asset('images/logo.png') }}" alt="profile-user" class="avatar profile-user brround cover-image">
                <div class="p-1 text-center d-flex d-lg-none-max">
                    <h6 class="mb-0 ms-1" id="profile-heading">
                        {{ auth()->user()->name }}
                        <i class="user-angle ms-1 fa fa-angle-down "></i>
                    </h6>
                </div>
            </a>

            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow dropdown">
                <a href="{{ route('admin.changePassword') }}" class="dropdown-item">
                    <i class="fa fa-lock me-3"></i>
                    {{ __('portal.change_password') }}
                </a>
                <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out me-3"></i>
                    {{ __('portal.logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
</div>
