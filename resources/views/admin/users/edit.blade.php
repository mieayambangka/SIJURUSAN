<x-admin-layout title="Edit User" subtitle="Ubah data akun pengguna">
    <div class="mb-6">
        <a href="{{ route('admin.users.index') }}"
           class="inline-flex items-center text-sm text-slate-500 hover:text-slate-700 gap-1">
            ← Kembali ke daftar user
        </a>
    </div>

    <div class="rounded-3xl bg-white border border-slate-200 shadow-sm p-6">
        <h2 class="text-lg font-semibold text-slate-900 mb-1">Edit User</h2>
        <p class="text-sm text-slate-500 mb-6">Kosongkan field password jika tidak ingin mengubah password.</p>

        @if($errors->any())
            <div class="mb-4 rounded-2xl bg-rose-50 border border-rose-200 px-4 py-3 text-sm text-rose-700 space-y-1">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('admin.users.update', $user) }}" class="space-y-4">
            @csrf
            @method('PUT')

            {{-- Nama --}}
            <div>
                <label for="name" class="block text-sm font-medium text-slate-700 mb-1">Nama Lengkap</label>
                <input type="text"
                       id="name"
                       name="name"
                       value="{{ old('name', $user->name) }}"
                       placeholder="Masukkan nama lengkap"
                       class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm text-slate-900 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('name') border-rose-400 @enderror">
            </div>

            {{-- Email --}}
            <div>
                <label for="email" class="block text-sm font-medium text-slate-700 mb-1">Email</label>
                <input type="email"
                       id="email"
                       name="email"
                       value="{{ old('email', $user->email) }}"
                       placeholder="contoh@email.com"
                       class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm text-slate-900 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('email') border-rose-400 @enderror">
            </div>

            {{-- Role --}}
            <div>
                <label for="role" class="block text-sm font-medium text-slate-700 mb-1">Role</label>
                <select id="role"
                        name="role"
                        class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm text-slate-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('role') border-rose-400 @enderror">
                    <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="siswa" {{ old('role', $user->role) === 'siswa' ? 'selected' : '' }}>Siswa</option>
                </select>
            </div>

            {{-- Password baru (opsional) --}}
            <div>
                <label for="password" class="block text-sm font-medium text-slate-700 mb-1">
                    Password Baru
                    <span class="text-slate-400 font-normal">(opsional)</span>
                </label>
                <input type="password"
                       id="password"
                       name="password"
                       placeholder="Kosongkan jika tidak ingin mengubah"
                       class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm text-slate-900 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('password') border-rose-400 @enderror">
            </div>

            {{-- Konfirmasi Password --}}
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-slate-700 mb-1">Konfirmasi Password Baru</label>
                <input type="password"
                       id="password_confirmation"
                       name="password_confirmation"
                       placeholder="Ulangi password baru"
                       class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm text-slate-900 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
            </div>

            <div class="flex items-center gap-3 pt-2">
                <button type="submit"
                        class="rounded-full bg-indigo-600 px-6 py-2.5 text-sm font-semibold text-white hover:bg-indigo-700">
                    Update User
                </button>
                <a href="{{ route('admin.users.index') }}"
                   class="rounded-full border border-slate-300 px-6 py-2.5 text-sm text-slate-700 hover:bg-slate-50">
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-admin-layout>
