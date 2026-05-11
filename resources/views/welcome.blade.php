@extends('layouts.app')

@section('content')


{{-- Hero Section --}}
@if(Auth::check() && Auth::user()->email !== 'admin@spk.local')
<section class="max-w-6xl mx-auto px-6 py-24 grid md:grid-cols-2 gap-12 items-center border border-blue-100 rounded-3xl bg-white shadow-sm" data-aos="fade-up" data-aos-duration="800">

    <div data-aos="fade-right" data-aos-delay="150" class="space-y-6">
        <span class="inline-flex items-center gap-1.5 bg-blue-50 text-blue-700 text-xs font-medium px-3 py-1.5 rounded-full border border-blue-100" data-aos="zoom-in" data-aos-delay="200">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
            </svg>
            SMK Negeri 22 Jakarta
        </span>

        <h1 class="mt-5 text-3xl sm:text-4xl font-bold text-gray-900 leading-tight" data-aos="fade-up" data-aos-delay="300">
            Selamat datang, <span class="text-blue-600">{{ Auth::user()->name }}</span>
        </h1>

        <p class="mt-4 text-sm sm:text-base text-gray-500 leading-relaxed max-w-2xl" data-aos="fade-up" data-aos-delay="400">
            Sistem SIJURUSAN siap membantu Anda menemukan jurusan yang sesuai dengan
            nilai akademik dan minat menggunakan metode
            <strong class="text-gray-700 font-medium">Simple Additive Weighting (SAW)</strong>.
        </p>

        @if(!$hasNilai)
            <div class="mt-7 flex flex-wrap gap-3" data-aos="fade-up" data-aos-delay="500">
                <a href="{{ route('student.nilai.index') }}"
                   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg bg-blue-600 text-white text-sm font-medium hover:bg-blue-700 transition shadow-sm hover:shadow-lg transform hover:-translate-y-0.5">
                    Mulai Input Nilai
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M5 12l14 0" /><path d="M13 18l6 -6" /><path d="M13 6l6 6" />
                    </svg>
                </a>
            </div>
        @elseif(!$hasJawaban)
            <div class="mt-7 flex flex-wrap gap-3" data-aos="fade-up" data-aos-delay="500">
                <a href="{{ route('student.kuisioner.index') }}"
                   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg bg-blue-600 text-white text-sm font-medium hover:bg-blue-700 transition shadow-sm hover:shadow-lg transform hover:-translate-y-0.5">
                    Mulai Kuisioner
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M5 12l14 0" /><path d="M13 18l6 -6" /><path d="M13 6l6 6" />
                    </svg>
                </a>
            </div>
        @elseif(!$hasHasil)
            <div class="mt-7 flex flex-wrap gap-3" data-aos="fade-up" data-aos-delay="500">
                <a href="{{ route('student.hasil.index') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg bg-blue-600 text-white text-sm font-medium hover:bg-blue-700 transition shadow-sm">
                    Lihat Hasil Rekomendasi
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M5 12l14 0" /><path d="M13 18l6 -6" /><path d="M13 6l6 6" />
                    </svg>
                </a>
            </div>
        @else
            <div class="mt-7 flex flex-wrap gap-3" data-aos="fade-up" data-aos-delay="500">
                <a href="{{ route('student.hasil.index') }}"
                   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg bg-blue-600 text-white text-sm font-medium hover:bg-blue-700 transition shadow-sm hover:shadow-lg transform hover:-translate-y-0.5">
                    Lihat Hasil Lengkap
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M5 12l14 0" /><path d="M13 18l6 -6" /><path d="M13 6l6 6" />
                    </svg>
                </a>
            </div>
        @endif
    </div>

    {{-- Progress Dashboard --}}
    <div class="bg-gray-100 border border-gray-200 rounded-2xl p-5 flex flex-col gap-4" data-aos="fade-left" data-aos-delay="250">

            {{-- Header --}}
            <div class="flex items-center justify-between" data-aos="fade-in" data-aos-delay="300">
                <span class="text-sm font-medium text-gray-800">Status Progress</span>
                <span class="text-xs text-gray-400">{{ now()->year }} / {{ now()->year + 1 }}</span>
            </div>

            {{-- Progress Steps --}}
            <div class="space-y-3">
                {{-- Step 1: Input Nilai --}}
                <div class="bg-white border border-gray-200 rounded-xl p-4 flex items-center gap-3 {{ $hasNilai ? 'bg-green-50 border-green-200' : '' }}" data-aos="slide-up" data-aos-delay="400">
                    <div class="w-8 h-8 rounded-lg {{ $hasNilai ? 'bg-green-100' : 'bg-gray-100' }} flex items-center justify-center flex-shrink-0">
                        @if($hasNilai)
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-green-600" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M5 12l5 5l10 -10" />
                            </svg>
                        @else
                            <span class="text-xs font-semibold text-gray-600">1</span>
                        @endif
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="text-sm font-semibold text-gray-900">Input Nilai Akademik</div>
                        <div class="text-xs text-gray-400">Masukkan nilai rapor SMP</div>
                    </div>
                    @if(!$hasNilai)
                        <a href="{{ route('student.nilai.index') }}" class="text-xs text-blue-600 hover:text-blue-700 font-medium">
                            Mulai →
                        </a>
                    @endif
                </div>

                {{-- Step 2: Kuisioner --}}
                <div class="bg-white border border-gray-200 rounded-xl p-4 flex items-center gap-3 {{ $hasJawaban ? 'bg-green-50 border-green-200' : (!$hasNilai ? 'opacity-50' : '') }}" data-aos="slide-up" data-aos-delay="500">
                    <div class="w-8 h-8 rounded-lg {{ $hasJawaban ? 'bg-green-100' : 'bg-gray-100' }} flex items-center justify-center flex-shrink-0">
                        @if($hasJawaban)
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-green-600" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M5 12l5 5l10 -10" />
                            </svg>
                        @else
                            <span class="text-xs font-semibold text-gray-600">2</span>
                        @endif
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="text-sm font-semibold text-gray-900">Kuisioner Minat Bakat</div>
                        <div class="text-xs text-gray-400">Jawab pertanyaan minat</div>
                    </div>
                    @if($hasNilai && !$hasJawaban)
                        <a href="{{ route('student.kuisioner.index') }}" class="text-xs text-blue-600 hover:text-blue-700 font-medium">
                            Mulai →
                        </a>
                    @endif
                </div>

                {{-- Step 3: Hasil --}}
                <div class="bg-white border border-gray-200 rounded-xl p-4 flex items-center gap-3 {{ $hasHasil ? 'bg-green-50 border-green-200' : (!$hasJawaban ? 'opacity-50' : '') }}" data-aos="slide-up" data-aos-delay="600">
                    <div class="w-8 h-8 rounded-lg {{ $hasHasil ? 'bg-green-100' : 'bg-gray-100' }} flex items-center justify-center flex-shrink-0">
                        @if($hasHasil)
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-green-600" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M5 12l5 5l10 -10" />
                            </svg>
                        @else
                            <span class="text-xs font-semibold text-gray-600">3</span>
                        @endif
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="text-sm font-semibold text-gray-900">Hasil Rekomendasi</div>
                        <div class="text-xs text-gray-400">Lihat rekomendasi jurusan</div>
                    </div>
                    @if($hasNilai && $hasJawaban && !$hasHasil)
                        <a href="{{ route('student.hasil.index') }}" class="text-xs text-blue-600 hover:text-blue-700 font-medium">
                            Proses →
                        </a>
                    @elseif($hasHasil)
                        <a href="{{ route('student.hasil.index') }}" class="text-xs text-blue-600 hover:text-blue-700 font-medium">
                            Lihat →
                        </a>
                    @endif
                </div>
            </div>

            {{-- Hasil Rekomendasi (jika sudah ada) --}}
            @if($recommendations && $recommendations->count() > 0)
                @php
                    $top = $recommendations->first();
                    $others = $recommendations->skip(1)->take(3);
                    $maxScore = $top->score;
                @endphp

                <div class="border-t border-gray-200 pt-4 mt-2" data-aos="fade-in" data-aos-delay="700">
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-sm font-medium text-gray-800">Hasil Rekomendasi</span>
                    </div>

                    {{-- Top Recommendation --}}
                    <div class="bg-white border border-gray-200 rounded-xl p-3 flex items-center gap-3 mb-3" data-aos="zoom-in" data-aos-delay="800">
                        <div class="w-8 h-8 rounded-lg bg-blue-50 flex items-center justify-center flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-blue-600" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87L18.18 22 12 18.27 5.82 22 7 14.14l-5-4.87 6.91-1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"/>
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="text-sm font-semibold text-gray-900 truncate">{{ $top->jurusan->name }}</div>
                            <div class="text-xs text-gray-400">Rekomendasi Teratas</div>
                        </div>
                        <div class="text-right flex-shrink-0">
                            <div class="text-lg font-bold text-blue-600">{{ number_format($top->score, 2) }}</div>
                        </div>
                    </div>

                    {{-- Other Recommendations --}}
                    @if($others->count() > 0)
                        <div class="flex flex-col gap-2" data-aos="fade-up" data-aos-delay="900">
                            @php
                                $colors = ['bg-blue-400', 'bg-blue-300', 'bg-blue-200'];
                            @endphp
                            @foreach($others as $index => $rec)
                                @php
                                    $percentage = $maxScore > 0 ? ($rec->score / $maxScore) * 100 : 0;
                                    $barColor = $colors[$index] ?? 'bg-blue-200';
                                @endphp
                                <div data-aos="slide-right" data-aos-delay="{{ 1000 + ($index * 100) }}">
                                    <div class="flex justify-between text-xs text-gray-500 mb-1">
                                        <span class="truncate pr-2">{{ $rec->jurusan->name }}</span>
                                        <span class="font-medium text-gray-700 flex-shrink-0">{{ number_format($rec->score, 2) }}</span>
                                    </div>
                                    <div class="h-1.5 bg-gray-200 rounded-full overflow-hidden">
                                        <div class="h-1.5 {{ $barColor }} rounded-full transition-all duration-500" style="width: {{ $percentage }}%"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    {{-- CTA Button --}}
                    <a href="{{ route('student.hasil.index') }}" class="mt-3 w-full inline-flex items-center justify-center gap-2 px-3 py-2 bg-blue-600 text-white text-xs font-medium rounded-lg hover:bg-blue-700 transition-colors hover:shadow-lg transform hover:-translate-y-0.5" data-aos="bounce-in" data-aos-delay="1100">
                        Lihat Detail Lengkap
                    </a>
                </div>
            @endif

        </div>
