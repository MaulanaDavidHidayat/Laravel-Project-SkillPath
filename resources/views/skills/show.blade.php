<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $skill->name }} - SkillPath</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/skillpath-icon.svg') }}">
</head>
<body>
    @include('components.navbar')

    <main>
        <section class="skill-detail">
            <div class="container">
                <a
                    href="{{ route('skills.index') }}"
                    class="back-link"
                >
                    ← Kembali ke Skills
                </a>

                <div class="detail-card">
                    <div class="detail-icon">
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

                    <div class="detail-content">
                        <div>
                            <span class="badge">
                                {{ $skill->level }}
                            </span>

                            <span class="category">
                                {{ $skill->category ?: 'General' }}
                            </span>
                        </div>

                        <h1>{{ $skill->name }}</h1>

                        <p class="detail-description">
                            {{ $skill->description }}
                        </p>

                        <div class="progress-header">
                            <span>Progress Belajar</span>
                            <strong>{{ $progressPercentage }}%</strong>
                        </div>

                        <div class="progress-bar">
                            <div
                                class="progress-value"
                                style="width: {{ $progressPercentage }}%;"
                            ></div>
                        </div>
                    </div>
                </div>

                <section class="roadmap-section">
                    <div class="section-heading">
                        <div>
                            <div class="section-kicker">
                                YOUR JOURNEY
                            </div>

                            <h2>Learning Roadmap</h2>

                            <p>
                                Ikuti tahapan belajar {{ $skill->name }}
                                secara bertahap.
                            </p>
                        </div>
                    </div>

                    <div class="roadmap">
                        @forelse ($skill->lessons as $lesson)
                            @php
                                $isCompleted = in_array(
                                    $lesson->id,
                                    $completedLessonIds
                                );
                            @endphp

                            <a
                                href="{{ route('lessons.show', [$skill->slug, $lesson->slug]) }}"
                                class="roadmap-item {{ $isCompleted ? 'is-completed' : '' }}"
                            >
                                <div class="roadmap-number">
                                    @if ($isCompleted)
                                        ✓
                                    @else
                                        {{ str_pad($lesson->order, 2, '0', STR_PAD_LEFT) }}
                                    @endif
                                </div>

                                <div class="roadmap-content">
                                    <div class="roadmap-top">
                                        <span class="roadmap-status">
                                            LESSON {{ $lesson->order }}
                                        </span>

                                        @if ($isCompleted)
                                            <span class="roadmap-completed">
                                                ✓ SELESAI
                                            </span>
                                        @endif
                                    </div>

                                    <h3>{{ $lesson->title }}</h3>

                                    @if ($lesson->description)
                                        <p>
                                            {{ $lesson->description }}
                                        </p>
                                    @endif

                                    <small>
                                        @if ($isCompleted)
                                            Lesson telah selesai ✓
                                        @else
                                            {{ $lesson->duration }}
                                            menit · Mulai belajar →
                                        @endif
                                    </small>
                                </div>
                            </a>
                        @empty
                            <div class="empty-state">
                                Belum ada materi untuk skill ini.
                            </div>
                        @endforelse
                    </div>
                </section>
            </div>
        </section>
    </main>
</body>
</html>