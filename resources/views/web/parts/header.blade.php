  <!-- Header -->
  <header class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container">
            <img src="images/logo1.png" alt="Logo" height="50px" class="me-2">
            <a class="navbar-brand fw-bold text-primary " href="index.html">Krishna Niswarth Seva Trust</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('index') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('services') }}">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('impact') }}">Impact</a></li>

                </ul>
            </div>
        </div>
    </header>
