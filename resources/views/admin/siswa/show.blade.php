<x-admin-layout title="Rincian Siswa"  subtitle="Detail informasi siswa, nilai akademik, jawaban kuisioner, dan hasil rekomendasi">
    <div class="rounded-3xl bg-white p-6 border border-slate-200 shadow-sm mb-6">
        <div class="grid gap-3 sm:grid-cols-2">
            <div>
                <div class="text-xs uppercase tracking-[0.2em] text-slate-500">Nama</div>
                <div class="mt-2 text-lg font-semibold text-slate-900">{{ $user->name }}</div>
            </div>
            <div>
                <div class="text-xs uppercase tracking-[0.2em] text-slate-500">Email</div>
                <div class="mt-2 text-lg text-slate-700">{{ $user->email }}</div>
            </div>
        </div>
    </div>

    <div class="grid gap-6 xl:grid-cols-2">
        <section class="rounded-3xl bg-white p-6 border border-slate-200 shadow-sm">
            <h2 class="text-lg font-semibold text-slate-900 mb-4">Nilai Akademik</h2>
            <div class="space-y-3">
                @forelse($user->nilaiSiswas as $nilai)
                    <div class="rounded-2xl border border-slate-200 p-4">
                        <div class="font-semibold text-slate-900">{{ $nilai->kriteria->name }}</div>
                        <div class="text-sm text-slate-500">Nilai raw: {{ $nilai->raw_value }}</div>
                    </div>
                @empty
                    <div class="text-sm text-slate-500">Belum ada nilai akademik.</div>
                @endforelse
            </div>
        </section>

        <section class="rounded-3xl bg-white p-6 border border-slate-200 shadow-sm">
            <h2 class="text-lg font-semibold text-slate-900 mb-4">Jawaban Kuisioner</h2>
            <div class="space-y-3">
                @forelse($user->jawabanSiswas as $jawaban)
                    <div class="rounded-2xl border border-slate-200 p-4">
                        <div class="font-semibold text-slate-900">{{ $jawaban->pertanyaan->question }}</div>
                        <div class="text-sm text-slate-500">Jurusan: {{ $jawaban->pertanyaan->jurusan->name }}</div>
                        <div class="mt-2 text-sm text-slate-700">Skor: {{ $jawaban->score }}/5</div>
                    </div>
                @empty
                    <div class="text-sm text-slate-500">Belum ada jawaban kuisioner.</div>
                @endforelse
            </div>
        </section>
    </div>

    <div class="rounded-3xl bg-white p-6 border border-slate-200 shadow-sm mt-6">
        <h2 class="text-lg font-semibold text-slate-900 mb-4">Hasil Rekomendasi</h2>
        <div class="space-y-3">
            @forelse($user->hasilRekomendasis as $item)
                <div class="rounded-2xl border border-slate-200 p-4">
                    <div class="font-semibold text-slate-900">{{ $item->jurusan->name }}</div>
                    <div class="text-sm text-slate-500">Skor SAW: {{ $item->score }} • Rank: {{ $item->rank }}</div>
                </div>
            @empty
                <div class="text-sm text-slate-500">Belum ada hasil rekomendasi.</div>
            @endforelse
        </div>
    </div>
</x-admin-layout>
