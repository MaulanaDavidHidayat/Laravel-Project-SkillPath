<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - SkillPath</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/skillpath-icon.svg') }}">
</head>
<body class="auth-page">
    <main class="auth-container">
        <section class="auth-card">
            <a href="{{ url('/') }}" class="auth-logo">
                <img
                    src="{{ asset('images/skillpath-icon.svg') }}"
                    alt="SkillPath"
                >
                <span>SkillPath</span>
            </a>

            <div class="auth-heading">
                <span class="auth-kicker">WELCOME BACK</span>
                <h1>Selamat datang kembali 👋</h1>
                <p>
                    Masuk untuk melanjutkan perjalanan belajar kamu.
                </p>
            </div>

            @if ($errors->any())
                <div class="auth-alert">
                    <strong>Login gagal</strong>

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="auth-success">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ url('/login') }}" class="auth-form">
                @csrf

                <div class="auth-field">
                    <label for="email">Email</label>

                    <div class="input-wrapper">
                        <span class="input-icon">@</span>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="nama@email.com"
                            autocomplete="email"
                            required
                        >
                    </div>
                </div>

                <div class="auth-field">
                    <div class="field-label-row">
                        <label for="password">Password</label>
                        <a href="{{ route('password.request') }}" class="forgot-password-link">
                            Lupa password?
                        </a>
                    </div>

                    <div class="input-wrapper password-wrapper">
                        <span class="input-icon">●</span>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Masukkan password"
                            autocomplete="current-password"
                            required
                        >

                        <button
                            type="button"
                            class="password-toggle"
                            onclick="togglePassword('password', this)"
                            aria-label="Tampilkan password"
                        >
                            👁
                        </button>
                    </div>
                </div>

                <button type="submit" class="auth-submit">
                    Masuk ke SkillPath
                    <span>→</span>
                </button>
            </form>

            <div class="auth-divider">
                <span>atau</span>
            </div>

            <p class="auth-switch">
                Belum punya akun?
                <a href="{{ route('register') }}">
                    Daftar sekarang
                </a>
            </p>

            <a href="{{ url('/') }}" class="auth-back">
                ← Kembali ke beranda
            </a>
        </section>

        <aside class="auth-showcase">
            <div class="showcase-content">
                <span class="showcase-label">YOUR LEARNING JOURNEY</span>

                <h2>
                    Bangun skill kamu.
                    <span>Selangkah demi selangkah.</span>
                </h2>

                <p>
                    Pelajari berbagai skill digital melalui roadmap
                    pembelajaran yang terarah dan mudah diikuti.
                </p>

                <div class="showcase-list">
                    <div>
                        <strong>01</strong>
                        <span>Pilih skill yang ingin dipelajari</span>
                    </div>

                    <div>
                        <strong>02</strong>
                        <span>Ikuti lesson secara bertahap</span>
                    </div>

                    <div>
                        <strong>03</strong>
                        <span>Pantau progress belajar kamu</span>
                    </div>
                </div>
            </div>
        </aside>
    </main>

    <script>
        function togglePassword(inputId, button) {
            const input = document.getElementById(inputId);

            if (input.type === 'password') {
                input.type = 'text';
                button.textContent = '🙈';
                button.setAttribute('aria-label', 'Sembunyikan password');
            } else {
                input.type = 'password';
                button.textContent = '👁';
                button.setAttribute('aria-label', 'Tampilkan password');
            }
        }
    </script>
</body>
</html>