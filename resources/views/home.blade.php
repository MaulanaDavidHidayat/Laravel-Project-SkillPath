<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkillPath - Jalur Pengembangan Skill</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/skillpath-icon.svg') }}">
</head>
<body>
    @php
        $learningTotal = $learningPaths->sum('totalLessons');
        $learningCompleted = $learningPaths->sum('completedLessons');
        $learningProgress = $learningTotal > 0
            ? round(($learningCompleted / $learningTotal) * 100)
            : 0;
    @endphp

    @include('components.navbar')

    <main>
        <section class="home-hero">
            <div class="container home-hero-grid">
                <div class="home-hero-content">
                    <div class="home-badge">
                        <span>✦</span>
                        PLATFORM PENGEMBANGAN SKILL
                    </div>

                    <h1>
                        Temukan skill.
                        <span>Bangun kemampuanmu.</span>
                    </h1>

                    <p>
                        SkillPath membantu kamu mempelajari skill digital
                        melalui roadmap yang terarah, lesson bertahap,
                        dan progress belajar yang mudah dipantau.
                    </p>

                    <div class="home-hero-actions">
                        <a href="{{ route('skills.index') }}" class="hero-primary-button">
                            Mulai Belajar
                            <span>→</span>
                        </a>

                        <a href="{{ route('skills.index') }}" class="hero-secondary-button">
                            Jelajahi Skills
                        </a>
                    </div>

                    <div class="home-hero-note">
                        <span>✓</span>
                        Belajar sesuai kemampuan dan tujuanmu
                    </div>
                </div>

                <div class="home-hero-visual">
                    <div class="hero-orbit orbit-one"></div>
                    <div class="hero-orbit orbit-two"></div>

                    <div class="hero-learning-card">
                        <div class="learning-card-top">
                            <div>
                                <span class="mini-label">YOUR LEARNING JOURNEY</span>
                                <h3>Learning Path</h3>
                            </div>

                            <div class="learning-icon">
                                ✦
                            </div>
                        </div>

                        <div class="journey-progress">
                            <div class="journey-progress-top">
                                <span>Progress keseluruhan</span>
                                <strong>{{ $learningProgress }}%</strong>
                            </div>

                            <div class="journey-progress-bar">
                                <div style="width: {{ $learningProgress }}%;"></div>
                            </div>

                            <small>
                                {{ $learningCompleted }} / {{ $learningTotal }} lesson selesai
                            </small>
                        </div>

                        <div class="journey-category-list">
                            @foreach ($learningPaths as $index => $path)
                                <a
                                    href="{{ route('skills.index') }}"
                                    class="journey-step {{ $path['completedLessons'] > 0 ? 'active' : '' }} {{ $path['status'] === 'Selesai' ? 'completed' : '' }}"
                                >
                                    <div class="journey-number">
                                        @if ($path['status'] === 'Selesai')
                                            ✓
                                        @else
                                            {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                        @endif
                                    </div>

                                    <div class="journey-step-content">
                                        <strong>{{ $path['category'] }}</strong>

                                        <span>
                                            @if ($path['status'] === 'Selesai')
                                                Selesai
                                            @elseif ($path['status'] === 'Sedang dipelajari')
                                                Sedang dipelajari
                                            @elseif ($path['status'] === 'Belum dimulai')
                                                Belum dimulai
                                            @else
                                                Belum tersedia
                                            @endif
                                        </span>

                                        <small>
                                            {{ $path['completedLessons'] }}/{{ $path['totalLessons'] }} lesson
                                        </small>
                                    </div>

                                    @if ($path['completedLessons'] > 0)
                                        <b>→</b>
                                    @endif
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="home-stats">
            <div class="container home-stats-grid">
                <div>
                    <strong>{{ $skillCount }}</strong>
                    <span>Skill tersedia</span>
                </div>

                <div>
                    <strong>{{ $lessonCount }}+</strong>
                    <span>Lesson pembelajaran</span>
                </div>

                <div>
                    <strong>{{ $learningPaths->count() }}</strong>
                    <span>Learning path</span>
                </div>

                <div>
                    <strong>{{ $learningCompleted }}</strong>
                    <span>Lesson selesai</span>
                </div>
            </div>
        </section>

        <section class="home-skills">
            <div class="container">
                <div class="home-section-heading">
                    <div>
                        <span class="section-kicker">EXPLORE SKILLS</span>

                        <h2>
                            Mulai dari skill
                            <span>yang ingin kamu kuasai.</span>
                        </h2>

                        <p>
                            Pilih skill yang sesuai dengan tujuan belajar
                            kamu dan mulai perjalananmu.
                        </p>
                    </div>

                    <a href="{{ route('skills.index') }}" class="section-link">
                        Lihat semua skills →
                    </a>
                </div>

                <div class="home-skill-grid">
                    @forelse ($skills as $skill)
                        <a
                            href="{{ route('skills.show', $skill->slug) }}"
                            class="home-skill-card"
                        >
                            <div class="home-skill-icon">
                                @if ($skill->image)
                                    <img
                                        src="{{ asset('images/skills/' . $skill->image) }}"
                                        alt="{{ $skill->name }}"
                                    >
                                @else
                                    {{ strtoupper(substr($skill->name, 0, 1)) }}
                                @endif
                            </div>

                            <div class="home-skill-info">
                                <div class="home-skill-meta">
                                    <span>{{ $skill->level }}</span>
                                    <small>{{ $skill->category }}</small>
                                </div>

                                <h3>{{ $skill->name }}</h3>

                                <p>
                                    {{ $skill->description }}
                                </p>

                                <div class="home-skill-footer">
                                    <span>
                                        {{ $skill->lessons->count() }} lesson
                                    </span>

                                    <strong>Mulai →</strong>
                                </div>
                            </div>
                        </a>
                    @empty
                        <div class="empty-state">
                            Belum ada skill tersedia.
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

        <section class="home-roadmap-preview">
            <div class="container">
                <div class="roadmap-preview-card">
                    <div class="roadmap-preview-content">
                        <span class="section-kicker">
                            LEARNING ROADMAP
                        </span>

                        <h2>
                            Belajar tidak harus
                            <span>membingungkan.</span>
                        </h2>

                        <p>
                            SkillPath menyusun pembelajaran menjadi beberapa
                            langkah sehingga kamu tahu apa yang harus
                            dipelajari selanjutnya.
                        </p>

                        <a
                            href="{{ route('skills.index') }}"
                            class="roadmap-preview-button"
                        >
                            Lihat Learning Path
                            <span>→</span>
                        </a>
                    </div>

                    <div class="roadmap-preview-steps">
                        <div class="preview-step done">
                            <div>01</div>
                            <span>Pilih Skill</span>
                        </div>

                        <div class="preview-line"></div>

                        <div class="preview-step active">
                            <div>02</div>
                            <span>Pelajari Lesson</span>
                        </div>

                        <div class="preview-line"></div>

                        <div class="preview-step">
                            <div>03</div>
                            <span>Selesaikan</span>
                        </div>

                        <div class="preview-line"></div>

                        <div class="preview-step">
                            <div>04</div>
                            <span>Pantau Progress</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="home-how">
            <div class="container">
                <div class="home-section-heading centered">
                    <div>
                        <span class="section-kicker">HOW SKILLPATH WORKS</span>

                        <h2>
                            Satu platform untuk
                            <span>perjalanan belajarmu.</span>
                        </h2>

                        <p>
                            Mulai dari memilih skill sampai melihat
                            perkembangan belajar kamu.
                        </p>
                    </div>
                </div>

                <div class="home-process-grid">
                    <div class="process-card">
                        <div class="process-number">01</div>
                        <span class="process-icon">◈</span>

                        <h3>Pilih Skill</h3>

                        <p>
                            Tentukan skill digital yang ingin kamu
                            pelajari sesuai tujuanmu.
                        </p>
                    </div>

                    <div class="process-card">
                        <div class="process-number">02</div>
                        <span class="process-icon">◇</span>

                        <h3>Ikuti Roadmap</h3>

                        <p>
                            Pelajari materi secara bertahap dari dasar
                            hingga materi berikutnya.
                        </p>
                    </div>

                    <div class="process-card">
                        <div class="process-number">03</div>
                        <span class="process-icon">✓</span>

                        <h3>Selesaikan Lesson</h3>

                        <p>
                            Tandai materi yang sudah selesai dan
                            lanjutkan perjalanan belajar.
                        </p>
                    </div>

                    <div class="process-card">
                        <div class="process-number">04</div>
                        <span class="process-icon">↗</span>

                        <h3>Pantau Progress</h3>

                        <p>
                            Lihat perkembangan belajar melalui dashboard
                            pribadi kamu.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="home-about-preview">
            <div class="container">
                <div class="about-preview-card">
                    <div class="about-preview-icon">
                        <img
                            src="{{ asset('images/skillpath-icon.svg') }}"
                            alt="SkillPath"
                        >
                    </div>

                    <div>
                        <span class="section-kicker">
                            ABOUT SKILLPATH
                        </span>

                        <h2>
                            Bukan hanya belajar.
                            <span>Bangun perjalanan skill kamu.</span>
                        </h2>

                        <p>
                            SkillPath dirancang untuk membantu pelajar
                            dan siapa saja yang ingin mengembangkan
                            kemampuan digital secara lebih terarah.
                        </p>
                    </div>

                    <a href="{{ route('about') }}" class="about-preview-link">
                        Tentang SkillPath →
                    </a>
                </div>
            </div>
        </section>

        <section class="home-cta">
            <div class="container">
                <div class="home-cta-card">
                    <span class="section-kicker">
                        READY TO START?
                    </span>

                    <h2>
                        Mulai perjalanan skill
                        <span>kamu hari ini.</span>
                    </h2>

                    <p>
                        Pilih skill pertama kamu dan mulai belajar
                        selangkah demi selangkah bersama SkillPath.
                    </p>

                    <a
                        href="{{ route('skills.index') }}"
                        class="hero-primary-button"
                    >
                        Mulai Belajar
                        <span>→</span>
                    </a>
                </div>
            </div>
        </section>
    </main>

    <footer class="home-footer">
        <div class="container home-footer-inner">
            <div>
                <a href="{{ url('/') }}" class="footer-logo">
                    <img
                        src="{{ asset('images/skillpath-icon.svg') }}"
                        alt="SkillPath"
                    >
                    <strong>SkillPath</strong>
                </a>

                <p>
                    Platform pengembangan skill digital
                    untuk perjalanan belajar yang lebih terarah.
                </p>
            </div>

            <div class="footer-links">
                <a href="{{ url('/') }}">Beranda</a>
                <a href="{{ route('skills.index') }}">Skills</a>
                <a href="{{ route('roadmap') }}">Roadmap</a>
                <a href="{{ route('about') }}">Tentang</a>
            </div>

            <span class="footer-copy">
                © {{ date('Y') }} SkillPath
            </span>
        </div>
    </footer>
</body>
</html>