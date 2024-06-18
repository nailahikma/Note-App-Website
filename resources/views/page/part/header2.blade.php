<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-2 mb-5 px-3">
        <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-warning text-decoration-none fw-bold fs-3">
            Simpleé
        </a>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="/" class="nav-link px-2 link-warning">Home</a></li>
            <li><a href="{{ route('notes.index') }}" class="nav-link px-2 link-warning">Notes</a></li>
            <li><a href="{{ route('contact') }}" class="nav-link px-2 link-warning">Contact</a></li>
            <li><a href="{{ route('about') }}" class="nav-link px-2 link-warning">About</a></li>
        </ul>

        <div class="col-md-3 text-end">
            <a type="button" class="btn btn-outline-secondary" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
</header>