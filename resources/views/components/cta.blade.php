{{-- CTA SECTION --}}
<section class="relative py-28 overflow-hidden bg-white">

    {{-- Background Blur --}}
    <div
        class="absolute -top-32 left-1/2 -translate-x-1/2
               w-[700px] h-[700px]
               bg-blue-500/10 blur-3xl rounded-full">
    </div>

    <div class="relative max-w-6xl mx-auto px-6">

        {{-- TOP NUMBER --}}
        <div
            class="text-center"
            data-aos="fade-up">

            <h2
                class="text-5xl md:text-6xl font-bold
                       tracking-tight text-gray-900">

                2.789+
            </h2>

            <p
                class="mt-5 text-lg md:text-xl
                       leading-relaxed text-gray-500
                       max-w-2xl mx-auto">

                Siswa telah menggunakan
                <span class="font-semibold text-blue-600">
                    SIJURUSAN
                </span>
                untuk menemukan jurusan yang lebih sesuai
                dengan minat dan kemampuan mereka.

            </p>

        </div>

        {{-- STATS --}}
        <div
            class="mt-20 grid md:grid-cols-2 gap-12 items-center">

            {{-- LEFT --}}
            <div
                class="flex flex-col md:flex-row items-center gap-8"
                data-aos="fade-right"
                data-aos-delay="150">

                {{-- Circle --}}
                <div class="relative w-40 h-40 shrink-0">

                    <div
                        class="absolute inset-0 rounded-full
                               border-[18px] border-gray-200">
                    </div>

                    <div
                        class="absolute inset-0 rounded-full
                               border-[18px] border-transparent
                               border-t-blue-600
                               border-r-blue-500
                               rotate-[40deg]">
                    </div>

                    <div
                        class="absolute inset-5 rounded-full bg-white">
                    </div>

                </div>

                {{-- Text --}}
                <div>

                    <h3
                        class="text-5xl font-bold text-blue-600">
                        85%
                    </h3>

                    <p
                        class="mt-4 text-gray-600 leading-relaxed text-lg">

                        Pengguna merasa lebih terbantu
                        dalam menentukan jurusan yang sesuai
                        setelah menggunakan sistem rekomendasi.

                    </p>

                </div>

            </div>

            {{-- RIGHT --}}
            <div
                class="flex flex-col md:flex-row items-center gap-8"
                data-aos="fade-left"
                data-aos-delay="300">

                {{-- Circle --}}
                <div class="relative w-40 h-40 shrink-0">

                    <div
                        class="absolute inset-0 rounded-full
                               border-[18px] border-gray-200">
                    </div>

                    <div
                        class="absolute inset-0 rounded-full
                               border-[18px] border-transparent
                               border-t-indigo-600
                               border-r-indigo-500
                               border-b-indigo-400
                               rotate-[120deg]">
                    </div>

                    <div
                        class="absolute inset-5 rounded-full bg-white">
                    </div>

                </div>

                {{-- Text --}}
                <div>

                    <h3
                        class="text-5xl font-bold text-indigo-600">
                        92%
                    </h3>

                    <p
                        class="mt-4 text-gray-600 leading-relaxed text-lg">

                        Siswa menjadi lebih yakin
                        terhadap pilihan jurusan dan arah
                        pendidikan setelah melihat hasil rekomendasi.

                    </p>

                </div>

            </div>

        </div>

        {{-- CTA BUTTON --}}
        <div
            class="mt-24 text-center"
            data-aos="zoom-in"
            data-aos-delay="400">

            <a
                href="{{ route('register') }}"
                class="inline-flex items-center gap-3
                       px-8 py-4 rounded-2xl
                       bg-gradient-to-r
                       from-blue-600 to-indigo-600
                       text-white font-semibold text-lg
                       shadow-lg shadow-blue-500/20
                       hover:scale-105 hover:shadow-2xl
                       transition duration-300">

                Mulai Penjurusan

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M5 12h14m-6-6l6 6-6 6"/>

                </svg>

            </a>

        </div>

    </div>

</section>