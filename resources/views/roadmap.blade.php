<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roadmap - SkillPath</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/skillpath-icon.svg') }}">
</head>
<body class="roadmap-page">
    @include('components.navbar')

    <main class="roadmap-main">
        <div class="container roadmap-container">

            <section class="roadmap-hero">
                <div class="roadmap-hero-content">
                    <span class="roadmap-eyebrow">YOUR LEARNING ROADMAP</span>

                    <h1>
                        Bangun skill.
                        <span>Ikuti jalurnya.</span>
                    </h1>

                    <p>
                        Lihat perjalanan belajar kamu dari awal hingga mahir.
                        Setiap lesson yang selesai akan memperbarui roadmap secara otomatis.
                    </p>

                    <div class="roadmap-hero-stats">
                        <div>
                            <strong>{{ $totalLessons }}</strong>
                            <span>Total Lessons</span>
                        </div>

                        <div>
                            <strong>{{ $skills->count() }}</strong>
                            <span>Skills</span>
                        </div>

                        <div>
                            <strong>{{ $progressPercentage }}%</strong>
                            <span>Progress</span>
                        </div>
                    </div>
                </div>

                <div class="roadmap-hero-visual">
                    <div class="roadmap-orbit roadmap-orbit-one"></div>
                    <div class="roadmap-orbit roadmap-orbit-two"></div>

                    <div class="roadmap-hero-center">
                        <span>PROGRESS</span>
                        <strong>{{ $progressPercentage }}%</strong>
                        <small>YOUR JOURNEY</small>
                    </div>
                </div>
            </section>

            <section class="roadmap-overview">
                <div class="roadmap-overview-card">
                    <div class="roadmap-overview-icon">✓</div>
                    <div>
                        <span>COMPLETED</span>
                        <strong>{{ $completedSkills }}</strong>
                        <small>Skill selesai</small>
                    </div>
                </div>

                <div class="roadmap-overview-card">
                    <div class="roadmap-overview-icon purple">↗</div>
                    <div>
                        <span>IN PROGRESS</span>
                        <strong>{{ $inProgressSkills }}</strong>
                        <small>Skill sedang dipelajari</small>
                    </div>
                </div>

                <div class="roadmap-overview-card">
                    <div class="roadmap-overview-icon gold">✦</div>
                    <div>
                        <span>LESSON DONE</span>
                        <strong>{{ $completedLessons }}</strong>
                        <small>Dari {{ $totalLessons }} lesson</small>
                    </div>
                </div>

                <div class="roadmap-overview-card">
                    <div class="roadmap-overview-icon blue">◎</div>
                    <div>
                        <span>CATEGORIES</span>
                        <strong>{{ $categoryCount }}</strong>
                        <small>Area pembelajaran</small>
                    </div>
                </div>
            </section>

            <section class="roadmap-journey-section">
                <div class="roadmap-section-heading">
                    <div>
                        <span>YOUR JOURNEY</span>
                        <h2>Perjalanan SkillPath</h2>
                        <p>Ikuti empat tahap untuk membangun kemampuanmu.</p>
                    </div>
                </div>

                <div class="roadmap-journey">
                    <div class="roadmap-journey-line">
                        <div style="width: {{ $progressPercentage }}%;"></div>
                    </div>

                    <div class="roadmap-stage {{ $completedLessons >= 1 ? 'is-active' : '' }}">
                        <div class="roadmap-stage-node">
                            {{ $completedLessons >= 1 ? '✓' : '01' }}
                        </div>
                        <span>START</span>
                        <strong>Mulai</strong>
                        <small>Bangun fondasi</small>
                    </div>

                    <div class="roadmap-stage {{ $completedLessons >= 5 ? 'is-active' : '' }}">
                        <div class="roadmap-stage-node">
                            {{ $completedLessons >= 5 ? '✓' : '02' }}
                        </div>
                        <span>BUILD</span>
                        <strong>Bangun Skill</strong>
                        <small>Perkuat kemampuan</small>
                    </div>

                    <div class="roadmap-stage {{ $completedLessons >= 10 ? 'is-active' : '' }}">
                        <div class="roadmap-stage-node">
                            {{ $completedLessons >= 10 ? '✓' : '03' }}
                        </div>
                        <span>CREATE</span>
                        <strong>Buat Project</strong>
                        <small>Praktikkan skill</small>
                    </div>

                    <div class="roadmap-stage {{ $progressPercentage >= 100 ? 'is-active' : '' }}">
                        <div class="roadmap-stage-node">
                            {{ $progressPercentage >= 100 ? '★' : '04' }}
                        </div>
                        <span>MASTER</span>
                        <strong>Level Up</strong>
                        <small>Kuasai perjalanan</small>
                    </div>
                </div>
            </section>

            <section class="roadmap-skills-section">
                <div class="roadmap-section-heading">
                    <div>
                        <span>SKILL PATH</span>
                        <h2>Jalur pembelajaran</h2>
                        <p>
                            Setiap skill memiliki progress yang mengikuti lesson yang sudah kamu selesaikan.
                        </p>
                    </div>

                    <a href="{{ route('skills.index') }}" class="roadmap-outline-button">
                        Semua Skills →
                    </a>
                </div>

                <div class="roadmap-skill-list">
                    @forelse ($skills as $skill)
                        <article class="roadmap-skill-card {{ $skill->roadmap_status === 'completed' ? 'is-completed' : '' }}">

                            <div class="roadmap-skill-number">
                                {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                            </div>

                            <div class="roadmap-skill-image">
                                @if ($skill->image)
                                    <img src="{{ asset('images/skills/' . $skill->image) }}" alt="{{ $skill->name }}">
                                @else
                                    <img src="{{ asset('images/skillpath-icon.svg') }}" alt="{{ $skill->name }}">
                                @endif
                            </div>

                            <div class="roadmap-skill-info">
                                <div class="roadmap-skill-top">
                                    <span>{{ strtoupper($skill->category ?? 'SKILL') }}</span>

                                    @if ($skill->roadmap_status === 'completed')
                                        <strong class="status-completed">COMPLETED</strong>
                                    @elseif ($skill->roadmap_status === 'progress')
                                        <strong class="status-progress">IN PROGRESS</strong>
                                    @else
                                        <strong class="status-available">AVAILABLE</strong>
                                    @endif
                                </div>

                                <h3>{{ $skill->name }}</h3>

                                <p>
                                    {{ $skill->description ?? 'Pelajari skill ini secara bertahap melalui lesson yang tersedia.' }}
                                </p>

                                <div class="roadmap-skill-progress">
                                    <div>
                                        <span>{{ $skill->completed_lessons }} / {{ $skill->total_lessons }} lesson</span>
                                        <strong>{{ $skill->progress_percentage }}%</strong>
                                    </div>

                                    <div class="roadmap-skill-bar">
                                        <div style="width: {{ $skill->progress_percentage }}%;"></div>
                                    </div>
                                </div>
                            </div>

                            <a href="{{ route('skills.show', $skill->slug) }}" class="roadmap-skill-action">
                                <span>
                                    {{ $skill->roadmap_status === 'completed' ? 'Review' : ($skill->roadmap_status === 'progress' ? 'Continue' : 'Start') }}
                                </span>
                                <strong>→</strong>
                            </a>

                        </article>
                    @empty
                        <div class="roadmap-empty">
                            <strong>Belum ada skill.</strong>
                            <p>Skill akan muncul di roadmap setelah tersedia.</p>
                        </div>
                    @endforelse
                </div>
            </section>

            <section class="roadmap-final-card">
                <div>
                    <span>KEEP MOVING</span>
                    <h2>Progress kecil tetap berarti.</h2>
                    <p>
                        Selesaikan satu lesson hari ini dan biarkan roadmap kamu
                        berkembang sedikit demi sedikit.
                    </p>
                </div>

                <a href="{{ route('skills.index') }}">
                    Lanjut Belajar
                    <span>→</span>
                </a>
            </section>

        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const cards = document.querySelectorAll(
                '.roadmap-overview-card, .roadmap-journey-section, .roadmap-skills-section, .roadmap-skill-card, .roadmap-final-card'
            );

            cards.forEach((card, index) => {
                setTimeout(() => {
                    card.classList.add('is-visible');
                }, index * 80);
            });
        });
    </script>
</body>
</html>