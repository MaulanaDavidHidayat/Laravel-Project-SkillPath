<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skills - SkillPath</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/skillpath-icon.svg') }}">
</head>
<body>
    @include('components.navbar')

    <main>
        <section class="hero">
            <div class="container hero-grid">
                <div class="hero-copy">
                    <span class="eyebrow">
                        <span class="eyebrow-dot"></span>
                        Learn · Practice · Grow
                    </span>

                    <h1>
                        Bangun Skill.<br>
                        <span>Bangun Masa Depan.</span>
                    </h1>

                    <p class="hero-text">
                        Temukan skill yang ingin kamu pelajari, ikuti roadmap yang terarah,
                        dan tingkatkan kemampuanmu melalui pembelajaran yang terstruktur.
                    </p>

                    <div class="search-box">
                        <span class="search-icon">⌕</span>

                        <input
                            type="text"
                            id="skillSearch"
                            placeholder="Cari skill yang ingin dipelajari..."
                        >

                        <button type="button" class="search-button">
                            Cari Skill
                        </button>
                    </div>
                </div>

                <div class="hero-visual">
                    <div class="glass-panel">
                        <div class="visual-window">
                            <div class="window-top">
                                <div class="window-dots">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>

                                <span class="window-label">
                                    MY LEARNING
                                </span>
                            </div>

                            @if ($myLearning->count())
                                @foreach ($myLearning->take(2) as $learning)
                                    @php
                                        $skill = $learning['skill'];
                                    @endphp

                                    <a
                                        href="{{ route('skills.show', $skill->slug) }}"
                                        class="learning-card"
                                    >
                                        <div class="learning-logo">
                                            @if ($skill->image)
                                                <img
                                                    src="{{ asset('images/skills/' . $skill->image) }}"
                                                    alt="{{ $skill->name }}"
                                                >
                                            @else
                                                {{ strtoupper(substr($skill->name, 0, 1)) }}
                                            @endif
                                        </div>

                                        <div class="learning-info">
                                            <strong>
                                                {{ $skill->name }}
                                            </strong>

                                            <span>
                                                {{ $skill->category ?: 'General' }}
                                                ·
                                                {{ $skill->level }}
                                            </span>

                                            <div class="mini-progress">
                                                <span
                                                    style="width: {{ $learning['progressPercentage'] }}%;"
                                                ></span>
                                            </div>

                                            <small>
                                                {{ $learning['completedLessons'] }}/{{ $learning['totalLessons'] }}
                                                lesson ·
                                                {{ $learning['progressPercentage'] }}%
                                            </small>
                                        </div>
                                    </a>
                                @endforeach
                            @else
                                <div class="learning-empty">
                                    <strong>Belum ada progress</strong>
                                    <span>
                                        Mulai belajar skill pertamamu.
                                    </span>
                                </div>
                            @endif

                            <div class="visual-stat">
                                <strong>
                                    {{ $skills->count() }} Skills
                                </strong>

                                <span>
                                    Tersedia untuk dipelajari
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="category-section">
            <div class="container">
                <div class="category-list">
                    <button
                        type="button"
                        class="category-item active"
                        data-category="all"
                    >
                        <span class="category-icon">◈</span>
                        <span class="category-name">Semua Skill</span>
                        <span class="category-count">
                            {{ $skills->count() }} Skill
                        </span>
                    </button>

                    <button
                        type="button"
                        class="category-item"
                        data-category="Web Development"
                    >
                        <span class="category-icon">&lt;/&gt;</span>
                        <span class="category-name">
                            Web Development
                        </span>
                        <span class="category-count">
                            Belajar Web
                        </span>
                    </button>

                    <button
                        type="button"
                        class="category-item"
                        data-category="Programming"
                    >
                        <span class="category-icon">{ }</span>
                        <span class="category-name">
                            Programming
                        </span>
                        <span class="category-count">
                            Coding
                        </span>
                    </button>

                    <button
                        type="button"
                        class="category-item"
                        data-category="Design"
                    >
                        <span class="category-icon">✦</span>
                        <span class="category-name">
                            Design
                        </span>
                        <span class="category-count">
                            UI / UX
                        </span>
                    </button>

                    <button
                        type="button"
                        class="category-item"
                        data-category="Database"
                    >
                        <span class="category-icon">◉</span>
                        <span class="category-name">
                            Database
                        </span>
                        <span class="category-count">
                            Data
                        </span>
                    </button>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="section-heading">
                    <div>
                        <div class="section-kicker">
                            Explore & Learn
                        </div>

                        <h2>Jelajahi Skill</h2>

                        <p>
                            Pilih skill yang sesuai dengan minat dan tujuan belajarmu.
                        </p>
                    </div>

                    <a
                        href="{{ route('skills.index') }}"
                        class="view-all"
                    >
                        Lihat Semua →
                    </a>
                </div>

                @if ($skills->count())
                    <div class="skill-grid" id="skillGrid">
                        @foreach ($skills as $skill)
                            @php
                                $skillLessonIds = $skill->lessons->pluck('id');

                                $completedSkillLessons = auth()->check()
                                    ? \App\Models\UserProgress::where('user_id', auth()->id())
                                        ->whereIn('lesson_id', $skillLessonIds)
                                        ->where('completed', true)
                                        ->count()
                                    : 0;

                                $totalSkillLessons = $skill->lessons->count();

                                $skillProgress = $totalSkillLessons > 0
                                    ? round(($completedSkillLessons / $totalSkillLessons) * 100)
                                    : 0;
                            @endphp

                            <article
                                class="skill-card"
                                data-category="{{ $skill->category }}"
                                data-name="{{ strtolower($skill->name) }}"
                            >
                                <div class="skill-icon">
                                    @if ($skill->image)
                                        <img
                                            src="{{ asset('images/skills/' . $skill->image) }}"
                                            alt="{{ $skill->name }}"
                                        >
                                    @else
                                        <strong>
                                            {{ strtoupper(substr($skill->name, 0, 1)) }}
                                        </strong>
                                    @endif
                                </div>

                                <h3>{{ $skill->name }}</h3>

                                <p>
                                    {{ $skill->description }}
                                </p>

                                <div class="skill-meta">
                                    <span class="badge">
                                        {{ $skill->level }}
                                    </span>

                                    <span class="category">
                                        {{ $skill->category ?: 'General' }}
                                    </span>
                                </div>

                                <div class="skill-progress">
                                    <div class="progress-top">
                                        <span>Progress belajar</span>
                                        <span>{{ $skillProgress }}%</span>
                                    </div>

                                    <div class="progress-bar">
                                        <div
                                            class="progress-value"
                                            style="width: {{ $skillProgress }}%;"
                                        ></div>
                                    </div>
                                </div>

                                <div class="skill-actions">
                                    <a
                                        href="{{ route('skills.show', $skill->slug) }}"
                                        class="skill-button"
                                    >
                                        Mulai Belajar →
                                    </a>

                                    <span class="skill-arrow">
                                        ›
                                    </span>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    <div
                        id="emptyFilterState"
                        class="empty-state"
                        style="display: none;"
                    >
                        Tidak ada skill dalam kategori ini.
                    </div>
                @else
                    <div class="empty-state">
                        Belum ada skill yang tersedia.
                    </div>
                @endif
            </div>
        </section>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const categoryItems = document.querySelectorAll('.category-item');
            const skillCards = document.querySelectorAll('.skill-card');
            const searchInput = document.getElementById('skillSearch');
            const searchButton = document.querySelector('.search-button');
            const emptyFilterState = document.getElementById('emptyFilterState');

            let selectedCategory = 'all';

            function filterSkills() {
                const searchValue = searchInput
                    ? searchInput.value.trim().toLowerCase()
                    : '';

                let visibleCount = 0;

                skillCards.forEach(card => {
                    const cardCategory = card.dataset.category || '';
                    const cardName = card.dataset.name || '';

                    const categoryMatch =
                        selectedCategory === 'all' ||
                        cardCategory === selectedCategory;

                    const searchMatch =
                        searchValue === '' ||
                        cardName.includes(searchValue);

                    if (categoryMatch && searchMatch) {
                        card.style.display = '';
                        visibleCount++;
                    } else {
                        card.style.display = 'none';
                    }
                });

                if (emptyFilterState) {
                    emptyFilterState.style.display =
                        visibleCount === 0 ? 'block' : 'none';
                }
            }

            categoryItems.forEach(item => {
                item.addEventListener('click', () => {
                    selectedCategory = item.dataset.category;

                    categoryItems.forEach(category => {
                        category.classList.remove('active');
                    });

                    item.classList.add('active');

                    filterSkills();
                });
            });

            if (searchButton) {
                searchButton.addEventListener('click', filterSkills);
            }

            if (searchInput) {
                searchInput.addEventListener('input', filterSkills);

                searchInput.addEventListener('keydown', event => {
                    if (event.key === 'Enter') {
                        filterSkills();
                    }
                });
            }
        });
    </script>
</body>
</html>