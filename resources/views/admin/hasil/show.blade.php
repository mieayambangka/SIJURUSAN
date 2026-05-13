
<x-admin-layout title="Rincian Hasil Rekomendasi"  subtitle="Detail ranking jurusan SAW untuk siswa terpilih">
     <div class="rounded-3xl bg-white p-6 border border-slate-200 shadow-sm mb-6">
        <p class="text-sm text-slate-500">Siswa: {{ $user->name }} ({{ $user->email }})</p>
    </div>
    <!-- <div class="rounded-3xl bg-white p-6 border border-slate-200 shadow-sm mb-6">
        <div class="text-sm text-slate-500">Siswa: {{ $user->name }} ({{ $user->email }})</div>
    </div> -->

    <div class="space-y-4">
        @forelse($recommendations as $item)
            <div class="rounded-3xl bg-white p-5 border border-slate-200 shadow-sm">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <div class="font-semibold text-slate-900">Rank {{ $item->rank }} - {{ $item->jurusan->name }}</div>
                        <div class="text-sm text-slate-500">Skor SAW: {{ $item->score }}</div>
                    </div>
                </div>
            </div>
        @empty
            <div class="rounded-3xl bg-white p-5 border border-slate-200 shadow-sm text-sm text-slate-500">Belum ada hasil rekomendasi untuk siswa ini.</div>
        @endforelse
    </div>
</x-admin-layout>