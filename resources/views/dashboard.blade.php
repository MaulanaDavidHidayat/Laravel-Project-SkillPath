<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - SkillPath</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/skillpath-icon.svg') }}">
</head>
<body class="dashboard-page">
    @include('components.navbar')

    @php
        $xp = $totalXp;
        $level = max(1, floor($xp / 500) + 1);
        $currentLevelXp = $xp % 500;
        $nextLevelXp = 500;
        $levelProgress = min(100, round(($currentLevelXp / $nextLevelXp) * 100));

        $nextLessonCount = $totalLessons - $completedLessons;

        $badgeDefinitions = [
            [
                'name' => 'First Step',
                'description' => 'Selesaikan lesson pertama.',
                'icon' => '✦',
                'unlocked' => $completedLessons >= 1,
            ],
            [
                'name' => 'Learning Starter',
                'description' => 'Selesaikan 5 lesson.',
                'icon' => '◆',
                'unlocked' => $completedLessons >= 5,
            ],
            [
                'name' => 'Skill Builder',
                'description' => 'Selesaikan 10 lesson.',
                'icon' => '◇',
                'unlocked' => $completedLessons >= 10,
            ],
            [
                'name' => 'Category Explorer',
                'description' => 'Belajar dari 4 kategori.',
                'icon' => '◎',
                'unlocked' => $completedCategories >= 4,
            ],
            [
                'name' => 'Skill Finisher',
                'description' => 'Selesaikan satu skill.',
                'icon' => '✓',
                'unlocked' => $completedSkillCount >= 1,
            ],
            [
                'name' => 'Learning Master',
                'description' => 'Selesaikan seluruh lesson.',
                'icon' => '★',
                'unlocked' => $totalLessons > 0 && $completedLessons >= $totalLessons,
            ],
        ];
    @endphp

    <main class="dashboard-main">
        <div class="container dashboard-container">

            <section class="dashboard-command">
                <div class="dashboard-command-content">
                    <div class="dashboard-command-copy">
                        <span class="dashboard-eyebrow">MY LEARNING SPACE</span>
                        <h1>Halo, {{ auth()->user()->name }} <span>👋</span></h1>
                        <p>
                            Selamat datang kembali. Lanjutkan perjalananmu,
                            bangun skill baru, dan naikkan levelmu sedikit demi sedikit.
                        </p>

                        <div class="dashboard-command-actions">
                            <a href="{{ route('skills.index') }}" class="dashboard-main-button">
                                Lanjut Belajar
                                <span>→</span>
                            </a>
                            <a href="{{ route('skills.index') }}" class="dashboard-ghost-button">
                                Jelajahi Skills
                            </a>
                        </div>
                    </div>

                    <div class="dashboard-level-card">
                        <div class="dashboard-level-glow"></div>
                        <div class="dashboard-level-top">
                            <div>
                                <span>YOUR LEVEL</span>
                                <strong>LEVEL {{ str_pad($level, 2, '0', STR_PAD_LEFT) }}</strong>
                            </div>
                            <div class="dashboard-level-icon">✦</div>
                        </div>

                        <div class="dashboard-level-xp">
                            <strong>{{ number_format($xp) }}</strong>
                            <span>XP</span>
                        </div>

                        <div class="dashboard-level-progress">
                            <div style="width: {{ $levelProgress }}%;"></div>
                        </div>

                        <div class="dashboard-level-footer">
                            <span>{{ $currentLevelXp }} / {{ $nextLevelXp }} XP</span>
                            <strong>{{ $levelProgress }}%</strong>
                        </div>
                    </div>
                </div>

                <div class="dashboard-command-orbit dashboard-orbit-a"></div>
                <div class="dashboard-command-orbit dashboard-orbit-b"></div>
                <div class="dashboard-command-orbit dashboard-orbit-c"></div>
            </section>

            <section class="dashboard-metrics">
                <div class="dashboard-metric-card metric-progress">
                    <div class="dashboard-metric-icon">↗</div>
                    <div>
                        <span>OVERALL PROGRESS</span>
                        <strong>{{ $progressPercentage }}%</strong>
                        <small>Perjalanan belajar</small>
                    </div>
                </div>

                <div class="dashboard-metric-card metric-lessons">
                    <div class="dashboard-metric-icon">✓</div>
                    <div>
                        <span>LESSON SELESAI</span>
                        <strong>{{ $completedLessons }}<small>/{{ $totalLessons }}</small></strong>
                        <small>{{ $nextLessonCount }} lesson tersisa</small>
                    </div>
                </div>

                <div class="dashboard-metric-card metric-xp">
                    <div class="dashboard-metric-icon">✦</div>
                    <div>
                        <span>XP TERKUMPUL</span>
                        <strong>{{ number_format($xp) }}</strong>
                        <small>Pengalaman belajar</small>
                    </div>
                </div>

                <div class="dashboard-metric-card metric-badge">
                    <div class="dashboard-metric-icon">◆</div>
                    <div>
                        <span>ACHIEVEMENTS</span>
                        <strong>{{ $badgeCount }}<small>/6</small></strong>
                        <small>Badge terbuka</small>
                    </div>
                </div>
            </section>

            <section class="dashboard-focus-grid">
                <div class="dashboard-journey-card">
                    <div class="dashboard-card-heading">
                        <div>
                            <span class="dashboard-eyebrow">LEARNING JOURNEY</span>
                            <h2>Perjalanan belajarmu</h2>
                            <p>Setiap lesson membawamu satu langkah lebih dekat ke level berikutnya.</p>
                        </div>
                        <span class="dashboard-mini-status">{{ $progressPercentage }}%</span>
                    </div>

                    <div class="dashboard-journey-content">
                        <div class="dashboard-progress-visual">
                            <div class="dashboard-progress-ring-large" style="--progress: {{ $progressPercentage }}%;">
                                <div>
                                    <strong>{{ $progressPercentage }}%</strong>
                                    <span>COMPLETED</span>
                                </div>
                            </div>

                            <div class="dashboard-progress-summary">
                                <strong>{{ $completedLessons }} <span>/ {{ $totalLessons }}</span></strong>
                                <p>lesson telah kamu selesaikan</p>

                                <div class="dashboard-linear-progress">
                                    <div style="width: {{ $progressPercentage }}%;"></div>
                                </div>

                                <div class="dashboard-progress-meta">
                                    <span>Progress keseluruhan</span>
                                    <strong>{{ $progressPercentage }}%</strong>
                                </div>
                            </div>
                        </div>

                        <div class="dashboard-journey-stats">
                            <div>
                                <span>SKILL SELESAI</span>
                                <strong>{{ $completedSkillCount }}</strong>
                            </div>
                            <div>
                                <span>KATEGORI</span>
                                <strong>{{ $completedCategories }}</strong>
                            </div>
                            <div>
                                <span>XP</span>
                                <strong>{{ number_format($xp) }}</strong>
                            </div>
                        </div>
                    </div>
                </div>

                <aside class="dashboard-continue-card">
                    <div class="dashboard-continue-top">
                        <span class="dashboard-eyebrow">CONTINUE LEARNING</span>
                        <div class="dashboard-live-dot"></div>
                    </div>

                    <div class="dashboard-continue-icon">
                        <img src="{{ asset('images/skillpath-icon.svg') }}" alt="SkillPath">
                    </div>

                    <span class="dashboard-continue-label">
                        {{ $completedLessons > 0 ? 'NEXT STEP' : 'START HERE' }}
                    </span>

                    <h2>
                        {{ $completedLessons > 0 ? 'Lanjutkan perjalananmu' : 'Mulai perjalananmu' }}
                    </h2>

                    <p>
                        {{ $completedLessons > 0
                            ? 'Pilih lesson berikutnya dan terus tingkatkan skill kamu.'
                            : 'Pilih skill pertama dan mulai membangun kemampuanmu.' }}
                    </p>

                    <a href="{{ route('skills.index') }}" class="dashboard-continue-button">
                        {{ $completedLessons > 0 ? 'Continue Learning' : 'Mulai Belajar' }}
                        <span>→</span>
                    </a>
                </aside>
            </section>

            <section class="dashboard-roadmap-card">
                <div class="dashboard-card-heading">
                    <div>
                        <span class="dashboard-eyebrow">LEARNING ROADMAP</span>
                        <h2>Bangun skill secara bertahap</h2>
                        <p>Jelajahi jalur belajar SkillPath dan kembangkan kemampuanmu.</p>
                    </div>

                    <a href="{{ route('skills.index') }}" class="dashboard-small-link">
                        Semua Skills →
                    </a>
                </div>

                <div class="dashboard-roadmap">
                    <div class="dashboard-roadmap-line">
                        <div style="width: {{ $progressPercentage }}%;"></div>
                    </div>

                    <div class="dashboard-roadmap-step {{ $completedLessons >= 1 ? 'is-active' : '' }}">
                        <div class="dashboard-roadmap-node">
                            {{ $completedLessons >= 1 ? '✓' : '01' }}
                        </div>
                        <span>START</span>
                        <strong>Mulai Belajar</strong>
                        <small>Bangun fondasi</small>
                    </div>

                    <div class="dashboard-roadmap-step {{ $completedLessons >= 5 ? 'is-active' : '' }}">
                        <div class="dashboard-roadmap-node">
                            {{ $completedLessons >= 5 ? '✓' : '02' }}
                        </div>
                        <span>BUILD</span>
                        <strong>Bangun Skill</strong>
                        <small>Perkuat kemampuan</small>
                    </div>

                    <div class="dashboard-roadmap-step {{ $completedLessons >= 10 ? 'is-active' : '' }}">
                        <div class="dashboard-roadmap-node">
                            {{ $completedLessons >= 10 ? '✓' : '03' }}
                        </div>
                        <span>CREATE</span>
                        <strong>Buat Project</strong>
                        <small>Praktikkan skill</small>
                    </div>

                    <div class="dashboard-roadmap-step {{ $progressPercentage >= 100 ? 'is-active' : '' }}">
                        <div class="dashboard-roadmap-node">
                            {{ $progressPercentage >= 100 ? '★' : '04' }}
                        </div>
                        <span>MASTER</span>
                        <strong>Level Up</strong>
                        <small>Kuasai perjalanan</small>
                    </div>
                </div>
            </section>

            <section class="dashboard-achievements-card">
                <div class="dashboard-card-heading">
                    <div>
                        <span class="dashboard-eyebrow">ACHIEVEMENTS</span>
                        <h2>Pencapaian kamu</h2>
                        <p>Terus belajar untuk membuka semua achievement.</p>
                    </div>

                    <div class="dashboard-achievement-count">
                        <strong>{{ $badgeCount }}</strong>
                        <span>/ 6 UNLOCKED</span>
                    </div>
                </div>

                <div class="dashboard-badge-grid">
                    @foreach ($badgeDefinitions as $badge)
                        <div class="dashboard-badge {{ $badge['unlocked'] ? 'is-unlocked' : 'is-locked' }}">
                            <div class="dashboard-badge-symbol">
                                {{ $badge['unlocked'] ? $badge['icon'] : '🔒' }}
                            </div>

                            <div class="dashboard-badge-info">
                                <span>{{ $badge['unlocked'] ? 'UNLOCKED' : 'LOCKED' }}</span>
                                <h3>{{ $badge['name'] }}</h3>
                                <p>{{ $badge['description'] }}</p>
                            </div>

                            @if ($badge['unlocked'])
                                <div class="dashboard-badge-check">✓</div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </section>

            <section class="dashboard-category-section">
                <div class="dashboard-card-heading">
                    <div>
                        <span class="dashboard-eyebrow">SKILL PATH</span>
                        <h2>Jalur pengembangan skill</h2>
                        <p>Pilih area yang ingin kamu kembangkan selanjutnya.</p>
                    </div>

                    <a href="{{ route('skills.index') }}" class="dashboard-small-link">
                        Explore →
                    </a>
                </div>

                <div class="dashboard-category-grid">
                    <a href="{{ route('skills.index') }}" class="dashboard-category">
                        <div class="dashboard-category-number">01</div>
                        <div class="dashboard-category-content">
                            <span>WEB DEVELOPMENT</span>
                            <h3>Bangun Website</h3>
                            <p>Pelajari teknologi untuk membuat aplikasi web modern.</p>
                        </div>
                        <div class="dashboard-category-arrow">↗</div>
                    </a>

                    <a href="{{ route('skills.index') }}" class="dashboard-category">
                        <div class="dashboard-category-number">02</div>
                        <div class="dashboard-category-content">
                            <span>PROGRAMMING</span>
                            <h3>Pelajari Coding</h3>
                            <p>Bangun dasar pemrograman dan logika coding.</p>
                        </div>
                        <div class="dashboard-category-arrow">↗</div>
                    </a>

                    <a href="{{ route('skills.index') }}" class="dashboard-category">
                        <div class="dashboard-category-number">03</div>
                        <div class="dashboard-category-content">
                            <span>DESIGN</span>
                            <h3>Kembangkan Kreativitas</h3>
                            <p>Pelajari desain dan pengalaman pengguna.</p>
                        </div>
                        <div class="dashboard-category-arrow">↗</div>
                    </a>

                    <a href="{{ route('skills.index') }}" class="dashboard-category">
                        <div class="dashboard-category-number">04</div>
                        <div class="dashboard-category-content">
                            <span>DATABASE</span>
                            <h3>Kelola Data</h3>
                            <p>Pahami database untuk aplikasi yang terstruktur.</p>
                        </div>
                        <div class="dashboard-category-arrow">↗</div>
                    </a>
                </div>
            </section>

            <section class="dashboard-final-cta">
                <div class="dashboard-final-glow"></div>

                <div>
                    <span class="dashboard-eyebrow">SKILLPATH JOURNEY</span>
                    <h2>Setiap lesson adalah satu langkah menuju versi terbaikmu.</h2>
                    <p>
                        Jangan kejar semuanya sekaligus. Konsisten belajar sedikit demi sedikit
                        dan biarkan progress kamu bertumbuh.
                    </p>
                </div>

                <a href="{{ route('skills.index') }}" class="dashboard-main-button">
                    Lanjutkan Belajar
                    <span>→</span>
                </a>
            </section>

        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const cards = document.querySelectorAll(
                '.dashboard-metric-card, .dashboard-journey-card, .dashboard-continue-card, .dashboard-roadmap-card, .dashboard-achievements-card, .dashboard-category-section, .dashboard-final-cta'
            );

            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.08
            });

            cards.forEach((card) => observer.observe(card));
        });
    </script>
</body>
</html>