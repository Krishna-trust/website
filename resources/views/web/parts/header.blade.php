  <!-- Header -->
  <header class="navbar navbar-expand-lg navbar-light sticky-top">
      <div class="container">
          <img src="images/logo.png" alt="Logo" height="50px" class="me-2">
          <a class="navbar-brand fw-bold text-primary " href="{{ route('index') }}">{{ @trans('messages.trust_name') }}</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ms-auto">
                  <li class="nav-item">
                      <a class="nav-link {{ (Route::currentRouteName() == 'index') ? 'active fw-bold' : '' }}" href="{{ route('index') }}">
                          {{ @trans('messages.home') }}
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link {{ (Route::currentRouteName() == 'about') ? 'active fw-bold' : '' }}" href="{{ route('about') }}">
                          {{ @trans('messages.about_us') }}
                      </a>
                  </li>
                  {{-- <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'services') ? 'active fw-bold' : '' }}" href="{{ route('services') }}">
                  {{ @trans('messages.services') }}
                  </a>
                  </li> --}}
                  <li class="nav-item">
                      <a class="nav-link {{ (Route::currentRouteName() == 'contact') ? 'active fw-bold' : '' }}" href="{{ route('contact') }}">
                          {{ @trans('messages.contact_us') }}
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link {{ (Route::currentRouteName() == 'impact') ? 'active fw-bold' : '' }}" href="{{ route('impact') }}">
                          {{ @trans('messages.impact') }}
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link btn btn-primary text-dark {{ (Route::currentRouteName() == 'login') ? 'active fw-bold' : '' }}" href="{{ route('login') }}">
                          {{ @trans('messages.only_for_trust') }}
                      </a>
                  </li>
              </ul>
          </div>
      </div>
  </header>
