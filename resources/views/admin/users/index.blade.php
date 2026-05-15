<x-admin-layout title="Kelola User" subtitle="Tambah dan kelola akun pengguna sistem">
    <div class="flex items-center justify-between gap-4 mb-6">
        <div>
            <h2 class="text-lg font-semibold text-slate-900">Data User</h2>
            <p class="text-sm text-slate-500">Kelola akun admin dan siswa yang terdaftar di sistem.</p>
        </div>
        <a href="{{ route('admin.users.create') }}"
           class="inline-flex items-center rounded-full bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700">
            Tambah User
        </a>
    </div>

    {{-- Flash message success --}}
    @if(session('success'))
        <div class="mb-4 rounded-2xl bg-emerald-50 border border-emerald-200 px-4 py-3 text-sm text-emerald-700">
            {{ session('success') }}
        </div>
    @endif

    {{-- Flash message error --}}
    @if(session('error'))
        <div class="mb-4 rounded-2xl bg-rose-50 border border-rose-200 px-4 py-3 text-sm text-rose-700">
            {{ session('error') }}
        </div>
    @endif

    <div class="space-y-4">
        @forelse($users as $user)
            <div class="rounded-3xl bg-white p-5 border border-slate-200 shadow-sm flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                <div>
                    <div class="flex items-center gap-3">
                        <p class="text-base font-semibold text-slate-900">{{ $user->name }}</p>
                        <span @class([
                            'inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium',
                            'bg-indigo-100 text-indigo-700' => $user->role === 'admin',
                            'bg-slate-100 text-slate-600'   => $user->role === 'siswa',
                        ])>
                            {{ ucfirst($user->role) }}
                        </span>
                        @if($user->id === auth()->id())
                            <span class="inline-flex items-center rounded-full bg-amber-100 text-amber-700 px-2.5 py-0.5 text-xs font-medium">
                                Anda
                            </span>
                        @endif
                    </div>
                    <p class="text-sm text-slate-500 mt-1">{{ $user->email }}</p>
                    <p class="mt-2 text-xs text-slate-400">Bergabung {{ $user->created_at->diffForHumans() }}</p>
                </div>

                <div class="flex flex-wrap justify-end items-center gap-2 flex-shrink-0 lg:ml-auto">
                    <a href="{{ route('admin.users.edit', $user) }}"
                       class="rounded-full border border-slate-300 px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 whitespace-nowrap">
                        Edit
                    </a>

                    @if($user->id !== auth()->id())
                        <form method="POST" action="{{ route('admin.users.destroy', $user) }}" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="rounded-full bg-rose-500 px-4 py-2 text-sm text-white hover:bg-rose-600 whitespace-nowrap"
                                    onclick="return confirm('Hapus user {{ $user->name }}?')">
                                Hapus
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        @empty
            <div class="rounded-3xl bg-white p-10 border border-slate-200 text-center text-slate-400 text-sm">
                Belum ada user yang terdaftar.
            </div>
        @endforelse
    </div>

    <div class="mt-6">
        {{ $users->links() }}
    </div>
</x-admin-layout>
