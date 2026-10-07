<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - SkillPath</title>
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
                <span class="auth-kicker">START YOUR JOURNEY</span>
                <h1>Buat akun SkillPath ✨</h1>
                <p>
                    Mulai perjalanan kamu untuk mengembangkan skill digital.
                </p>
            </div>

            @if ($errors->any())
                <div class="auth-alert">
                    <strong>Pendaftaran gagal</strong>

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ url('/register') }}" class="auth-form">
                @csrf

                <div class="auth-field">
                    <label for="name">Nama lengkap</label>

                    <div class="input-wrapper">
                        <span class="input-icon">✦</span>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Nama kamu"
                            autocomplete="name"
                            required
                        >
                    </div>
                </div>

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
                    <label for="password">Password</label>

                    <div class="input-wrapper password-wrapper">
                        <span class="input-icon">●</span>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Buat password"
                            autocomplete="new-password"
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

                <div class="auth-field">
                    <label for="password_confirmation">
                        Konfirmasi password
                    </label>

                    <div class="input-wrapper password-wrapper">
                        <span class="input-icon">●</span>

                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            placeholder="Ulangi password"
                            autocomplete="new-password"
                            required
                        >

                        <button
                            type="button"
                            class="password-toggle"
                            onclick="togglePassword('password_confirmation', this)"
                            aria-label="Tampilkan password"
                        >
                            👁
                        </button>
                    </div>
                </div>

                <button type="submit" class="auth-submit">
                    Buat Akun
                    <span>→</span>
                </button>
            </form>

            <div class="auth-divider">
                <span>atau</span>
            </div>

            <p class="auth-switch">
                Sudah punya akun?
                <a href="{{ route('login') }}">
                    Masuk sekarang
                </a>
            </p>

            <a href="{{ url('/') }}" class="auth-back">
                ← Kembali ke beranda
            </a>
        </section>

        <aside class="auth-showcase">
            <div class="showcase-content">
                <span class="showcase-label">SKILLPATH PLATFORM</span>

                <h2>
                    Temukan jalur belajar
                    <span>yang cocok untuk kamu.</span>
                </h2>

                <p>
                    Dari programming hingga database, SkillPath membantu
                    kamu belajar dengan roadmap yang lebih terarah.
                </p>

                <div class="showcase-list">
                    <div>
                        <strong>06</strong>
                        <span>Skill digital yang tersedia</span>
                    </div>

                    <div>
                        <strong>36+</strong>
                        <span>Lesson pembelajaran</span>
                    </div>

                    <div>
                        <strong>∞</strong>
                        <span>Kesempatan untuk berkembang</span>
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