</section>
@else
<section class="max-w-6xl mx-auto px-6 py-24 grid md:grid-cols-2 gap-12 items-center border border-blue-100 rounded-3xl bg-white shadow-sm" data-aos="fade-up" data-aos-duration="800">

    <div data-aos="fade-right" data-aos-delay="150" class="space-y-6">
        <span class="inline-flex items-center gap-1.5 bg-blue-50 text-blue-700 text-xs font-medium px-3 py-1.5 rounded-full border border-blue-100" data-aos="zoom-in" data-aos-delay="200">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
            </svg>
            SMK Negeri 22 Jakarta
        </span>

        <h1 class="mt-5 text-4xl font-bold text-gray-900 leading-tight" data-aos="fade-up" data-aos-delay="300">
            Temukan jurusan yang sesuai dengan
            <span class="text-blue-600"> minat dan kemampuanmu</span>
        </h1>

        <p class="mt-4 text-base text-gray-500 leading-relaxed" data-aos="fade-up" data-aos-delay="400">
            SIJURUSAN membantu calon peserta didik baru menentukan jurusan paling sesuai
            berdasarkan nilai akademik dan minat menggunakan metode
            <strong class="text-gray-700 font-medium">Simple Additive Weighting (SAW)</strong>.
        </p>

        <div class="mt-7 flex flex-wrap gap-3" data-aos="fade-up" data-aos-delay="500">
            <a href="{{ route('register') }}"
                class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg bg-blue-600 text-white text-sm font-medium hover:bg-blue-700 transition shadow-sm hover:shadow-lg transform hover:-translate-y-0.5">
                Mulai penjurusan
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M5 12l14 0" />
                    <path d="M13 18l6 -6" />
                    <path d="M13 6l6 6" />
                </svg>
            </a>
            <a href="#tentang"
                class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg border border-gray-200 text-gray-700 text-sm font-medium hover:bg-gray-50 transition hover:shadow-md">
                Pelajari lebih lanjut
            </a>
        </div>
    </div>

    {{-- Mock Dashboard --}}
    <div class="bg-gray-100 border border-blue-100 rounded-3xl p-5 flex flex-col gap-3 shadow-sm" data-aos="fade-left" data-aos-delay="250">

        <div class="flex items-center justify-between border-b border-blue-100 pb-3 mb-3" data-aos="fade-in" data-aos-delay="300">
            <span class="text-sm font-medium text-gray-800">Hasil rekomendasi</span>
            <span class="text-xs text-gray-400">2025 / 2026</span>
        </div>

        <div class="bg-white border border-gray-200 rounded-xl p-4 flex items-center gap-3" data-aos="zoom-in" data-aos-delay="400">
            <div class="w-9 h-9 rounded-lg bg-blue-50 flex items-center justify-center flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M3 5a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-14z" />
                    <path d="M6 8h.01" />
                    <path d="M6 12h.01" />
                    <path d="M6 16h.01" />
                    <path d="M10 8h8" />
                    <path d="M10 12h8" />
                    <path d="M10 16h8" />
                </svg>
            </div>
            <div class="flex-1">
                <div class="text-sm font-semibold text-gray-900">Rekayasa Perangkat Lunak</div>
                <div class="text-xs text-gray-400">Skor akhir SAW</div>
            </div>
            <div class="text-lg font-bold text-blue-600">0.91</div>
        </div>

        <div class="flex flex-col gap-2.5" data-aos="fade-up" data-aos-delay="500">
            @php
            $recommendations = [
            ['name' => 'Teknik Jaringan Komputer', 'score' => 0.84, 'width' => '84%', 'color' => 'bg-blue-400'],
            ['name' => 'Multimedia', 'score' => 0.76, 'width' => '76%', 'color' => 'bg-blue-300'],
            ['name' => 'Akuntansi dan Keuangan', 'score' => 0.61, 'width' => '61%', 'color' => 'bg-blue-200'],
            ];
            @endphp
            @foreach ($recommendations as $index => $rec)
            <div data-aos="slide-right" data-aos-delay="{{ 600 + ($index * 100) }}">
                <div class="flex justify-between text-xs text-gray-500 mb-1">
                    <span>{{ $rec['name'] }}</span>
                    <span class="font-medium text-gray-700">{{ $rec['score'] }}</span>
                </div>
                <div class="h-1.5 bg-gray-200 rounded-full">
                    <div class="h-1.5 {{ $rec['color'] }} rounded-full" style="width: {{ $rec['width'] }}"></div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="grid grid-cols-3 gap-2 mt-1" data-aos="fade-in" data-aos-delay="900">
            <div class="bg-white rounded-xl p-3 text-center border border-gray-200">
                <div class="text-xl font-bold text-blue-600">6</div>
                <div class="text-xs text-gray-400 mt-0.5">Jurusan</div>
            </div>
            <div class="bg-white rounded-xl p-3 text-center border border-gray-200">
                <div class="text-xl font-bold text-blue-600">4</div>
                <div class="text-xs text-gray-400 mt-0.5">Kriteria SAW</div>
            </div>
            <div class="bg-white rounded-xl p-3 text-center border border-gray-200">
                <div class="text-xl font-bold text-blue-600">98%</div>
                <div class="text-xs text-gray-400 mt-0.5">Akurasi</div>
            </div>
        </div>

    </div>
