<!-- Header -->
<header class="navbar">
    <div class="container-fluid align-items-center">
        <div class="d-flex gap-2 mt-2">
            <button class="navbar-toggler d-md-none" type="button" id="sidebarToggle">
                <span class="navbar-toggler-icon"></span>
            </button>
            <form class="d-flex justify-content-center mx-auto">
                <div class="input-group mb-3" style="max-width: 800px; width: 100%;">
                    <select class="form-select" aria-label="Country selection"
                        style="width: auto; min-width: 80px; flex: 0 0 auto; padding-right: 2rem;">
                        <option value="nepal" selected>🇳🇵 Nepal</option>
                        <option value="india">🇮🇳 India</option>
                        <option value="usa">🇺🇸 America</option>
                        <option value="australia">🇦🇺 Australia</option>
                    </select>
                    <input type="text" class="form-control" aria-label="Text input with dropdown button"
                        placeholder="Job title, Keyword, company" style="width: 30vw;">
                </div>
            </form>
        </div>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle"
                data-bs-toggle="dropdown">
                <img src="{{ asset('frontend/image/professional.jpeg') }}" alt="Admin"
                    class="rounded-circle" width="32" height="32" />
                <span class="ms-2 d-none d-md-inline">Admin</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li>
                    <hr class="dropdown-divider" />
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}" 
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                
            </ul>
        </div>
    </div>
</header>
