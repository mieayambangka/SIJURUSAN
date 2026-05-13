
<x-admin-layout title="Detail jurusan"  subtitle="Informasi lengkap jurusan serta kriteria dan pertanyaan terkait">
    <div class="rounded-3xl bg-white p-6 border border-slate-200 shadow-sm mb-6">
        <div class="grid gap-4 sm:grid-cols-2">
            <div>
                <div class="text-xs uppercase tracking-[0.2em] text-slate-500">Jurusan</div>
                <div class="mt-2 text-2xl font-semibold text-slate-900">{{ $jurusan->name }}</div>
                <p class="mt-3 text-sm text-slate-500">{{ $jurusan->description }}</p>
            </div>
            <div>
                <div class="text-xs uppercase tracking-[0.2em] text-slate-500">Status</div>
                <div class="mt-2 text-lg text-slate-700">{{ $jurusan->active ? 'Aktif' : 'Nonaktif' }}</div>
                <div class="mt-4">
                    <a href="{{ route('admin.bobot.edit', $jurusan) }}" class="rounded-full bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700">Atur Bobot</a>
                </div>
            </div>
        </div>
    </div>

    <div class="grid gap-6 xl:grid-cols-2">
        <section class="rounded-3xl bg-white p-6 border border-slate-200 shadow-sm">
            <h2 class="text-lg font-semibold text-slate-900 mb-4">Kriteria Terpasang</h2>
            <div class="space-y-3">
                @forelse($jurusan->kriterias as $kriteria)
                    <div class="rounded-2xl border border-slate-200 p-4">
                        <div class="font-semibold text-slate-900">{{ $kriteria->name }}</div>
                        <div class="text-sm text-slate-500">Bobot: {{ $kriteria->pivot->weight ?? 0 }}%</div>
                    </div>
                @empty
                    <div class="text-sm text-slate-500">Belum ada kriteria terpasang.</div>
                @endforelse
            </div>
        </section>

        <section class="rounded-3xl bg-white p-6 border border-slate-200 shadow-sm">
            <h2 class="text-lg font-semibold text-slate-900 mb-4">Pertanyaan Terkait</h2>
            <div class="space-y-3">
                @forelse($jurusan->pertanyaans as $pertanyaan)
                    <div class="rounded-2xl border border-slate-200 p-4">
                        <div class="font-semibold text-slate-900">{{ $pertanyaan->question }}</div>
                        <div class="text-sm text-slate-500">Status: {{ $pertanyaan->active ? 'Aktif' : 'Nonaktif' }}</div>
                    </div>
                @empty
                    <div class="text-sm text-slate-500">Belum ada pertanyaan untuk jurusan ini.</div>
                @endforelse
            </div>
        </section>
    </div>
</x-admin-layout>
