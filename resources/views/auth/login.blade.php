{{-- resources/views/auth/login.blade.php --}}

@extends('layouts.guest')

@section('content')

<section class="h-screen overflow-hidden grid lg:grid-cols-2">

    {{-- LEFT --}}
    <div class="flex items-center justify-center px-8 py-12 bg-white">

        <div class="w-full max-w-md">

            {{-- Logo --}}
            <div class="flex items-center gap-2.5 mb-12">
                <div class="w-10 h-10 rounded-xl bg-blue-600 flex items-center justify-center shadow-lg shadow-blue-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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

                <h2 class="text-5xl leading-tight font-bold text-blue-600">
                    Temukan Jurusan Yang Sesuai Dengan Potensimu
                </h2>

                <p class="mt-6 text-gray-500 text-base">
                    Masuk untuk melanjutkan proses rekomendasi jurusan SMK berbasis metode SAW.
                </p>

            </div>

            {{-- Session --}}
            @if (session('status'))
            <div class="mb-5 text-sm text-green-700 bg-green-50 border border-green-200 rounded-xl px-4 py-3">
                {{ session('status') }}
            </div>
            @endif

            {{-- Form --}}
            <form method="POST"
                action="{{ route('login') }}"
                class="space-y-5">

                @csrf

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
                        autofocus

                        class="w-full border border-gray-300
                            focus:border-blue-500
                            focus:ring-blue-500
                            rounded-xl
                            px-5 py-4 bg-gray-50">

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

                        class="w-full border border-gray-300
                            focus:border-blue-500
                            focus:ring-blue-500
                            rounded-xl
                            px-5 py-4 bg-gray-50">

                    @error('password')
                    <p class="mt-2 text-sm text-red-600">
                        {{ $message }}
                    </p>
                    @enderror

                </div>

                {{-- Remember + Forgot --}}
                <div class="flex items-center justify-between">

                    <label class="flex items-center gap-2 text-sm text-gray-600">

                        <input
                            id="remember"
                            type="checkbox"
                            name="remember"
                            value="1"
                            class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">


                        Remember me

                    </label>

                    @if (Route::has('password.request'))

                    <a href="{{ route('password.request') }}"
                        class="text-sm text-blue-600 hover:text-blue-700">

                        Forgot password?

                    </a>

                    @endif

                </div>

                {{-- Actions --}}
                <div class="flex items-center justify-between pt-3">

                    <button
                        type="submit"
                        class="bg-blue-600 hover:bg-blue-700
                            text-white
                            px-10 py-3.5
                            rounded-xl
                            font-medium
                            shadow-lg shadow-blue-200
                            transition">

                        Login

                    </button>

                    <a href="{{ route('register') }}"
                        class="border border-blue-600
                            text-blue-600
                            hover:bg-blue-50
                            px-10 py-3.5
                            rounded-xl
                            font-medium
                            transition">

                        Sign Up

                    </a>

                </div>

            </form>

        </div>

    </div>

    {{-- RIGHT --}}
    <div class="hidden lg:flex items-center justify-center bg-gray-50 overflow-hidden">

        <div class="w-full max-w-xl px-8 pt-8">

            {{-- Back Button --}}
            <div class="flex justify-end mb-8 -translate-y-10">

                <a href="{{ route('welcome') }}"
                    title="Kembali ke Beranda"
                    class="w-11 h-11 rounded-full border border-gray-300
                      flex items-center justify-center
                      text-gray-600 hover:text-blue-600
                      hover:border-blue-600
                      transition">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M15 19l-7-7 7-7" />

                    </svg>

                </a>

            </div>

            {{-- Illustration --}}
            <div>

                <img
                    src="{{ asset('Learning-bro (1).png') }}"
                    alt="Siswa SMK"
                    class="w-full object-contain">

            </div>
            {{-- Feature pills --}}
            <div class="flex flex-wrap justify-center gap-2 mt-8">
                <span class="inline-flex items-center gap-1.5 bg-white border border-gray-200 text-gray-600 text-xs font-medium px-3 py-1.5 rounded-full shadow-sm">
                    <svg class="w-3.5 h-3.5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                    Berbasis Metode SAW
                </span>
                <span class="inline-flex items-center gap-1.5 bg-white border border-gray-200 text-gray-600 text-xs font-medium px-3 py-1.5 rounded-full shadow-sm">
                    <svg class="w-3.5 h-3.5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                    Hasil Akurat & Objektif
                </span>
                <span class="inline-flex items-center gap-1.5 bg-white border border-gray-200 text-gray-600 text-xs font-medium px-3 py-1.5 rounded-full shadow-sm">
                    <svg class="w-3.5 h-3.5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                    Gratis untuk Siswa
                </span>
            </div>

        </div>

    </div>

</section>

@endsection