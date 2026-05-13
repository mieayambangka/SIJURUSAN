
<x-admin-layout title="Bobot Jurusan"  subtitle="Pilih kriteria dan tetapkan bobot setiap jurusan">
    <div class="rounded-3xl bg-white p-6 border border-slate-200 shadow-sm mb-6">
        <p class="text-sm text-slate-500">Alur konfigurasi: buat jurusan > pilih kriteria > atur bobot sampai total 100%.</p>
    </div>

    <div class="grid gap-4">
        @foreach($jurusans as $jurusan)
            <div class="rounded-3xl bg-white p-5 border border-slate-200 shadow-sm flex items-center justify-between gap-4">
                <div>
                    <div class="text-lg font-semibold text-slate-900">{{ $jurusan->name }}</div>
                    <div class="text-sm text-slate-500">{{ $jurusan->kriterias_count }} kriteria terpilih</div>
                </div>
                <a href="{{ route('admin.bobot.edit', $jurusan) }}" class="rounded-full bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700">Atur Bobot</a>
            </div>
        @endforeach
    </div>
</x-admin-layout>