</section>
@endif

<div class="border-t border-gray-100"></div>

{{-- Tentang Sistem --}}
<section id="tentang" class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-6">

        <div class="text-center mb-10" data-aos="fade-up">
            <h2 class="text-2xl font-bold text-gray-900">Mengapa menggunakan SIJURUSAN?</h2>
            <p class="mt-3 text-sm text-gray-500 max-w-lg mx-auto leading-relaxed">
                Sistem berbasis data yang objektif untuk membantu calon peserta didik
                memilih jurusan secara tepat dan terukur.
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-5">

            <div class="bg-white border border-gray-100 rounded-2xl p-6 hover:shadow-md transition" data-aos="fade-up" data-aos-delay="200">
                <div class="w-9 h-9 rounded-lg bg-blue-50 flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M3 12m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v6a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                        <path d="M9 8m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v10a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                        <path d="M15 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v14a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                    </svg>
                </div>
                <h3 class="text-base font-semibold text-gray-900 mb-2">Berbasis data</h3>
                <p class="text-sm text-gray-500 leading-relaxed">
                    Rekomendasi dihasilkan dari nilai akademik dan hasil kuesioner minat siswa secara terukur dan transparan.
                </p>
            </div>

            <div class="bg-white border border-gray-100 rounded-2xl p-6 hover:shadow-md transition" data-aos="fade-up" data-aos-delay="300">
                <div class="w-9 h-9 rounded-lg bg-green-50 flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-600" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                        <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                    </svg>
                </div>
                <h3 class="text-base font-semibold text-gray-900 mb-2">Metode SAW</h3>
                <p class="text-sm text-gray-500 leading-relaxed">
                    Menggunakan Simple Additive Weighting untuk perangkingan jurusan secara objektif dengan bobot kriteria yang dapat dikonfigurasi.
                </p>
            </div>

            <div class="bg-white border border-gray-100 rounded-2xl p-6 hover:shadow-md transition" data-aos="fade-up" data-aos-delay="400">
                <div class="w-9 h-9 rounded-lg bg-amber-50 flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-amber-600" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                        <path d="M12 7a5 5 0 1 0 5 5" />
                        <path d="M18 3l0 4l-4 0" />
                        <path d="M18 7l-7.536 7.536" />
                    </svg>
                </div>
                <h3 class="text-base font-semibold text-gray-900 mb-2">Tepat sasaran</h3>
                <p class="text-sm text-gray-500 leading-relaxed">
                    Membantu siswa memilih jurusan sesuai potensi dan minat agar lebih siap dan termotivasi dalam belajar.
                </p>
            </div>

        </div>
    </div>
