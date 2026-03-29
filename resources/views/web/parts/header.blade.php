<header class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Krishna Niswarth Seva Trust Logo">
        </a>

        {{-- Desktop nav --}}
        <div class="collapse navbar-collapse d-none d-lg-flex" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                {{-- Language toggle — before first link --}}
                <li class="nav-item me-1">
                    <div class="lang-toggle">
                        <a href="{{ route('lang.switch', 'en') }}"
                           class="lang-toggle-btn {{ app()->getLocale() == 'en' ? 'active' : '' }}">
                            ENGLISH
                        </a>
                        <span class="lang-toggle-divider"></span>
                        <a href="{{ route('lang.switch', 'gu') }}"
                           class="lang-toggle-btn {{ app()->getLocale() == 'gu' ? 'active' : '' }}">
                            ગુજરાતી
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (Route::currentRouteName() == 'index') ? 'active fw-semibold' : '' }}"
                        href="{{ route('index') }}">
                        {{ @trans('messages.home') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (Route::currentRouteName() == 'about') ? 'active fw-semibold' : '' }}"
                        href="{{ route('about') }}">
                        {{ @trans('messages.about_us') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (Route::currentRouteName() == 'contact') ? 'active fw-semibold' : '' }}"
                        href="{{ route('contact') }}">
                        {{ @trans('messages.contact_us') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (Route::currentRouteName() == 'impact') ? 'active fw-semibold' : '' }}"
                        href="{{ route('impact') }}">
                        {{ @trans('messages.impact') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (Route::currentRouteName() == 'login') ? 'active' : '' }}"
                        href="{{ route('login') }}">
                        {{ @trans('messages.only_for_trust') }}
                    </a>
                </li>
            </ul>
        </div>

        {{-- Mobile: lang toggle + hamburger --}}
        <div class="d-flex d-lg-none align-items-center gap-2">
            <div class="lang-toggle lang-toggle--sm">
                <a href="{{ route('lang.switch', 'en') }}"
                   class="lang-toggle-btn {{ app()->getLocale() == 'en' ? 'active' : '' }}">
                    ENG
                </a>
                <span class="lang-toggle-divider"></span>
                <a href="{{ route('lang.switch', 'gu') }}"
                   class="lang-toggle-btn {{ app()->getLocale() == 'gu' ? 'active' : '' }}">
                    ગુજ
                </a>
            </div>
            <button class="navbar-toggler" type="button" id="mobileNavToggler" aria-label="Open navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
</header>

{{-- Mobile fullscreen side drawer --}}
<div class="mobile-nav-overlay d-lg-none" id="mobileNavOverlay"></div>
<div class="mobile-nav-drawer d-lg-none" id="mobileNavDrawer">
    <div class="mobile-nav-header">
        <a class="navbar-brand" href="{{ route('index') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Krishna Niswarth Seva Trust Logo">
        </a>
        <button class="mobile-nav-close" id="mobileNavClose" aria-label="Close navigation">
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>
    </div>
    <ul class="mobile-nav-links">
        <li>
            <a class="{{ (Route::currentRouteName() == 'index') ? 'active' : '' }}"
                href="{{ route('index') }}">
                {{ @trans('messages.home') }}
            </a>
        </li>
        <li>
            <a class="{{ (Route::currentRouteName() == 'about') ? 'active' : '' }}"
                href="{{ route('about') }}">
                {{ @trans('messages.about_us') }}
            </a>
        </li>
        <li>
            <a class="{{ (Route::currentRouteName() == 'contact') ? 'active' : '' }}"
                href="{{ route('contact') }}">
                {{ @trans('messages.contact_us') }}
            </a>
        </li>
        <li>
            <a class="{{ (Route::currentRouteName() == 'impact') ? 'active' : '' }}"
                href="{{ route('impact') }}">
                {{ @trans('messages.impact') }}
            </a>
        </li>
        <li class="mobile-nav-portal">
            <a class="{{ (Route::currentRouteName() == 'login') ? 'active' : '' }}"
                href="{{ route('login') }}">
                {{ @trans('messages.only_for_trust') }}
            </a>
        </li>
    </ul>
</div>
