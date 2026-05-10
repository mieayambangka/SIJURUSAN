<nav class="bg-white border-b border-gray-100 sticky top-0 z-50">

    <div class="max-w-6xl mx-auto px-6 h-16 flex items-center justify-between">

        {{-- LEFT : Logo --}}
        <div class="flex items-center">

            <a href="{{ auth()->check() ? route('student.dashboard') : route('welcome') }}"
               class="flex items-center gap-2.5">

                <div class="w-9 h-9 rounded-xl bg-blue-600 flex items-center justify-center shadow-sm">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-5 h-5 text-white"
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

                <span class="text-lg font-semibold tracking-tight text-gray-900">
                    SIJU<span class="text-blue-600">RUSAN</span>
                </span>

            </a>

        </div>

        {{-- RIGHT SIDE --}}
        <div class="flex items-center gap-10">

            {{-- Navigation --}}
            <div class="hidden md:flex items-center gap-8">

                <a href="{{ auth()->check() ? route('student.dashboard') : route('welcome') }}"
                   class="text-sm text-gray-500 hover:text-blue-600 transition">

                    Beranda

                </a>

                <a href="{{ route('student.nilai.index') }}"
                   class="text-sm text-gray-500 hover:text-blue-600 transition">

                    Dashboard

                </a>

                <a href="#cara"
                   class="text-sm text-gray-500 hover:text-blue-600 transition">

                    Cara Pakai

                </a>

            </div>

            {{-- RIGHT --}}
            <div class="flex justify-end">

                @auth

                    <div class="relative">

                        {{-- Trigger --}}
                        <button
                            id="profileDropdownButton"
                            type="button"
                            class="flex items-center gap-3 focus:outline-none">

                            {{-- Profile --}}
                            <div class="w-10 h-10 rounded-full overflow-hidden border border-gray-200">

                                <img
                                    src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=2563eb&color=fff"
                                    alt="Profile"
                                    class="w-full h-full object-cover"
                                >

                            </div>

                            {{-- Name --}}
                            <div class="hidden sm:flex items-center gap-2">

                                <span class="text-sm font-medium text-gray-700">
                                    {{ Auth::user()->name }}
                                </span>

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="w-4 h-4 text-gray-400"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M19 9l-7 7-7-7" />

                                </svg>

                            </div>

                        </button>

                        {{-- Dropdown --}}
                        <div
                            id="profileDropdown"
                            class="hidden absolute right-0 top-14 w-56
                                   bg-white border border-gray-200
                                   rounded-2xl shadow-lg overflow-hidden z-50">

                            {{-- Header --}}
                            <div class="px-4 py-3 border-b border-gray-100">

                                <p class="text-sm font-medium text-gray-900">
                                    {{ Auth::user()->name }}
                                </p>

                                <p class="text-xs text-gray-500 mt-1">
                                    {{ Auth::user()->email }}
                                </p>

                            </div>

                            {{-- Menu --}}
                            <div class="py-2">

                                <a href="{{ route('profile.edit') }}"
                                   class="flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 transition">

                                    Profile

                                </a>

                                <form method="POST" action="{{ route('logout') }}">

                                    @csrf

                                    <button
                                        type="submit"
                                        class="w-full text-left px-4 py-3 text-sm text-red-600 hover:bg-red-50 transition">

                                        Logout

                                    </button>

                                </form>

                            </div>

                        </div>

                    </div>

                @else

                    <div class="flex items-center gap-3">

                        <a href="{{ route('login') }}"
                           class="px-4 py-2 text-sm rounded-xl border border-gray-200 text-gray-700 hover:bg-gray-50 transition">

                            Masuk

                        </a>

                        <a href="{{ route('register') }}"
                           class="px-4 py-2 text-sm rounded-xl bg-blue-600 text-white hover:bg-blue-700 transition">

                            Daftar

                        </a>

                    </div>

                @endauth

            </div>

        </div>

    </div>

</nav>

{{-- Dropdown Script --}}
<script>

    const profileButton = document.getElementById('profileDropdownButton');
    const profileDropdown = document.getElementById('profileDropdown');

    if (profileButton) {

        profileButton.addEventListener('click', () => {
            profileDropdown.classList.toggle('hidden');
        });

        window.addEventListener('click', function(e) {

            if (
                !profileButton.contains(e.target) &&
                !profileDropdown.contains(e.target)
            ) {
                profileDropdown.classList.add('hidden');
            }

        });

    }

</script>