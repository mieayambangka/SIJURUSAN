
<x-admin-layout title="Tambah Kriteria"  subtitle="Tambahkan kriteria baru untuk digunakan dalam bobot jurusan">
        <div class="rounded-3xl bg-white p-6 border border-slate-200 shadow-sm mb-6">
            <p class="text-sm text-slate-500">Isi informasi kriteria baru. Pastikan untuk menentukan tipe data dan nilai maksimum yang sesuai.</p>
    <div class="rounded-3xl bg-white p-6 border border-slate-200 shadow-sm">
        <form action="{{ route('admin.kriteria.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-medium text-slate-700">Nama Kriteria</label>
                <input type="text" name="name" value="{{ old('name') }}" class="mt-2 w-full rounded-2xl border border-slate-300 bg-slate-50 px-4 py-3" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700">Tipe Kriteria</label>
                <select name="data_source" class="mt-2 w-full rounded-2xl border border-slate-300 bg-slate-50 px-4 py-3" required>
                    <option value="academic" {{ old('data_source') === 'academic' ? 'selected' : '' }}>Akademik</option>
                    <option value="questionnaire" {{ old('data_source') === 'questionnaire' ? 'selected' : '' }}>Minat / Kuisioner</option>
                    <option value="manual" {{ old('data_source') === 'manual' ? 'selected' : '' }}>Manual</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700">Nilai Maksimum</label>
                <input type="number" name="max_value" value="{{ old('max_value', 100) }}" min="1" class="mt-2 w-full rounded-2xl border border-slate-300 bg-slate-50 px-4 py-3" required>
            </div>

            <div class="flex items-center gap-3">
                <label class="inline-flex items-center gap-2">
                    <input type="checkbox" name="is_benefit" value="1" {{ old('is_benefit', true) ? 'checked' : '' }} class="h-4 w-4 text-indigo-600 border-slate-300 rounded">
                    <span class="text-sm text-slate-700">Benefit (semakin besar semakin baik)</span>
                </label>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('admin.kriteria.index') }}" class="rounded-full border border-slate-300 px-5 py-2 text-sm text-slate-700 hover:bg-slate-50">Kembali</a>
                <button type="submit" class="rounded-full bg-indigo-600 px-5 py-2 text-sm font-semibold text-white hover:bg-indigo-700">Simpan Kriteria</button>
            </div>
        </form>
    </div>
</x-admin-layout>
