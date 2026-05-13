<x-admin-layout title="Daftar Siswa"  subtitle="Lihat semua siswa yang telah terdaftar dalam sistem">
    <div class="grid gap-4">
        @foreach($siswa as $user)
            <div class="rounded-3xl bg-white p-5 border border-slate-200 shadow-sm flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <div class="text-lg font-semibold text-slate-900">{{ $user->name }}</div>
                    <div class="text-sm text-slate-500">{{ $user->email }}</div>
                    <div class="mt-2 text-xs text-slate-500">Nilai: {{ $user->nilai_siswas_count }} • Jawaban: {{ $user->jawaban_siswas_count }} • Rekomendasi: {{ $user->hasil_rekomendasis_count }}</div>
                </div>
                <a href="{{ route('admin.siswa.show', $user) }}" class="rounded-full bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700">Lihat Detail</a>
            </div>
        @endforeach
    </div>

    <div class="mt-6">{{ $siswa->links() }}</div>
</x-admin-layout>