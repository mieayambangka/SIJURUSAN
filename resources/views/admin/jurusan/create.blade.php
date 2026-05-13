
<x-admin-layout title="Tambah jurusan"  subtitle="Buat jurusan baru sebelum mengatur bobot dan pertanyaan">
        <div class="rounded-3xl bg-white p-6 border border-slate-200 shadow-sm mb-6">
            <p class="text-sm text-slate-500">Isi informasi jurusan baru. Setelah menyimpan, lanjutkan ke pengaturan bobot untuk menentukan kriteria penjurusan.</p>
     
    <div class="rounded-3xl bg-white p-6 border border-slate-200 shadow-sm">
        <form action="{{ route('admin.jurusan.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-medium text-slate-700">Nama Jurusan</label>
                <input type="text" name="name" value="{{ old('name') }}" class="mt-2 w-full rounded-2xl border border-slate-300 bg-slate-50 px-4 py-3" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700">Deskripsi</label>
                <textarea name="description" class="mt-2 w-full rounded-2xl border border-slate-300 bg-slate-50 px-4 py-3" rows="4">{{ old('description') }}</textarea>
            </div>

            <div class="flex items-center gap-3">
                <label class="inline-flex items-center gap-2">
                    <input type="checkbox" name="active" value="1" {{ old('active', true) ? 'checked' : '' }} class="h-4 w-4 text-indigo-600 border-slate-300 rounded">
                    <span class="text-sm text-slate-700">Aktif</span>
                </label>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('admin.jurusan.index') }}" class="rounded-full border border-slate-300 px-5 py-2 text-sm text-slate-700 hover:bg-slate-50">Kembali</a>
                <button type="submit" class="rounded-full bg-indigo-600 px-5 py-2 text-sm font-semibold text-white hover:bg-indigo-700">Simpan Jurusan</button>
            </div>
        </form>
    </div>
</x-admin-layout>