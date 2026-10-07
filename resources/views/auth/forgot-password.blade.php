
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - SkillPath</title>
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
                <span class="auth-kicker">ACCOUNT RECOVERY</span>
                <h1>Lupa password?</h1>
                <p>Jangan khawatir. Masukkan email akunmu untuk menerima kode verifikasi.</p>
            </div>

            @if ($errors->any())
                <div class="auth-alert">
                    <strong>Belum berhasil</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="auth-form">
                @csrf
                <div class="auth-field">
                    <label for="email">Email akun</label>
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
                            autofocus
                        >
                    </div>
                </div>

                <button type="submit" class="auth-submit">
                    Kirim Kode OTP <span>→</span>
                </button>
            </form>

            <p class="auth-switch" style="margin-top: 24px;">
                Ingat password?
                <a href="{{ route('login') }}">Kembali ke login</a>
            </p>
        </section>

        <aside class="auth-showcase">
            <div class="showcase-content">
                <span class="showcase-label">SECURE ACCOUNT RECOVERY</span>
                <h2>Amankan akunmu. <span>Mulai kembali.</span></h2>
                <p>Verifikasi email untuk membuat password baru dan melanjutkan perjalanan belajar di SkillPath.</p>
                <div class="showcase-list">
                    <div><strong>01</strong><span>Masukkan email akun</span></div>
                    <div><strong>02</strong><span>Verifikasi kode OTP</span></div>
                    <div><strong>03</strong><span>Buat password baru</span></div>
                </div>
            </div>
        </aside>
    </main>
</body>
</html>
