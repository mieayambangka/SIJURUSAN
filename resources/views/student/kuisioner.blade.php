@extends('layouts.student')

@section('content')
<div class="bg-slate-100 min-h-screen py-10 px-4" x-data="questionnaireWizard()" x-init="init()">

    <div class="max-w-5xl mx-auto space-y-8">

        <!-- HEADER -->
        <div class="bg-white rounded-3xl shadow-sm border border-slate-200 p-8">

            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">

                <div>
                    <h1 class="text-4xl font-bold text-slate-800">
                        Kuisioner Minat Bakat
                    </h1>

                    <p class="mt-3 text-slate-500 text-lg">
                        Jawab pertanyaan berikut dengan jujur untuk mengetahui minat dan bakat Anda
                    </p>
                </div>

                <div class="bg-blue-50 text-blue-700 px-5 py-3 rounded-2xl border border-blue-100">
                    <p class="text-sm font-medium">Progress Halaman</p>
                    <h2 class="text-2xl font-bold" x-text="`${currentPage} / ${totalPages}`"></h2>
                </div>

            </div>

            <!-- PROGRESS -->
            <div class="mt-8">

                <div class="flex items-center justify-between mb-3">
                    <span class="font-semibold text-slate-700" x-text="`Pertanyaan ${((currentPage - 1) * perPage) + 1} dari ${totalQuestions}`"></span>

                    <span class="text-sm font-semibold text-blue-600" x-text="`${Math.round((currentPage / totalPages) * 100)}% selesai`"></span>
                </div>

                <div class="w-full bg-slate-200 rounded-full h-4 overflow-hidden">
                    <div
                        class="bg-gradient-to-r from-blue-500 to-indigo-600 h-full rounded-full transition-all duration-500"
                        :style="`width: ${(currentPage / totalPages) * 100}%`"
                    ></div>
                </div>

            </div>

        </div>

        <!-- SKALA -->
        <div class="bg-white rounded-3xl shadow-sm border border-slate-200 p-6">

            <div class="grid grid-cols-2 md:grid-cols-5 gap-4 text-center">

                <div class="rounded-2xl border border-red-100 bg-red-50 py-4 px-2">
                    <h3 class="text-red-600 font-bold text-xl">1</h3>
                    <p class="text-sm text-slate-600 mt-1">
                        Sangat Tidak Setuju
                    </p>
                </div>

                <div class="rounded-2xl border border-orange-100 bg-orange-50 py-4 px-2">
                    <h3 class="text-orange-600 font-bold text-xl">2</h3>
                    <p class="text-sm text-slate-600 mt-1">
                        Tidak Setuju
                    </p>
                </div>

                <div class="rounded-2xl border border-slate-200 bg-slate-50 py-4 px-2">
                    <h3 class="text-slate-700 font-bold text-xl">3</h3>
                    <p class="text-sm text-slate-600 mt-1">
                        Biasa Saja
                    </p>
                </div>

                <div class="rounded-2xl border border-blue-100 bg-blue-50 py-4 px-2">
                    <h3 class="text-blue-600 font-bold text-xl">4</h3>
                    <p class="text-sm text-slate-600 mt-1">
                        Setuju
                    </p>
                </div>

                <div class="rounded-2xl border border-green-100 bg-green-50 py-4 px-2">
                    <h3 class="text-green-600 font-bold text-xl">5</h3>
                    <p class="text-sm text-slate-600 mt-1">
                        Sangat Setuju
                    </p>
                </div>

            </div>

        </div>

        @if(empty($currentQuestions))
            <div class="bg-white rounded-3xl shadow-sm border border-slate-200 p-8 text-center">
                <div class="rounded-3xl border border-yellow-300 bg-yellow-50 p-6 text-yellow-800 inline-block">
                    <p class="font-semibold">Belum ada pertanyaan kuisioner yang aktif.</p>
                    <p class="mt-2 text-sm text-yellow-700">Silakan hubungi admin untuk membuat pertanyaan kuisioner terlebih dahulu.</p>
                </div>
            </div>
        @else
            <!-- LIST PERTANYAAN -->
            <form id="kuisionerForm" method="POST" action="{{ route('student.kuisioner.store') }}" x-ref="questionnaireForm" @submit.prevent="handleFormSubmit()">
                @csrf
                <input type="hidden" name="current_page" x-model="currentPage" value="{{ $currentPage }}">

                <!-- SEMUA PERTANYAAN DALAM SATU CARD -->
                <div class="bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden">

                    @foreach($currentQuestions as $index => $question)
                        <div class="p-8 {{ $loop->last ? '' : 'border-b border-slate-200' }}">

                            <div class="flex items-start gap-4">

                                <!-- Nomor Pertanyaan -->
                                <div class="w-10 h-10 rounded-2xl bg-blue-100 text-blue-700 font-bold flex items-center justify-center flex-shrink-0">
                                    {{ (($currentPage - 1) * $perPage) + $index + 1 }}
                                </div>

                                <div class="flex-1">

                                    <h2 class="text-2xl font-semibold text-slate-800">
                                        {{ $question['question'] }}
                                    </h2>

                                    <!-- Rating Options -->
                                    <div class="flex flex-wrap gap-4 mt-8">

                                        @for ($i = 1; $i <= 5; $i++)
                                            <label class="cursor-pointer">
                                                <input 
                                                    type="radio" 
                                                    name="jawaban[{{ $question['id'] }}]" 
                                                    value="{{ $i }}"
                                                    :checked="answers[{{ $question['id'] }}] == {{ $i }}"
                                                    class="peer hidden" 
                                                    @change="updateAnswer({{ $question['id'] }}, {{ $i }})"
                                                />

                                                <div class="w-14 h-14 rounded-2xl border-2 border-slate-300 flex items-center justify-center text-lg font-semibold text-slate-600 transition-all duration-200
                                                    peer-checked:bg-blue-600
                                                    peer-checked:border-blue-600
                                                    peer-checked:text-white
                                                    hover:border-blue-400">
                                                    {{ $i }}
                                                </div>
                                            </label>
                                        @endfor

                                    </div>

                                </div>

                            </div>

                        </div>
                    @endforeach

                </div>

                <!-- BUTTON NAVIGATION -->
                <div class="flex justify-between pt-8">

                    <button
                        type="button"
                        @click="goToPrevious()"
                        :disabled="currentPage === 1"
                        class="px-6 py-3 rounded-2xl border border-slate-300 text-slate-600 font-semibold hover:bg-slate-100 transition disabled:opacity-50 disabled:cursor-not-allowed"
                        x-show="currentPage > 1">
                        Sebelumnya
                    </button>

                    <div class="flex">
                        <template x-if="currentPage < totalPages">
                            <button
                                type="button"
                                @click="goToNext()"
                                :disabled="!canProceed()"
                                class="px-8 py-3 rounded-2xl bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold shadow-lg shadow-blue-200 hover:scale-[1.02] transition disabled:opacity-50 disabled:cursor-not-allowed">
                                Lanjutkan
                            </button>
                        </template>

                        <template x-if="currentPage === totalPages">
                            <button
                                type="submit"
                                :disabled="!canProceed()"
                                class="px-8 py-3 rounded-2xl bg-gradient-to-r from-green-600 to-emerald-600 text-white font-semibold shadow-lg shadow-green-200 hover:scale-[1.02] transition disabled:opacity-50 disabled:cursor-not-allowed">
                                Selesai
                            </button>
                        </template>
                    </div>

                </div>

            </form>
        @endif

    </div>

