<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $lesson->title }} - SkillPath</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/skillpath-icon.svg') }}">
</head>
<body>
    @include('components.navbar')

    <main class="lesson-page">
        <div class="container">
            <a
                href="{{ route('skills.show', $skill->slug) }}"
                class="back-link"
            >
                ← Kembali ke {{ $skill->name }}
            </a>

            <div class="lesson-layout">
                <article class="lesson-content-card">
                    <div class="lesson-label">
                        LESSON {{ str_pad($lesson->order, 2, '0', STR_PAD_LEFT) }}
                    </div>

                    <h1>{{ $lesson->title }}</h1>

                    <div class="lesson-meta">
                        <span>{{ $lesson->duration }} menit</span>
                        <span>•</span>
                        <span>{{ $skill->name }}</span>
                    </div>

                    @if ($lesson->description)
                        <div class="lesson-intro">
                            <strong>Tentang lesson ini</strong>

                            <p>
                                {{ $lesson->description }}
                            </p>
                        </div>
                    @endif

                    <div class="lesson-body">
                        <h2>Materi Pembelajaran</h2>

                        @if ($lesson->content)
                            <p>
                                {{ $lesson->content }}
                            </p>
                        @else
                            <div class="lesson-empty">
                                <strong>Materi belum tersedia</strong>

                                <span>
                                    Materi untuk lesson ini sedang dipersiapkan.
                                </span>
                            </div>
                        @endif
                    </div>

                    <div class="lesson-checklist">
                        <div class="checklist-icon">
                            ✓
                        </div>

                        <div>
                            <strong>Selesaikan lesson ini</strong>

                            <p>
                                Tandai lesson sebagai selesai setelah kamu memahami
                                materi yang dipelajari.
                            </p>
                        </div>
                    </div>

                    <div class="lesson-navigation">
                        <a
                            href="{{ route('skills.show', $skill->slug) }}"
                            class="lesson-back"
                        >
                            ← Roadmap
                        </a>

                        @auth
                            @if ($isCompleted)
                                <span class="completed-button">
                                    ✓ Lesson Selesai
                                </span>
                            @else
                                <form
                                    method="POST"
                                    action="{{ route('lessons.complete', [$skill->slug, $lesson->slug]) }}"
                                >
                                    @csrf

                                    <button
                                        type="submit"
                                        class="complete-button"
                                    >
                                        Tandai Selesai ✓
                                    </button>
                                </form>
                            @endif
                        @else
                            <a
                                href="{{ route('login') }}"
                                class="complete-button"
                            >
                                Masuk untuk Menyelesaikan
                            </a>
                        @endauth
                    </div>
                </article>

                <aside class="lesson-sidebar">
                    <div class="lesson-sidebar-card">
                        <span class="sidebar-label">
                            SEDANG BELAJAR
                        </span>

                        <div class="sidebar-skill">
                            <div class="sidebar-skill-icon">
                                @if ($skill->image)
                                    <img
                                        src="{{ asset('images/skills/' . $skill->image) }}"
                                        alt="{{ $skill->name }}"
                                    >
                                @else
                                    {{ strtoupper(substr($skill->name, 0, 1)) }}
                                @endif
                            </div>

                            <div>
                                <h3>{{ $skill->name }}</h3>

                                <span>
                                    {{ $skill->category ?: 'General' }}
                                </span>
                            </div>
                        </div>

                        <div class="sidebar-progress">
                            <div class="progress-top">
                                <span>Progress</span>

                                <strong>
                                    {{ $progressPercentage }}%
                                </strong>
                            </div>

                            <div class="progress-bar">
                                <div
                                    class="progress-value"
                                    style="width: {{ $progressPercentage }}%;"
                                ></div>
                            </div>

                            <small>
                                {{ $completedLessons }} dari
                                {{ $totalLessons }} lesson selesai
                            </small>
                        </div>

                        <a
                            href="{{ route('skills.show', $skill->slug) }}"
                            class="sidebar-button"
                        >
                            Lihat Roadmap
                        </a>
                    </div>

                    <div class="lesson-sidebar-card lesson-info-card">
                        <span class="sidebar-label">
                            LESSON INFO
                        </span>

                        <div class="lesson-info-row">
                            <span>Status</span>

                            @if ($isCompleted)
                                <strong class="status-completed">
                                    Selesai
                                </strong>
                            @else
                                <strong>
                                    Belum selesai
                                </strong>
                            @endif
                        </div>

                        <div class="lesson-info-row">
                            <span>Durasi</span>

                            <strong>
                                {{ $lesson->duration }} menit
                            </strong>
                        </div>

                        <div class="lesson-info-row">
                            <span>Lesson</span>

                            <strong>
                                {{ $lesson->order }} / {{ $totalLessons }}
                            </strong>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </main>
</body>
</html>