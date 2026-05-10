{{-- resources/views/auth/register.blade.php --}}

@extends('layouts.guest')

@section('content')

<section class="min-h-screen grid lg:grid-cols-2">

    {{-- LEFT : Illustration --}}
    <div class="hidden lg:flex items-center justify-center bg-gray-50 overflow-hidden">

        <div class="w-full max-w-xl px-8">

            {{-- Back Button --}}
            <div class="flex justify-start mb-6 -translate-y-20">

                <a href="{{ route('welcome') }}"
                   title="Kembali ke Beranda"
                   class="group inline-flex items-center gap-2
                          text-sm text-gray-500 hover:text-blue-600
                          transition">

                    <div class="w-10 h-10 rounded-full border border-gray-300
                                flex items-center justify-center
                                group-hover:border-blue-600 transition">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-5 h-5"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M9 5l7 7-7 7" />

                        </svg>

                    </div>

                    <span class="font-medium">
                        Beranda
                    </span>

                </a>

            </div>

            {{-- Illustration --}}
            <div>

                <img
                    src="{{ asset('Learning-bro (1).png') }}"
                    alt="Siswa SMK"
                    class="w-full object-contain"
                >

            </div>
             {{-- Feature pills --}}
            <div class="flex flex-wrap justify-center gap-2 mt-8">
                <span class="inline-flex items-center gap-1.5 bg-white border border-gray-200 text-gray-600 text-xs font-medium px-3 py-1.5 rounded-full shadow-sm">
                    <svg class="w-3.5 h-3.5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                    </svg>
                    Berbasis Metode SAW
                </span>
                <span class="inline-flex items-center gap-1.5 bg-white border border-gray-200 text-gray-600 text-xs font-medium px-3 py-1.5 rounded-full shadow-sm">
                    <svg class="w-3.5 h-3.5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                    </svg>
                    Hasil Akurat & Objektif
                </span>
                <span class="inline-flex items-center gap-1.5 bg-white border border-gray-200 text-gray-600 text-xs font-medium px-3 py-1.5 rounded-full shadow-sm">
                    <svg class="w-3.5 h-3.5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                    </svg>
                    Gratis untuk Siswa
                </span>
            </div>

        </div>

    </div>

    {{-- RIGHT : Register Form --}}
    <div class="flex items-center justify-center px-8 py-12 bg-[#f5f7ff]">

        <div class="w-full max-w-md">

            {{-- Logo --}}
            <div class="flex items-center gap-2.5 mb-8">

                <div class="w-10 h-10 rounded-xl bg-blue-600 flex items-center justify-center shadow-lg shadow-blue-200">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-6 h-6 text-white"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2">

                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6" />
                        <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4" />

                    </svg>

                </div>

                <span class="text-xl font-bold text-gray-900 tracking-tight">
                    SIJU<span class="text-blue-600">RUSAN</span>
                </span>

            </div>

            {{-- Heading --}}
            <div class="mb-10">

                <h1 class="text-5xl leading-tight font-bold text-blue-600">
                    Buat Akun Baru
                </h1>

                <p class="mt-6 text-gray-500 text-base leading-relaxed">
                    Daftar untuk mendapatkan rekomendasi jurusan SMK sesuai minat dan kemampuanmu.
                </p>

            </div>

            {{-- Form Container --}}
            <div class="bg-white border border-blue-100 rounded-3xl p-8 shadow-2xl shadow-blue-100">

                <form method="POST"
                    action="{{ route('register') }}"
                    class="space-y-5">

                    @csrf

                    {{-- Name --}}
                    <div>

                        <label for="name"
                            class="block text-sm font-medium text-gray-700 mb-2">

                            Nama Lengkap

                        </label>

                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            autofocus
                            autocomplete="name"

                            class="w-full border border-gray-300
                                   focus:border-blue-500
                                   focus:ring-blue-500
                                   rounded-xl
                                   px-5 py-4 bg-gray-50"
                        >

                        @error('name')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    {{-- Email --}}
                    <div>

                        <label for="email"
                            class="block text-sm font-medium text-gray-700 mb-2">

                            Email Address

                        </label>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autocomplete="username"

                            class="w-full border border-gray-300
                                   focus:border-blue-500
                                   focus:ring-blue-500
                                   rounded-xl
                                   px-5 py-4 bg-gray-50"
                        >

                        @error('email')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    {{-- Password --}}
                    <div>

                        <label for="password"
                            class="block text-sm font-medium text-gray-700 mb-2">

                            Password

                        </label>

                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            autocomplete="new-password"

                            class="w-full border border-gray-300
                                   focus:border-blue-500
                                   focus:ring-blue-500
                                   rounded-xl
                                   px-5 py-4 bg-gray-50"
                        >

                        @error('password')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    {{-- Confirm Password --}}
                    <div>

                        <label for="password_confirmation"
                            class="block text-sm font-medium text-gray-700 mb-2">

                            Konfirmasi Password

                        </label>

                        <input
                            id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"

                            class="w-full border border-gray-300
                                   focus:border-blue-500
                                   focus:ring-blue-500
                                   rounded-xl
                                   px-5 py-4 bg-gray-50"
                        >

                    </div>

                    {{-- Actions --}}
                    <div class="flex items-center justify-between pt-3">

                        <p class="text-sm text-gray-500">

                            Sudah punya akun?

                            <a href="{{ route('login') }}"
                               class="text-blue-600 hover:text-blue-700 font-medium">

                                Masuk

                            </a>

                        </p>

                         <button
                            type="submit"
                            class="bg-blue-600 hover:bg-blue-700
                                   text-white
                                   px-10 py-3.5
                                   rounded-xl
                                   font-medium
                                   shadow-lg shadow-blue-200
                                   transition">

                            Daftar

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</section>

@endsection