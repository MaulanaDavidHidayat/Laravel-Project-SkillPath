<header class="navbar">
    <div class="container navbar-inner">
        <a href="{{ url('/') }}" class="logo">
            <span class="logo-mark">
                <img src="{{ asset('images/skillpath-icon.svg') }}" alt="SkillPath">
            </span>
            <span class="logo-name">SkillPath</span>
        </a>

        <nav class="nav-links">
            <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">
                <span>Beranda</span>
            </a>

            <a href="{{ route('skills.index') }}" class="{{ request()->routeIs('skills.*') || request()->routeIs('lessons.*') ? 'active' : '' }}">
                <span>Skills</span>
            </a>

            <a href="{{ route('roadmap') }}" class="{{ request()->routeIs('roadmap') ? 'active' : '' }}">
                <span>Roadmap</span>
            </a>

            <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">
                <span>Tentang</span>
            </a>
        </nav>

        <div class="nav-actions">
            @auth
                <a href="{{ route('dashboard') }}" class="dashboard-nav-button">
                    <span class="dashboard-nav-icon">⌂</span>

                    <span class="dashboard-nav-text">
                        <small>MY SPACE</small>
                        Dashboard
                    </span>

                    <span class="dashboard-nav-arrow">↗</span>
                </a>

                <form method="POST" action="{{ route('logout') }}" class="nav-logout-form">
                    @csrf

                    <button type="submit" class="nav-register">
                        Keluar
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="nav-login">
                    Masuk
                </a>

                <a href="{{ route('register') }}" class="nav-register">
                    Daftar
                </a>
            @endauth
        </div>
    </div>
</header>