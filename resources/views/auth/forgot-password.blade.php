@extends('layouts.guest')

@section('content')

<section class="h-screen overflow-hidden grid lg:grid-cols-2">

    {{-- LEFT --}}
    <div class="flex items-center justify-center px-8 py-6 bg-white">

        <div class="w-full max-w-md">

            {{-- Logo --}}
            <div class="flex items-center gap-2.5 mb-10">

                <div class="w-10 h-10 rounded-xl bg-blue-600 flex items-center justify-center shadow-lg shadow-blue-200">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-6 h-6 text-white"
                         viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="2"
                         stroke-linecap="round"
                         stroke-linejoin="round">

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
            <div class="mb-8">

                <h2 class="text-4xl font-bold leading-tight text-blue-600">
                    Lupa Password?
                </h2>

                <p class="mt-4 text-gray-500">
                    Masukkan email akun Anda dan kami akan mengirimkan link untuk reset password.
                </p>

            </div>

            {{-- Session Status --}}
            @if (session('status'))

                <div class="mb-6 rounded-2xl bg-emerald-50 border border-emerald-200 p-4 text-sm text-emerald-900">

                    {{ session('status') }}

                </div>

            @endif

            {{-- Form --}}
            <form method="POST"
                  action="{{ route('password.email') }}"
                  class="space-y-6">

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
                               px-5 py-4 bg-gray-50"
                    >

                    @error('email')

                        <p class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>

                    @enderror

                </div>

                {{-- Actions --}}
                <div class="flex items-center justify-between pt-2">

                    <button
                        type="submit"
                        class="bg-blue-600 hover:bg-blue-700
                               text-white
                               px-8 py-3.5
                               rounded-xl
                               font-medium
                               shadow-lg shadow-blue-200
                               transition">

                        Kirim Link Reset

                    </button>

                    <a href="{{ route('login') }}"
                       class="text-sm text-gray-500 hover:text-blue-600 transition">

                        Kembali ke Login

                    </a>

                </div>

            </form>

        </div>

    </div>

    {{-- RIGHT --}}
    <div class="hidden lg:flex items-center justify-center bg-gray-50 overflow-hidden">

        <div class="w-full max-w-lg px-8 py-6">

            {{-- Back Button --}}
            <div class="flex justify-end mb-6">

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
                    alt="Forgot Password"
                    class="w-full max-h-[420px] object-contain"
                >

            </div>

            {{-- Pills --}}
            <div class="flex flex-wrap justify-center gap-2 mt-5">

                <span class="inline-flex items-center gap-1.5 bg-white border border-gray-200 text-gray-600 text-xs font-medium px-3 py-1.5 rounded-full shadow-sm">

                    Aman & Terenkripsi

                </span>

                <span class="inline-flex items-center gap-1.5 bg-white border border-gray-200 text-gray-600 text-xs font-medium px-3 py-1.5 rounded-full shadow-sm">

                    Reset Cepat

                </span>

                <span class="inline-flex items-center gap-1.5 bg-white border border-gray-200 text-gray-600 text-xs font-medium px-3 py-1.5 rounded-full shadow-sm">

                    Dukungan Laravel Breeze

                </span>

            </div>

        </div>

    </div>

</section>

@endsection