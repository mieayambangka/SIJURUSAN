@extends('layouts.guest')

@section('content')
    @include('components.navbar')

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,400;12..96,600;12..96,700;12..96,800&family=DM+Sans:ital,opsz,wght@0,9..40,400;0,9..40,500;1,9..40,400&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --font-display: 'Bricolage Grotesque', sans-serif;
            --font-body: 'DM Sans', sans-serif;
        }

        body {
            font-family: var(--font-body);
        }

        /* ── HERO ── */
        .hero-root {
            position: relative;
            min-height: 88vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 120px 24px 80px;
            overflow: hidden;
            background: #020817;
        }

        /* Mesh gradient blobs */
        .hero-blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(90px);
            opacity: 0.55;
            pointer-events: none;
        }

        .blob-1 {
            width: 640px;
            height: 640px;
            background: #1d4ed8;
            top: -160px;
            left: -120px;
        }

        .blob-2 {
            width: 500px;
            height: 500px;
            background: #7c3aed;
            bottom: -80px;
            right: -100px;
        }

        .blob-3 {
            width: 360px;
            height: 360px;
            background: #0891b2;
            top: 40%;
            left: 55%;
        }

        /* Noise overlay */
        .hero-noise {
            position: absolute;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
            pointer-events: none;
        }

        /* Grid lines */
        .hero-grid {
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(255, 255, 255, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
            background-size: 60px 60px;
            pointer-events: none;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border: 1px solid rgba(255, 255, 255, 0.12);
            background: rgba(255, 255, 255, 0.06);
            backdrop-filter: blur(12px);
            border-radius: 999px;
            padding: 6px 18px;
            color: rgba(255, 255, 255, 0.75);
            font-size: 13px;
            font-family: var(--font-body);
            letter-spacing: 0.04em;
            margin-bottom: 32px;
            animation: fadeSlideDown 0.7s ease both;
        }

        .hero-badge-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #60a5fa;
            box-shadow: 0 0 8px #60a5fa;
            animation: pulse 2s infinite;
        }

        .hero-title {
            font-family: var(--font-display);
            font-size: clamp(42px, 7vw, 80px);
            font-weight: 800;
            color: #ffffff;
            line-height: 1.05;
            letter-spacing: -0.03em;
            text-align: center;
            max-width: 820px;
            animation: fadeSlideUp 0.8s 0.15s ease both;
        }

        .hero-title .accent {
            background: linear-gradient(135deg, #60a5fa 0%, #a78bfa 50%, #38bdf8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-sub {
            margin-top: 20px;
            font-size: 17px;
            color: rgba(255, 255, 255, 0.5);
            max-width: 480px;
            text-align: center;
            line-height: 1.7;
            animation: fadeSlideUp 0.8s 0.28s ease both;
        }

        .hero-cta {
            margin-top: 40px;
            display: flex;
            gap: 12px;
            align-items: center;
            animation: fadeSlideUp 0.8s 0.42s ease both;
        }

        .btn-main {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 14px 28px;
            background: #2563eb;
            color: #fff;
            border-radius: 14px;
            font-size: 14px;
            font-weight: 600;
            font-family: var(--font-body);
            text-decoration: none;
            transition: background 0.2s, transform 0.15s, box-shadow 0.2s;
            box-shadow: 0 0 0 0 rgba(37, 99, 235, 0);
        }

        .btn-main:hover {
            background: #1d4ed8;
            transform: translateY(-1px);
            box-shadow: 0 8px 32px rgba(37, 99, 235, 0.45);
        }

        .btn-ghost {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 14px 28px;
            border: 1px solid rgba(255, 255, 255, 0.14);
            color: rgba(255, 255, 255, 0.75);
            border-radius: 14px;
            font-size: 14px;
            font-weight: 500;
            font-family: var(--font-body);
            text-decoration: none;
            transition: background 0.2s, border-color 0.2s;
        }

        .btn-ghost:hover {
            background: rgba(255, 255, 255, 0.07);
            border-color: rgba(255, 255, 255, 0.28);
            color: #fff;
        }

        /* Stats row */
        .hero-stats {
            margin-top: 72px;
            display: flex;
            gap: 0;
            align-items: center;
            border: 1px solid rgba(255, 255, 255, 0.08);
            background: rgba(255, 255, 255, 0.04);
            backdrop-filter: blur(12px);
            border-radius: 20px;
            overflow: hidden;
            animation: fadeSlideUp 0.8s 0.55s ease both;
        }

        .stat-cell {
            padding: 20px 36px;
            text-align: center;
            border-right: 1px solid rgba(255, 255, 255, 0.07);
        }

        .stat-cell:last-child {
            border-right: none;
        }

        .stat-num {
            font-family: var(--font-display);
            font-size: 28px;
            font-weight: 700;
            color: #fff;
        }

        .stat-lbl {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.42);
            margin-top: 2px;
        }

        /* ── CARDS SECTION ── */
        .section-jurusan {
            background: #f8faff;
            padding: 96px 24px 100px;
        }

        .section-label {
            display: inline-block;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: #2563eb;
            background: #eff6ff;
            border: 1px solid #bfdbfe;
            border-radius: 999px;
            padding: 5px 14px;
            margin-bottom: 16px;
        }

        .section-title {
            font-family: var(--font-display);
            font-size: clamp(28px, 4vw, 42px);
            font-weight: 800;
            color: #0f172a;
            letter-spacing: -0.02em;
            margin-bottom: 12px;
        }

        .section-sub {
            font-size: 15px;
            color: #64748b;
            max-width: 520px;
            margin: 0 auto;
            line-height: 1.7;
        }

        /* Cards grid */
        .cards-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            margin-top: 56px;
        }

        @media (max-width: 1024px) {
            .cards-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 640px) {
            .cards-grid {
                grid-template-columns: 1fr;
            }
        }

        .jurusan-card {
            background: #ffffff;
            border-radius: 24px;
            border: 1px solid #e8edf5;
            overflow: hidden;
            transition: transform 0.25s cubic-bezier(.22, .68, 0, 1.2), box-shadow 0.25s ease, border-color 0.25s;
            cursor: pointer;
            position: relative;
        }

        .jurusan-card:hover {
            transform: translateY(-6px) scale(1.01);
            box-shadow: 0 24px 64px rgba(15, 23, 42, 0.1);
            border-color: transparent;
        }

        /* Gradient corner glow on hover */
        .jurusan-card::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 24px;
            opacity: 0;
            transition: opacity 0.3s;
            pointer-events: none;
        }

        .jurusan-card:hover::before {
            opacity: 1;
        }

        .card-stripe {
            height: 5px;
        }

        .card-body {
            padding: 28px 28px 24px;
        }

        .card-icon {
            width: 52px;
            height: 52px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            transition: transform 0.2s;
        }

        .jurusan-card:hover .card-icon {
            transform: scale(1.1) rotate(-3deg);
        }

        .card-title {
            font-family: var(--font-display);
            font-size: 18px;
            font-weight: 700;
            color: #0f172a;
            line-height: 1.25;
            margin-bottom: 4px;
        }

        .card-code {
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            margin-bottom: 12px;
            display: inline-block;
        }

        .card-desc {
            font-size: 13.5px;
            color: #64748b;
            line-height: 1.65;
            margin-bottom: 20px;
        }

        .card-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 7px;
        }

        .tag {
            font-size: 11px;
            font-weight: 500;
            padding: 4px 12px;
            border-radius: 999px;
            border: 1px solid;
            font-family: var(--font-body);
            letter-spacing: 0.02em;
        }

        /* Card footer CTA */
        .card-footer {
            padding: 16px 28px;
            border-top: 1px solid #f1f5f9;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-cta {
            font-size: 12.5px;
            font-weight: 600;
            color: inherit;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 6px;
            opacity: 0.7;
            transition: opacity 0.2s, gap 0.2s;
        }

        .jurusan-card:hover .card-cta {
            opacity: 1;
            gap: 10px;
        }

        /* ── ANIMATIONS ── */
        @keyframes fadeSlideDown {
            from {
                opacity: 0;
                transform: translateY(-16px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeSlideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.5;
            }
        }

        /* AOS overrides */
        [data-aos] {
            transition-timing-function: cubic-bezier(.22, .68, 0, 1.15) !important;
        }
    </style>

    {{-- ═══════════════════════════════════════════════════════════
     HERO
═══════════════════════════════════════════════════════════ --}}
    <section class="hero-root">
        <div class="hero-blob blob-1"></div>
        <div class="hero-blob blob-2"></div>
        <div class="hero-blob blob-3"></div>
        <div class="hero-grid"></div>
        <div class="hero-noise"></div>

        <div style="position:relative; z-index:10; display:flex; flex-direction:column; align-items:center;">
            <div class="hero-badge">
                <span class="hero-badge-dot"></span>
                Program Keahlian SMK
            </div>

            <h1 class="hero-title">
                Pilih Jurusan<br>
                <span class="accent">Sesuai Potensimu</span>
            </h1>

            <p class="hero-sub">
                Kenali setiap program keahlian yang tersedia dan temukan jurusan yang paling sesuai dengan minat dan
                kemampuanmu.
            </p>

            <div class="hero-cta">
                <a href="{{ route('register') }}" class="btn-main">
                    Mulai Penjurusan
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14M12 5l7 7-7 7" />
                    </svg>
                </a>
                <a href="#jurusan-list" class="btn-ghost">
                    Lihat Jurusan
                </a>
            </div>

            <div class="hero-stats">
                <div class="stat-cell">
                    <div class="stat-num">6</div>
                    <div class="stat-lbl">Program Keahlian</div>
                </div>
                <div class="stat-cell">
                    <div class="stat-num">1.2k+</div>
                    <div class="stat-lbl">Siswa Aktif</div>
                </div>
                <div class="stat-cell">
                    <div class="stat-num">98%</div>
                    <div class="stat-lbl">Kepuasan Siswa</div>
                </div>
                <div class="stat-cell">
                    <div class="stat-num">50+</div>
                    <div class="stat-lbl">Mitra Industri</div>
                </div>
            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════════════════════
     JURUSAN LIST
═══════════════════════════════════════════════════════════ --}}
    <section id="jurusan-list" class="section-jurusan">
        <div style="max-width:1200px; margin:0 auto;">

            <div class="text-center" data-aos="fade-up">
                <div class="section-label">Program Keahlian</div>
                <h2 class="section-title">Jurusan yang Tersedia</h2>
                <p class="section-sub">Setiap jurusan dirancang untuk membekali siswa dengan kompetensi yang relevan dengan
                    dunia kerja dan industri.</p>
            </div>

            <div class="cards-grid">

                {{-- TKJ --}}
                <div class="jurusan-card" data-aos="fade-up" data-aos-delay="60">
                    <div class="card-stripe" style="background: linear-gradient(90deg, #3b82f6, #60a5fa)"></div>
                    <div class="card-body">
                        <div class="card-icon" style="background:#eff6ff">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#2563eb"
                                stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="3" width="20" height="14" rx="2" />
                                <path d="M8 21h8M12 17v4" />
                                <path d="M7 8h.01M11 8h.01M7 12h10" />
                            </svg>
                        </div>
                        <h3 class="card-title">Teknik Komputer & Jaringan</h3>
                        <span class="card-code" style="color:#2563eb">TKJ</span>
                        <p class="card-desc">Mempelajari instalasi, konfigurasi, dan pemeliharaan jaringan komputer serta
                            perangkat keras. Cocok untuk siswa yang tertarik di bidang IT dan infrastruktur teknologi.</p>
                        <div class="card-tags">
                            <span class="tag"
                                style="background:#eff6ff; color:#1d4ed8; border-color:#bfdbfe">Jaringan</span>
                            <span class="tag"
                                style="background:#eff6ff; color:#1d4ed8; border-color:#bfdbfe">Hardware</span>
                            <span class="tag" style="background:#eff6ff; color:#1d4ed8; border-color:#bfdbfe">IT
                                Support</span>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="card-cta" style="color:#2563eb">
                            Pelajari lebih lanjut
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5" stroke-linecap="round">
                                <path d="M5 12h14M12 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>

                {{-- RPL --}}
                <div class="jurusan-card" data-aos="fade-up" data-aos-delay="120">
                    <div class="card-stripe" style="background: linear-gradient(90deg, #8b5cf6, #a78bfa)"></div>
                    <div class="card-body">
                        <div class="card-icon" style="background:#f5f3ff">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#7c3aed"
                                stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="16 18 22 12 16 6" />
                                <polyline points="8 6 2 12 8 18" />
                            </svg>
                        </div>
                        <h3 class="card-title">Rekayasa Perangkat Lunak</h3>
                        <span class="card-code" style="color:#7c3aed">RPL</span>
                        <p class="card-desc">Mempelajari pengembangan aplikasi berbasis web dan mobile. Cocok untuk siswa
                            yang suka coding, logika pemrograman, dan ingin berkarir sebagai software developer.</p>
                        <div class="card-tags">
                            <span class="tag"
                                style="background:#f5f3ff; color:#6d28d9; border-color:#ddd6fe">Programming</span>
                            <span class="tag" style="background:#f5f3ff; color:#6d28d9; border-color:#ddd6fe">Web
                                Dev</span>
                            <span class="tag"
                                style="background:#f5f3ff; color:#6d28d9; border-color:#ddd6fe">Mobile</span>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="card-cta" style="color:#7c3aed">
                            Pelajari lebih lanjut
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5" stroke-linecap="round">
                                <path d="M5 12h14M12 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>

                {{-- MM --}}
                <div class="jurusan-card" data-aos="fade-up" data-aos-delay="180">
                    <div class="card-stripe" style="background: linear-gradient(90deg, #ec4899, #f472b6)"></div>
                    <div class="card-body">
                        <div class="card-icon" style="background:#fdf2f8">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#db2777"
                                stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <polygon points="23 7 16 12 23 17 23 7" />
                                <rect x="1" y="5" width="15" height="14" rx="2" />
                            </svg>
                        </div>
                        <h3 class="card-title">Multimedia</h3>
                        <span class="card-code" style="color:#db2777">MM</span>
                        <p class="card-desc">Mempelajari desain grafis, videografi, animasi, dan produksi konten digital.
                            Cocok untuk siswa yang memiliki jiwa seni dan kreativitas tinggi.</p>
                        <div class="card-tags">
                            <span class="tag"
                                style="background:#fdf2f8; color:#be185d; border-color:#fbcfe8">Desain</span>
                            <span class="tag"
                                style="background:#fdf2f8; color:#be185d; border-color:#fbcfe8">Video</span>
                            <span class="tag"
                                style="background:#fdf2f8; color:#be185d; border-color:#fbcfe8">Animasi</span>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="card-cta" style="color:#db2777">
                            Pelajari lebih lanjut
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5" stroke-linecap="round">
                                <path d="M5 12h14M12 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>

                {{-- AK --}}
                <div class="jurusan-card" data-aos="fade-up" data-aos-delay="240">
                    <div class="card-stripe" style="background: linear-gradient(90deg, #10b981, #34d399)"></div>
                    <div class="card-body">
                        <div class="card-icon" style="background:#ecfdf5">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#059669"
                                stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="card-title">Akuntansi & Keuangan</h3>
                        <span class="card-code" style="color:#059669">AK</span>
                        <p class="card-desc">Mempelajari pembukuan, laporan keuangan, perpajakan, dan manajemen keuangan.
                            Cocok untuk siswa yang teliti, suka angka, dan tertarik di dunia bisnis.</p>
                        <div class="card-tags">
                            <span class="tag"
                                style="background:#ecfdf5; color:#047857; border-color:#a7f3d0">Keuangan</span>
                            <span class="tag"
                                style="background:#ecfdf5; color:#047857; border-color:#a7f3d0">Perpajakan</span>
                            <span class="tag"
                                style="background:#ecfdf5; color:#047857; border-color:#a7f3d0">Bisnis</span>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="card-cta" style="color:#059669">
                            Pelajari lebih lanjut
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5" stroke-linecap="round">
                                <path d="M5 12h14M12 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>

                {{-- OTKP --}}
                <div class="jurusan-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="card-stripe" style="background: linear-gradient(90deg, #f59e0b, #fbbf24)"></div>
                    <div class="card-body">
                        <div class="card-icon" style="background:#fffbeb">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d97706"
                                stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <h3 class="card-title">Otomatisasi Tata Kelola Perkantoran</h3>
                        <span class="card-code" style="color:#d97706">OTKP</span>
                        <p class="card-desc">Mempelajari administrasi perkantoran, korespondensi, dan manajemen arsip.
                            Cocok untuk siswa yang terorganisir dan ingin bekerja di lingkungan profesional.</p>
                        <div class="card-tags">
                            <span class="tag"
                                style="background:#fffbeb; color:#b45309; border-color:#fde68a">Administrasi</span>
                            <span class="tag"
                                style="background:#fffbeb; color:#b45309; border-color:#fde68a">Perkantoran</span>
                            <span class="tag"
                                style="background:#fffbeb; color:#b45309; border-color:#fde68a">Manajemen</span>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="card-cta" style="color:#d97706">
                            Pelajari lebih lanjut
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5" stroke-linecap="round">
                                <path d="M5 12h14M12 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>

                {{-- BDP --}}
                <div class="jurusan-card" data-aos="fade-up" data-aos-delay="360">
                    <div class="card-stripe" style="background: linear-gradient(90deg, #06b6d4, #22d3ee)"></div>
                    <div class="card-body">
                        <div class="card-icon" style="background:#ecfeff">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0891b2"
                                stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                        </div>
                        <h3 class="card-title">Bisnis Daring & Pemasaran</h3>
                        <span class="card-code" style="color:#0891b2">BDP</span>
                        <p class="card-desc">Mempelajari strategi pemasaran digital, e-commerce, dan pengelolaan bisnis
                            online. Cocok untuk siswa yang berjiwa wirausaha dan tertarik dunia digital marketing.</p>
                        <div class="card-tags">
                            <span class="tag"
                                style="background:#ecfeff; color:#0e7490; border-color:#a5f3fc">E-Commerce</span>
                            <span class="tag"
                                style="background:#ecfeff; color:#0e7490; border-color:#a5f3fc">Marketing</span>
                            <span class="tag"
                                style="background:#ecfeff; color:#0e7490; border-color:#a5f3fc">Digital</span>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="card-cta" style="color:#0891b2">
                            Pelajari lebih lanjut
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5" stroke-linecap="round">
                                <path d="M5 12h14M12 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        if (typeof AOS !== 'undefined') {
            AOS.init({
                duration: 650,
                once: true,
                easing: 'ease-out-cubic'
            });
        }
    </script>
@endsection
