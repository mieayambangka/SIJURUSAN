{{-- FOOTER --}}
<footer class="relative overflow-hidden bg-slate-900 text-slate-400">

    {{-- Gradient Blur --}}
    <div
        class="absolute top-0 left-1/2 -translate-x-1/2
               w-[700px] h-[300px]
               bg-blue-500/20 blur-3xl rounded-full">
    </div>

    <div class="relative max-w-7xl mx-auto px-6 py-16">

        {{-- TOP --}}
        <div
            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4
                   gap-12 border-b border-white/10 pb-12">

            {{-- BRAND --}}
            <div>

                <div class="flex items-center gap-3">

                    <div
                        class="w-11 h-11 rounded-2xl
                               bg-gradient-to-br
                               from-blue-500 to-blue-700
                               flex items-center justify-center
                               shadow-lg shadow-blue-500/30">

                        {{-- ICON --}}
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-5 h-5 text-white"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M12 14l9-5-9-5-9 5 9 5z" />

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M12 14l6.16-3.422A12.083 12.083 0 0112 20.055
                                     a12.083 12.083 0 01-6.16-9.477L12 14z" />

                        </svg>

                    </div>

                    <div>

                        <h2 class="text-xl font-bold tracking-tight">
                            SIJURUSAN
                        </h2>

                        <p class="text-sm text-slate-400">
                            Sistem Pendukung Keputusan
                        </p>

                    </div>

                </div>

                <p
                    class="mt-6 text-sm leading-relaxed
                           text-slate-400 max-w-sm">

                    Membantu siswa menentukan jurusan terbaik
                    berdasarkan kemampuan akademik dan minat
                    menggunakan metode SAW.

                </p>

            </div>

            {{-- NAVIGATION --}}
            <div>

                <h3 class="text-sm font-semibold tracking-wide uppercase text-white">
                    Navigasi
                </h3>

                <ul class="mt-5 space-y-3">

                    <li>
                        <a href="#"
                           class="text-sm text-slate-400 hover:text-blue-400 transition">
                            Beranda
                        </a>
                    </li>

                    <li>
                        <a href="#tentang"
                           class="text-sm text-slate-400 hover:text-blue-400 transition">
                            Tentang
                        </a>
                    </li>

                    <li>
                        <a href="#cara"
                           class="text-sm text-slate-400 hover:text-blue-400 transition">
                            Cara Kerja
                        </a>
                    </li>

                    <li>
                        <a href="#faq"
                           class="text-sm text-slate-400 hover:text-blue-400 transition">
                            FAQ
                        </a>
                    </li>

                </ul>

            </div>

            {{-- ACCOUNT --}}
            <div>

                <h3 class="text-sm font-semibold tracking-wide uppercase text-white">
                    Akun
                </h3>

                <ul class="mt-5 space-y-3">

                    <li>
                        <a href="{{ route('login') }}"
                           class="text-sm text-slate-400 hover:text-blue-400 transition">
                            Masuk
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('register') }}"
                           class="text-sm text-slate-400 hover:text-blue-400 transition">
                            Daftar
                        </a>
                    </li>

                    <li>
                        <a href="#"
                           class="text-sm text-slate-400 hover:text-blue-400 transition">
                            Dashboard
                        </a>
                    </li>

                </ul>

            </div>

            {{-- CONTACT --}}
            <div>

                <h3 class="text-sm font-semibold tracking-wide uppercase text-white">
                    Kontak
                </h3>

                <ul class="mt-5 space-y-4">

                    <li class="flex items-start gap-3">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-5 h-5 text-blue-400 mt-0.5"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493
                                     a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516
                                     l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19
                                     a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />

                        </svg>

                        <span class="text-sm text-slate-400">
                            SMK Negeri 22 Jakarta
                        </span>

                    </li>

                    <li class="flex items-start gap-3">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-5 h-5 text-pink-400 mt-0.5"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M7 8h10M7 12h4m1 8h5a2 2 0 002-2V6
                                     a2 2 0 00-2-2H7a2 2 0 00-2 2v12
                                     a2 2 0 002 2h5z" />

                        </svg>

                        <a href="https://instagram.com/julyaaivy_"
                           target="_blank"
                           class="text-sm text-slate-400 hover:text-pink-400 transition">

                            @julyaaivy_

                        </a>

                    </li>

                </ul>

            </div>

        </div>

        {{-- BOTTOM --}}
        <div
            class="pt-8 flex flex-col md:flex-row
                   items-center justify-between gap-4">

            <p class="text-sm text-slate-500 text-center md:text-left">
                © {{ date('Y') }} SIJURUSAN — All rights reserved.
            </p>

            <div class="flex items-center gap-6">

                <a href="#"
                   class="text-sm text-slate-500 hover:text-blue-400 transition">
                    Kebijakan Privasi
                </a>

                <a href="#"
                   class="text-sm text-slate-500 hover:text-blue-400 transition">
                    Terms
                </a>

            </div>

        </div>

    </div>

</footer>