
<x-admin-layout title="Hasil Rekomendasi"  subtitle="Lihat ranking jurusan untuk setiap siswa berdasarkan SAW">
     <div class="rounded-3xl bg-white p-6 border border-slate-200 shadow-sm mb-6">
        <p class="text-sm text-slate-500">Hasil rekomendasi jurusan untuk setiap siswa berdasarkan metode SAW. Klik "Lihat Siswa" untuk detail lengkap.</p>
    <div class="space-y-4">
        @foreach($recommendations as $item)
            <div class="rounded-3xl bg-white p-5 border border-slate-200 shadow-sm flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <div class="font-semibold text-slate-900">{{ $item->user->name }} • {{ $item->jurusan->name }}</div>
                    <div class="text-sm text-slate-500">Skor: {{ $item->score }} • Rangking: {{ $item->rank }}</div>
                </div>
                <a href="{{ route('admin.hasil.show', $item->user) }}" class="rounded-full bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700">Lihat Siswa</a>
            </div>
        @endforeach
    </div>

    <div class="mt-6">{{ $recommendations->links() }}</div>
</x-admin-layout>
