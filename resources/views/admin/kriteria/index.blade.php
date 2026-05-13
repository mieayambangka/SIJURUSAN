
<x-admin-layout title="Kriteria"  subtitle="Kelola kriteria untuk penjurusan siswa"> 
    <div class="flex items-center justify-between gap-4 mb-6">
        <div>
            <h2 class="text-lg font-semibold text-slate-900">Data Kriteria</h2>
            <p class="text-sm text-slate-500">Tentukan kriteria yang akan digunakan untuk setiap jurusan.</p>
        </div>
        <a href="{{ route('admin.kriteria.create') }}" class="inline-flex items-center rounded-full bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700">
            Tambah Kriteria
        </a>
    </div>

    <div class="grid gap-4">
        @foreach($kriterias as $kriteria)
            <div class="rounded-3xl bg-white p-5 border border-slate-200 shadow-sm flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
                <div>
                    <div class="text-xl font-semibold text-slate-900">{{ $kriteria->name }}</div>
                    <div class="text-sm text-slate-500">{{ ucfirst($kriteria->data_source) }} – Maksimal {{ $kriteria->max_value }}</div>
                </div>
                <div class="flex flex-wrap items-center gap-2">
                    <a href="{{ route('admin.kriteria.edit', $kriteria->id) }}" class="rounded-full border border-slate-300 px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">Edit</a>
                    <form method="POST" action="{{ route('admin.kriteria.destroy', $kriteria) }}" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="rounded-full bg-rose-500 px-4 py-2 text-sm text-white hover:bg-rose-600" onclick="return confirm('Hapus kriteria ini?')">Hapus</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-6">{{ $kriterias->links() }}</div>

</x-admin-layout>