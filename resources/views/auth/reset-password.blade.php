
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Baru - SkillPath</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/skillpath-icon.svg') }}">
</head>
<body class="auth-page">
    <main class="auth-container">
        <section class="auth-card">
            <a href="{{ url('/') }}" class="auth-logo">
                <img src="{{ asset('images/skillpath-icon.svg') }}" alt="SkillPath">
                <span>SkillPath</span>
            </a>

            <div class="auth-heading">
                <span class="auth-kicker">CREATE NEW PASSWORD</span>
                <h1>Buat password baru</h1>
                <p>Verifikasi berhasil. Buat password baru untuk mengamankan akunmu.</p>
            </div>

            @if ($errors->any())
                <div class="auth-alert">
                    <strong>Periksa kembali data kamu</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('password.update') }}" class="auth-form">
                @csrf

                <div class="auth-field">
                    <label for="password">Password baru</label>
                    <div class="input-wrapper password-wrapper">
                        <span class="input-icon">●</span>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Minimal 8 karakter"
                            autocomplete="new-password"
                            required
                        >
                        <button type="button" class="password-toggle" onclick="togglePassword('password', this)" aria-label="Tampilkan password">👁</button>
                    </div>
                </div>

                <div class="auth-field">
                    <label for="password_confirmation">Konfirmasi password</label>
                    <div class="input-wrapper password-wrapper">
                        <span class="input-icon">●</span>
                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            placeholder="Ulangi password baru"
                            autocomplete="new-password"
                            required
                        >
                        <button type="button" class="password-toggle" onclick="togglePassword('password_confirmation', this)" aria-label="Tampilkan password">👁</button>
                    </div>
                </div>

                <button type="submit" class="auth-submit">
                    Simpan Password Baru <span>→</span>
                </button>
            </form>
        </section>

        <aside class="auth-showcase">
            <div class="showcase-content">
                <span class="showcase-label">YOUR ACCOUNT, YOUR JOURNEY</span>
                <h2>Keamanan akunmu <span>tetap jadi prioritas.</span></h2>
                <p>Setelah password diperbarui, gunakan password baru untuk masuk dan melanjutkan pembelajaran di SkillPath.</p>
                <div class="showcase-list">
                    <div><strong>✓</strong><span>Email telah diverifikasi</span></div>
                    <div><strong>8+</strong><span>Minimal 8 karakter</span></div>
                    <div><strong>→</strong><span>Kembali melanjutkan belajar</span></div>
                </div>
            </div>
        </aside>
    </main>

    <script>
        function togglePassword(inputId, button) {
            const input = document.getElementById(inputId);
            const visible = input.type === 'password';

            input.type = visible ? 'text' : 'password';
            button.textContent = visible ? '🙈' : '👁';
            button.setAttribute(
                'aria-label',
                visible ? 'Sembunyikan password' : 'Tampilkan password'
            );
        }
    </script>
</body>
</html>
