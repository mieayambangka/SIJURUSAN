<section
    class="relative bg-center bg-cover bg-no-repeat"
    style="background-image: url('{{ asset('major.jpg') }}')">

    {{-- Overlay --}}
    <div class="absolute inset-0 bg-black/55"></div>

    {{-- Content --}}
    <div class="relative z-10 px-6 mx-auto max-w-6xl text-center py-28 lg:py-40">

        {{-- Badge --}}
        <div
            class="inline-flex items-center gap-2 px-4 py-2
           text-white text-sm font-medium">
            <h1 class="text-4xl font-bold m-0">
                <span id="typewriter"></span><span class="animate-pulse">|</span>
            </h1>
        </div>

        <script>
            const text = "S I J U R U S A N";
            let i = 0;
            let deleting = false;
            const el = document.getElementById('typewriter');

            function type() {
                if (!deleting) {
                    el.textContent = text.slice(0, i + 1);
                    i++;
                    if (i === text.length) {
                        deleting = true;
                        setTimeout(type, 1200);
                        return;
                    }
                } else {
                    el.textContent = text.slice(0, i - 1);
                    i--;
                    if (i === 0) {
                        deleting = false;
                        setTimeout(type, 400);
                        return;
                    }
                }
                setTimeout(type, deleting ? 60 : 120);
            }

            type();
        </script>

        {{-- Heading --}}
        <h1
            class="mt-7 text-4xl font-bold tracking-tight
                   leading-tight text-white
                   md:text-5xl lg:text-6xl">

            Temukan Jurusan
            <span class="text-blue-400">
                Sesuai Potensimu
            </span>

        </h1>

        {{-- Description --}}
        <p
            class="mt-6 max-w-2xl mx-auto
                   text-base text-gray-200
                   md:text-lg leading-relaxed">

            SIJURUSAN membantu calon peserta didik menentukan
            jurusan terbaik berdasarkan nilai akademik
            dan minat menggunakan metode
            <span class="font-semibold text-white">
                Simple Additive Weighting (SAW)
            </span>.

        </p>

        {{-- Button --}}
        <div
            class="mt-10 flex flex-col sm:flex-row
                   items-center justify-center gap-4">

            <a href="{{ route('register') }}"
                class="inline-flex items-center justify-center
                       px-6 py-3 rounded-xl
                       bg-blue-600 hover:bg-blue-700
                       text-white font-medium
                       transition shadow-lg hover:-translate-y-0.5">

                Mulai Penjurusan

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-4 h-4 ml-2"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M5 12h14m-6-6l6 6-6 6" />

                </svg>

            </a>

            <a href="#tentang"
                class="px-6 py-3 rounded-xl
                       border border-white/20
                       bg-white/10 backdrop-blur-md
                       text-white hover:bg-white/20
                       transition">

                Pelajari Sistem

            </a>

        </div>

    </div>

</section>

