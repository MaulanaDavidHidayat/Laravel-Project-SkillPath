<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang - SkillPath</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/skillpath-icon.svg') }}">
</head>
<body class="about-page">
    @include('components.navbar')

    <main class="about-main">
        <div class="container about-container">

            <section class="about-hero">
                <div class="about-hero-content">
                    <span class="about-eyebrow">ABOUT SKILLPATH</span>

                    <h1>
                        Belajar dengan arah.
                        <span>Berkembang dengan tujuan.</span>
                    </h1>

                    <p>
                        SkillPath adalah platform pembelajaran yang membantu kamu
                        mempelajari berbagai skill secara terstruktur, melihat
                        perkembangan, dan membangun perjalanan belajar yang lebih jelas.
                    </p>

                    <div class="about-hero-actions">
                        <a href="{{ route('skills.index') }}" class="about-primary-button">
                            Jelajahi Skills
                            <span>→</span>
                        </a>

                        <a href="{{ route('roadmap') }}" class="about-secondary-button">
                            Lihat Roadmap
                        </a>
                    </div>
                </div>

                <div class="about-hero-visual">
                    <div class="about-glow about-glow-one"></div>
                    <div class="about-glow about-glow-two"></div>

                    <div class="about-visual-card">
                        <div class="about-visual-top">
                            <span>SKILLPATH</span>
                            <span class="about-status-dot"></span>
                        </div>

                        <div class="about-visual-icon">
                            <img src="{{ asset('images/skillpath-icon.svg') }}" alt="SkillPath">
                        </div>

                        <strong>Learning Journey</strong>
                        <small>Learn · Practice · Grow</small>

                        <div class="about-visual-progress">
                            <div></div>
                        </div>

                        <div class="about-visual-footer">
                            <span>Skills</span>
                            <strong>∞</strong>
                        </div>
                    </div>
                </div>
            </section>

            <section class="about-stats">
                <div class="about-stat-card">
                    <span>01</span>
                    <strong>Skills</strong>
                    <p>Beragam kemampuan yang bisa dipelajari secara bertahap.</p>
                </div>

                <div class="about-stat-card">
                    <span>02</span>
                    <strong>Roadmap</strong>
                    <p>Jalur belajar yang membantu kamu memahami langkah berikutnya.</p>
                </div>

                <div class="about-stat-card">
                    <span>03</span>
                    <strong>Progress</strong>
                    <p>Perjalanan belajar yang dapat dipantau dari waktu ke waktu.</p>
                </div>
            </section>

            <section class="about-purpose">
                <div class="about-section-label">
                    <span>OUR PURPOSE</span>
                    <small>WHY SKILLPATH EXISTS</small>
                </div>

                <div class="about-purpose-content">
                    <div>
                        <h2>
                            Belajar bukan tentang
                            <span>seberapa cepat.</span>
                        </h2>
                    </div>

                    <div>
                        <p>
                            SkillPath dibuat untuk membuat proses belajar terasa lebih
                            terarah dan mudah diikuti. Daripada belajar tanpa tujuan,
                            kamu dapat melihat skill yang tersedia, mengikuti lesson,
                            dan memantau perkembanganmu.
                        </p>

                        <p>
                            Setiap langkah kecil menjadi bagian dari perjalanan yang
                            lebih besar.
                        </p>
                    </div>
                </div>
            </section>

            <section class="about-features">
                <div class="about-section-heading">
                    <span>WHAT YOU GET</span>
                    <h2>Satu tempat untuk membangun skill.</h2>
                    <p>
                        SkillPath menggabungkan pembelajaran, progress,
                        dan roadmap dalam satu pengalaman.
                    </p>
                </div>

                <div class="about-feature-grid">
                    <article class="about-feature-card featured">
                        <div class="about-feature-icon">✦</div>

                        <span>01</span>
                        <h3>Structured Learning</h3>

                        <p>
                            Materi disusun dalam lesson yang lebih terarah
                            sehingga kamu dapat belajar secara bertahap.
                        </p>

                        <div class="about-feature-line"></div>
                    </article>

                    <article class="about-feature-card">
                        <div class="about-feature-icon purple">◎</div>

                        <span>02</span>
                        <h3>Track Progress</h3>

                        <p>
                            Tandai lesson yang selesai dan lihat perkembangan
                            skill kamu secara langsung.
                        </p>

                        <div class="about-feature-line"></div>
                    </article>

                    <article class="about-feature-card">
                        <div class="about-feature-icon blue">↗</div>

                        <span>03</span>
                        <h3>Clear Roadmap</h3>

                        <p>
                            Ketahui posisi perjalananmu dan tentukan langkah
                            belajar berikutnya.
                        </p>

                        <div class="about-feature-line"></div>
                    </article>
                </div>
            </section>

            <section class="about-process">
                <div class="about-section-heading">
                    <span>HOW IT WORKS</span>
                    <h2>Empat langkah menuju skill baru.</h2>
                </div>

                <div class="about-process-track">
                    <div class="about-process-line"></div>

                    <div class="about-process-item">
                        <div class="about-process-number">01</div>
                        <span>EXPLORE</span>
                        <h3>Pilih Skill</h3>
                        <p>Temukan skill yang ingin kamu pelajari.</p>
                    </div>

                    <div class="about-process-item">
                        <div class="about-process-number">02</div>
                        <span>LEARN</span>
                        <h3>Pelajari Lesson</h3>
                        <p>Ikuti materi secara bertahap.</p>
                    </div>

                    <div class="about-process-item">
                        <div class="about-process-number">03</div>
                        <span>PRACTICE</span>
                        <h3>Bangun Pemahaman</h3>
                        <p>Gunakan pengetahuan melalui latihan.</p>
                    </div>

                    <div class="about-process-item">
                        <div class="about-process-number">04</div>
                        <span>GROW</span>
                        <h3>Level Up</h3>
                        <p>Lanjutkan perjalanan ke skill berikutnya.</p>
                    </div>
                </div>
            </section>

            <section class="about-values">
                <div class="about-values-visual">
                    <div class="about-values-orbit orbit-one"></div>
                    <div class="about-values-orbit orbit-two"></div>

                    <div class="about-values-center">
                        <img src="{{ asset('images/skillpath-icon.svg') }}" alt="SkillPath">
                    </div>
                </div>

                <div class="about-values-content">
                    <span>THE SKILLPATH MINDSET</span>

                    <h2>
                        Sedikit demi sedikit,
                        <strong>menjadi lebih baik.</strong>
                    </h2>

                    <p>
                        Skill tidak dibangun dalam satu hari. Yang penting adalah
                        konsistensi, rasa ingin tahu, dan keberanian untuk terus
                        mencoba.
                    </p>

                    <div class="about-values-list">
                        <div>
                            <strong>01</strong>
                            <span>Learn continuously</span>
                        </div>

                        <div>
                            <strong>02</strong>
                            <span>Track your progress</span>
                        </div>

                        <div>
                            <strong>03</strong>
                            <span>Keep building</span>
                        </div>
                    </div>
                </div>
            </section>

            <section class="about-cta">
                <div>
                    <span>START YOUR JOURNEY</span>

                    <h2>
                        Skill baru menunggumu.
                    </h2>

                    <p>
                        Pilih satu skill, mulai satu lesson,
                        dan biarkan perjalananmu berkembang.
                    </p>
                </div>

                <a href="{{ route('skills.index') }}">
                    Mulai Belajar
                    <span>→</span>
                </a>
            </section>

        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const elements = document.querySelectorAll(
                '.about-stat-card, .about-purpose, .about-feature-card, .about-process-item, .about-values, .about-cta'
            );

            elements.forEach((element, index) => {
                setTimeout(() => {
                    element.classList.add('is-visible');
                }, index * 70);
            });
        });
    </script>
</body>
</html>