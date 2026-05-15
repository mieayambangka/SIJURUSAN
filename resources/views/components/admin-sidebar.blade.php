<aside class="w-72 bg-slate-950 text-slate-100 min-h-screen">
    <div class="px-6 py-5 border-b border-slate-800">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
            <div class="h-10 w-10 rounded-xl bg-indigo-500 flex items-center justify-center text-white">BK</div>
            <div>
                <div class="font-bold">SPK SMK</div>
                <div class="text-xs text-slate-400">Admin Panel</div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit"
                        class="text-sm text-gray-500 hover:text-gray-800 transition">
                        Logout
                    </button>
                </form>
            </div>
        </a>
       
    </div>

    <nav class="px-4 py-6 space-y-2">
        <a href="{{ route('admin.dashboard') }}" class="group block rounded-xl px-4 py-3 text-sm font-medium {{ request()->routeIs('admin.dashboard') ? 'bg-slate-800 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
            Dashboard
        </a>
        <a href="{{ route('admin.jurusan.index') }}" class="group block rounded-xl px-4 py-3 text-sm font-medium {{ request()->routeIs('admin.jurusan.*') ? 'bg-slate-800 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
            Jurusan
        </a>
        <a href="{{ route('admin.kriteria.index') }}" class="group block rounded-xl px-4 py-3 text-sm font-medium {{ request()->routeIs('admin.kriteria.*') ? 'bg-slate-800 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
            Kriteria
        </a>
        <a href="{{ route('admin.bobot.index') }}" class="group block rounded-xl px-4 py-3 text-sm font-medium {{ request()->routeIs('admin.bobot.*') ? 'bg-slate-800 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
            Bobot Jurusan
        </a>
        <a href="{{ route('admin.pertanyaan.index') }}" class="group block rounded-xl px-4 py-3 text-sm font-medium {{ request()->routeIs('admin.pertanyaan.*') ? 'bg-slate-800 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
            Pertanyaan Kuisioner
        </a>
        <a href="{{ route('admin.siswa.index') }}" class="group block rounded-xl px-4 py-3 text-sm font-medium {{ request()->routeIs('admin.siswa.*') ? 'bg-slate-800 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
            Siswa
        </a>
        <a href="{{ route('admin.hasil.index') }}" class="group block rounded-xl px-4 py-3 text-sm font-medium {{ request()->routeIs('admin.hasil.*') ? 'bg-slate-800 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
            Hasil Rekomendasi
        </a>
        <a href="{{ route('admin.users.index') }}" class="group block rounded-xl px-4 py-3 text-sm font-medium {{ request()->routeIs('admin.users.*') ? 'bg-slate-800 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
            Kelola User
        </a>
    </nav>

    <div class="mt-auto px-6 py-5 border-t border-slate-800 text-xs text-slate-500">
        Alur: Jurusan → Bobot → Pertanyaan
    </div>
</aside>