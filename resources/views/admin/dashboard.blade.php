<x-admin-layout title="Dashboard Admin" subtitle="Ringkasan konfigurasi SPK dan hasil rekomendasi siswa">

    {{-- STAT CARDS --}}
    <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">

        {{-- Jurusan --}}
        <div
            class="group relative rounded-3xl bg-gradient-to-br from-indigo-600 to-indigo-500 p-6 shadow-lg shadow-indigo-200 overflow-hidden">
            <div class="absolute -right-4 -top-4 w-24 h-24 rounded-full bg-white/10"></div>
            <div class="absolute -right-2 -bottom-6 w-32 h-32 rounded-full bg-white/5"></div>
            <div class="relative">
                <div class="inline-flex items-center justify-center w-10 h-10 rounded-2xl bg-white/20 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                    </svg>
                </div>
                <div class="text-3xl font-bold text-white">{{ $stats['jurusan'] }}</div>
                <div class="mt-1 text-sm font-medium text-indigo-100">Jurusan Tersedia</div>
            </div>
        </div>

        {{-- Siswa --}}
        <div
            class="group relative rounded-3xl bg-white p-6 border border-slate-200 shadow-sm overflow-hidden hover:shadow-md transition-shadow">
            <div class="absolute -right-4 -top-4 w-24 h-24 rounded-full bg-slate-50"></div>
            <div class="relative">
                <div class="inline-flex items-center justify-center w-10 h-10 rounded-2xl bg-emerald-50 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-emerald-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <div class="text-3xl font-bold text-slate-900">{{ $stats['siswa'] }}</div>
                <div class="mt-1 text-sm font-medium text-slate-500">Total Siswa</div>
            </div>
        </div>

        {{-- Pertanyaan --}}
        <div
            class="group relative rounded-3xl bg-white p-6 border border-slate-200 shadow-sm overflow-hidden hover:shadow-md transition-shadow">
            <div class="absolute -right-4 -top-4 w-24 h-24 rounded-full bg-slate-50"></div>
            <div class="relative">
                <div class="inline-flex items-center justify-center w-10 h-10 rounded-2xl bg-amber-50 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-amber-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="text-3xl font-bold text-slate-900">{{ $stats['pertanyaan'] }}</div>
                <div class="mt-1 text-sm font-medium text-slate-500">Pertanyaan Kuisioner</div>
            </div>
        </div>

        {{-- Rekomendasi --}}
        <div
            class="group relative rounded-3xl bg-white p-6 border border-slate-200 shadow-sm overflow-hidden hover:shadow-md transition-shadow">
            <div class="absolute -right-4 -top-4 w-24 h-24 rounded-full bg-slate-50"></div>
            <div class="relative">
                <div class="inline-flex items-center justify-center w-10 h-10 rounded-2xl bg-rose-50 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-rose-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                </div>
                <div class="text-3xl font-bold text-slate-900">{{ $stats['hasil_rekomendasi'] }}</div>
                <div class="mt-1 text-sm font-medium text-slate-500">Hasil Rekomendasi</div>
            </div>
        </div>

    </div>

    {{-- BOTTOM SECTION --}}
    <div class="mt-6 grid gap-6 xl:grid-cols-2">

        {{-- Top Jurusan --}}
        <section class="rounded-3xl bg-white p-6 border border-slate-200 shadow-sm">

            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-base font-semibold text-slate-900">Top Jurusan</h2>
                    <p class="text-xs text-slate-400 mt-0.5">Berdasarkan jumlah rekomendasi</p>
                </div>
                <div class="w-8 h-8 rounded-xl bg-indigo-50 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-indigo-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                    </svg>
                </div>
            </div>

            <div class="space-y-3">
                @forelse($topJurusan as $index => $jurusan)
                    <div class="flex items-center gap-4 p-3 rounded-2xl hover:bg-slate-50 transition">
                        <div @class([
                            'w-8 h-8 rounded-xl flex items-center justify-center text-xs font-bold flex-shrink-0',
                            'bg-indigo-600 text-white' => $index === 0,
                            'bg-slate-100 text-slate-600' => $index !== 0,
                        ])>
                            {{ $index + 1 }}
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="text-sm font-medium text-slate-900 truncate">{{ $jurusan->name }}</div>
                            <div class="mt-1.5 w-full bg-slate-100 rounded-full h-1.5">
                                <div class="bg-indigo-500 h-1.5 rounded-full"
                                    style="width: {{ $topJurusan->first()->hasil_rekomendasis_count > 0 ? ($jurusan->hasil_rekomendasis_count / $topJurusan->first()->hasil_rekomendasis_count) * 100 : 0 }}%">
                                </div>
                            </div>
                        </div>
                        <div class="text-sm font-semibold text-slate-700 flex-shrink-0">
                            {{ $jurusan->hasil_rekomendasis_count }}
                            <span class="text-xs font-normal text-slate-400">kali</span>
                        </div>
                    </div>
                @empty
                    <div class="py-8 text-center text-sm text-slate-400">Belum ada data rekomendasi.</div>
                @endforelse
            </div>

        </section>

        {{-- Rekomendasi Terakhir --}}
        <section class="rounded-3xl bg-white p-6 border border-slate-200 shadow-sm">

            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-base font-semibold text-slate-900">Rekomendasi Terakhir</h2>
                    <p class="text-xs text-slate-400 mt-0.5">Aktivitas rekomendasi terbaru</p>
                </div>
                <div class="w-8 h-8 rounded-xl bg-emerald-50 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-emerald-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>

            <div class="space-y-3">
                @forelse($recentRecommendations as $item)
                    <div class="flex items-start gap-3 p-3 rounded-2xl hover:bg-slate-50 transition">

                        {{-- Avatar --}}
                        <div
                            class="w-8 h-8 rounded-xl bg-indigo-100 flex items-center justify-center text-xs font-bold text-indigo-600 flex-shrink-0">
                            {{ strtoupper(substr($item->user->name, 0, 1)) }}
                        </div>

                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-1.5 flex-wrap">
                                <span
                                    class="text-sm font-medium text-slate-900 truncate">{{ $item->user->name }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 text-slate-400 flex-shrink-0"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                                <span
                                    class="text-sm text-indigo-600 font-medium truncate">{{ $item->jurusan->name }}</span>
                            </div>
                            <div class="mt-1 flex items-center gap-3">
                                <span class="text-xs text-slate-400">Skor: <span
                                        class="text-slate-600 font-medium">{{ $item->score }}</span></span>
                                <span class="text-xs text-slate-400">Rank: <span
                                        class="text-slate-600 font-medium">#{{ $item->rank }}</span></span>
                            </div>
                        </div>

                        <div class="text-xs text-slate-400 flex-shrink-0">{{ $item->created_at->diffForHumans() }}
                        </div>

                    </div>
                @empty
                    <div class="py-8 text-center text-sm text-slate-400">Belum ada data rekomendasi terbaru.</div>
                @endforelse
            </div>

        </section>

    </div>

</x-admin-layout>
