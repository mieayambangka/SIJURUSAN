@extends('layouts.student')

@section('content')

<div class="min-h-screen bg-gray-50 py-10">

    <div class="max-w-4xl mx-auto px-6">

        {{-- Card --}}
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">

            {{-- Header --}}
            <div class="px-8 py-6 border-b border-gray-100">

                <h1 class="text-2xl font-bold text-gray-900">
                    Profile Saya
                </h1>

                <p class="text-sm text-gray-500 mt-1">
                    Kelola informasi akun Anda.
                </p>

            </div>

            {{-- Form --}}
            <form method="POST"
                  action="{{ route('profile.update') }}"
                  enctype="multipart/form-data"
                  class="p-8">

                @csrf
                @method('PATCH')

                <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

                    {{-- Avatar --}}
                    <div class="flex flex-col items-center">

                        @if(Auth::user()->avatar)

                            <img
                                src="{{ asset('storage/img-user/' . Auth::user()->avatar) }}"
                                alt="Avatar"
                                class="w-40 h-40 rounded-3xl object-cover border border-gray-200 shadow-sm"
                            >

                        @else

                            <img
                                src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=2563eb&color=fff&size=256"
                                alt="Avatar"
                                class="w-40 h-40 rounded-3xl object-cover border border-gray-200 shadow-sm"
                            >

                        @endif

                        <div class="w-full mt-5">

                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Foto Profile
                            </label>

                            <input
                                type="file"
                                name="avatar"
                                class="block w-full text-sm text-gray-500
                                       file:mr-4 file:py-2 file:px-4
                                       file:rounded-xl file:border-0
                                       file:text-sm file:font-medium
                                       file:bg-blue-50 file:text-blue-600
                                       hover:file:bg-blue-100"
                            >

                            @error('avatar')

                                <p class="text-sm text-red-500 mt-2">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>

                    </div>

                    {{-- Form Input --}}
                    <div class="md:col-span-2 space-y-6">

                        {{-- Name --}}
                        <div>

                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Nama
                            </label>

                            <input
                                type="text"
                                name="name"
                                value="{{ old('name', Auth::user()->name) }}"
                                class="w-full rounded-2xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                required
                            >

                            @error('name')

                                <p class="text-sm text-red-500 mt-2">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>

                        {{-- Email --}}
                        <div>

                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Email
                            </label>

                            <input
                                type="email"
                                name="email"
                                value="{{ old('email', Auth::user()->email) }}"
                                class="w-full rounded-2xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                required
                            >

                            @error('email')

                                <p class="text-sm text-red-500 mt-2">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>

                        {{-- Password --}}
                        <div>

                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Password Baru
                            </label>

                            <input
                                type="password"
                                name="password"
                                placeholder="Kosongkan jika tidak ingin mengganti password"
                                class="w-full rounded-2xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                            >

                            @error('password')

                                <p class="text-sm text-red-500 mt-2">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>

                        {{-- Button --}}
                        <div class="pt-4">

                            <button
                                type="submit"
                                class="px-6 py-3 rounded-2xl bg-blue-600 text-white font-medium hover:bg-blue-700 transition">

                                Simpan Perubahan

                            </button>

                        </div>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection