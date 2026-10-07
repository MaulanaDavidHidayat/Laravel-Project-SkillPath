
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi OTP - SkillPath</title>
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
                <span class="auth-kicker">EMAIL VERIFICATION</span>
                <h1>Periksa emailmu ✉</h1>
                <p>Masukkan kode OTP 6 digit yang dikirim ke email akunmu. Kode berlaku selama 5 menit.</p>
            </div>

            @if (session('status'))
                <div class="otp-notice">
                    <div class="otp-notice-icon">✉</div>
                    <div>
                        <strong>Kode OTP sudah dikirim</strong>
                        <p>
                            Silakan periksa <b>Inbox</b> email kamu. Jika kode belum terlihat,
                            cek juga folder <b>Spam</b> karena email OTP terkadang masuk ke sana.
                        </p>
                    </div>
                </div>
            @endif

            @if ($errors->any())
                <div class="auth-alert">
                    <strong>Verifikasi belum berhasil</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('password.otp.verify') }}" class="auth-form">
                @csrf
                <div class="auth-field">
                    <label for="otp">Kode OTP</label>
                    <div class="input-wrapper">
                        <span class="input-icon">#</span>
                        <input
                            type="text"
                            id="otp"
                            name="otp"
                            inputmode="numeric"
                            pattern="[0-9]{6}"
                            maxlength="6"
                            placeholder="Masukkan 6 digit kode"
                            autocomplete="one-time-code"
                            required
                            autofocus
                        >
                    </div>
                </div>

                <button type="submit" class="auth-submit">
                    Verifikasi OTP <span>→</span>
                </button>
            </form>

            <p class="auth-switch" style="margin-top: 24px;">
                Kode tidak diterima?
                <a href="{{ route('password.request') }}">Minta kode baru</a>
            </p>
        </section>

        <aside class="auth-showcase">
            <div class="showcase-content">
                <span class="showcase-label">ONE-TIME PASSWORD</span>
                <h2>Verifikasi dahulu. <span>Lanjutkan dengan aman.</span></h2>
                <p>Kode ini hanya untuk memverifikasi permintaan reset password milikmu. Jangan bagikan kepada siapa pun.</p>
                <div class="showcase-list">
                    <div><strong>6</strong><span>Digit kode verifikasi</span></div>
                    <div><strong>5m</strong><span>Masa berlaku kode</span></div>
                    <div><strong>1×</strong><span>Hanya dapat digunakan sekali</span></div>
                </div>
            </div>
        </aside>
    </main>
</body>
</html>