</div>

<script>
function questionnaireWizard() {
    return {
        questions: @json($currentQuestions),
        currentPage: Number(@json($currentPage)),
        totalPages: Number(@json($totalPages)),
        totalQuestions: Number(@json($totalQuestions)),
        perPage: Number(@json($perPage)),
        answers: @json($existingJawaban->toArray()),

        init() {
            // Load answers from localStorage
            const savedAnswers = localStorage.getItem('kuisioner_answers');
            if (savedAnswers) {
                try {
                    const parsed = JSON.parse(savedAnswers);
                    this.answers = { ...this.answers, ...parsed };
                } catch (e) {
                    console.error('Error parsing saved answers:', e);
                }
            }

            // Force numeric pagination values
            this.currentPage = Number(this.currentPage);
            this.totalPages = Number(this.totalPages);
            this.totalQuestions = Number(this.totalQuestions);
            this.perPage = Number(this.perPage);

            // Ensure all answers are integers
            for (let key in this.answers) {
                this.answers[key] = parseInt(this.answers[key]);
            }

            // Verify form action
            const form = this.$refs.questionnaireForm;
            if (form) {
                console.log('Form action:', form.action);
            }
        },

        canProceed() {
            if (!Array.isArray(this.questions) || this.questions.length === 0) {
                return false;
            }

            for (let question of this.questions) {
                const answer = this.answers[question.id];
                const isValid = answer && (parseInt(answer) >= 1 && parseInt(answer) <= 5);
                if (!isValid) {
                    return false;
                }
            }
            return true;
        },

        updateAnswer(questionId, score) {
            this.answers[questionId] = parseInt(score);
            localStorage.setItem('kuisioner_answers', JSON.stringify(this.answers));
        },

        goToPrevious() {
            if (this.currentPage > 1) {
                localStorage.removeItem('kuisioner_answers');
                window.location.href = '{{ route("student.kuisioner.index") }}?page=' + (this.currentPage - 1);
            }
        },

        handleFormSubmit() {
            const form = this.$refs.questionnaireForm;
            
            if (this.currentPage === this.totalPages) {
                // Halaman terakhir - simpan dan submit
                console.log('Submitting final page');
                localStorage.removeItem('kuisioner_answers');
                
                // Ensure current_page has correct value
                const pageInput = form.querySelector('input[name="current_page"]');
                if (pageInput) {
                    pageInput.value = this.currentPage;
                }
                
                form.submit();
            } else {
                // Bukan halaman terakhir - lanjut ke halaman berikutnya
                console.log('Going to next page');
                this.goToNext();
            }
        },

        goToNext() {
            if (!this.canProceed()) {
                alert('Silakan jawab semua pertanyaan di halaman ini terlebih dahulu.');
                return;
            }

            if (this.currentPage >= this.totalPages) {
                console.log('Already on last page');
                return;
            }

            const form = this.$refs.questionnaireForm;
            const formData = new FormData(form);
            
            console.log('Sending form to:', form.action);
            console.log('Current page:', this.currentPage);

            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => {
                console.log('Response status:', response.status);
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                console.log('Response data:', data);
                if (data.success) {
                    localStorage.removeItem('kuisioner_answers');
                    window.location.href = '{{ route("student.kuisioner.index") }}?page=' + data.next_page;
                } else {
                    alert(data.message || 'Terjadi kesalahan saat menyimpan jawaban.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan koneksi. Silakan coba lagi.');
            });
        },
    }
}
</script>
@endsection