</section>

<div class="border-t border-gray-100"></div>

{{-- Cara Menggunakan --}}
<section id="cara" class="py-16">
    <div class="max-w-6xl mx-auto px-6">

        <div class="text-center mb-10" data-aos="fade-up">
            <h2 class="text-2xl font-bold text-gray-900">Cara menggunakan sistem</h2>
            <p class="mt-3 text-sm text-gray-500 max-w-md mx-auto">
                Empat langkah mudah untuk mendapatkan rekomendasi jurusan terbaikmu.
            </p>
        </div>

        <div class="grid md:grid-cols-4 gap-5">
            @php
            $steps = [
            ['num' => '1', 'title' => 'Registrasi', 'desc' => 'Buat akun baru menggunakan data diri yang valid dan lengkap.'],
            ['num' => '2', 'title' => 'Isi data', 'desc' => 'Masukkan nilai akademik dan informasi diri secara lengkap.'],
            ['num' => '3', 'title' => 'Isi kuesioner', 'desc' => 'Jawab pertanyaan minat sesuai kondisi dan keinginanmu.'],
            ['num' => '4', 'title' => 'Lihat hasil', 'desc' => 'Sistem memberikan rekomendasi jurusan terbaik berdasarkan skor SAW.'],
            ];
            @endphp

            @foreach ($steps as $index => $step)
            <div class="bg-gray-50 border border-gray-100 rounded-2xl p-5 text-center" data-aos="zoom-in" data-aos-delay="{{ 200 + ($index * 100) }}">
                <div class="w-9 h-9 rounded-full bg-blue-600 text-white text-sm font-semibold flex items-center justify-center mx-auto mb-4">
                    {{ $step['num'] }}
                </div>
                <h3 class="text-sm font-semibold text-gray-900 mb-2">{{ $step['title'] }}</h3>
                <p class="text-xs text-gray-500 leading-relaxed">{{ $step['desc'] }}</p>
            </div>
            @endforeach
        </div>

    </div>
</section>

{{-- CTA --}}
<section class="max-w-6xl mx-auto px-6 pb-16">
    <div class="bg-blue-600 rounded-2xl px-8 py-12 text-center" data-aos="fade-up">
        <h2 class="text-2xl font-bold text-white">Mulai tentukan jurusanmu sekarang</h2>
        <p class="mt-3 text-sm text-blue-200 max-w-md mx-auto leading-relaxed">
            Gunakan SIJURUSAN untuk mendapatkan rekomendasi yang sesuai
            dengan kemampuan dan minatmu.
        </p>
        <a href="{{ route('register') }}"
            class="inline-flex items-center gap-2 mt-7 px-6 py-2.5 bg-white text-blue-700 text-sm font-semibold rounded-lg hover:bg-blue-50 transition shadow-sm hover:shadow-lg transform hover:-translate-y-0.5" data-aos="bounce-in" data-aos-delay="300">
            Mulai sekarang
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M5 12l14 0" />
                <path d="M13 18l6 -6" />
                <path d="M13 6l6 6" />
            </svg>
        </a>
    </div>

    
</section>

@endsection