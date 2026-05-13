
<x-admin-layout title="Edit Bobot Jurusan"  subtitle="Pilih kriteria dan tetapkan bobot setiap jurusan">
    <div class="rounded-3xl bg-white p-6 border border-slate-200 shadow-sm">
        <form action="{{ route('admin.bobot.update', $jurusan) }}" method="POST">
            @csrf

            <div class="mb-6 space-y-4">
                <div>
                    <h2 class="text-lg font-semibold text-slate-900">{{ $jurusan->name }}</h2>
                    <p class="text-sm text-slate-500">Pilih kriteria akademik yang akan digunakan dan tetapkan bobotnya.</p>
                    <p class="mt-2 text-sm text-amber-600">Catatan: Total bobot harus 100%. Bobot minat wajib diisi.</p>
                </div>

                <!-- Kriteria Akademik -->
                <div class="space-y-3">
                    <h3 class="font-semibold text-slate-900">Kriteria Akademik</h3>
                    <div class="grid gap-3">
                        @php
                            $selectedAcademic = old('academic_kriterias', $jurusan->kriterias->pluck('id')->toArray());
                            $oldWeights = old('academic_weights', $jurusan->kriterias->mapWithKeys(function ($item) {
                                return [$item->id => $item->pivot->weight];
                            })->toArray());
                        @endphp
                        @foreach($academicKriterias as $kriteria)
                            @php
                                $pivot = $jurusan->kriterias->firstWhere('id', $kriteria->id);
                                $isSelected = in_array($kriteria->id, $selectedAcademic);
                                $weight = $oldWeights[$kriteria->id] ?? $pivot?->pivot->weight ?? 0;
                            @endphp
                            <div class="rounded-3xl border border-slate-200 p-4 grid gap-3 sm:grid-cols-[auto_1fr_auto] sm:items-center">
                                <input type="checkbox"
                                       name="academic_kriterias[]"
                                       value="{{ $kriteria->id }}"
                                       {{ $isSelected ? 'checked' : '' }}
                                       class="rounded border-slate-300">
                                <div>
                                    <div class="font-semibold text-slate-900">{{ $kriteria->name }}</div>
                                    <div class="text-sm text-slate-500">Mata pelajaran akademik</div>
                                </div>
                                <div class="flex items-center gap-2">
                                    <input type="number"
                                           name="academic_weights[{{ $kriteria->id }}]"
                                           value="{{ $weight }}"
                                           min="0"
                                           max="100"
                                           step="0.5"
                                           class="w-24 rounded-2xl border border-slate-300 bg-slate-50 px-3 py-2"
                                           placeholder="0">
                                    <span class="text-sm text-slate-600">%</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Kriteria Minat -->
                @if($minatKriteria)
                    <div class="space-y-3">
                        <h3 class="font-semibold text-slate-900">Kriteria Minat</h3>
                        <div class="rounded-3xl border border-slate-200 p-4 bg-blue-50">
                            <div class="grid gap-3 sm:grid-cols-[1fr_auto] sm:items-center">
                                <div>
                                    <div class="font-semibold text-slate-900">{{ $minatKriteria->name }}</div>
                                    <div class="text-sm text-slate-500">Kuisioner minat bakat (wajib)</div>
                                </div>
                                <div class="flex items-center gap-2">
                                    <input type="number"
                                           name="minat_weight"
                                           value="{{ old('minat_weight', $jurusan->kriterias->firstWhere('id', $minatKriteria->id)?->pivot->weight ?? 0) }}"
                                           min="1"
                                           max="100"
                                           step="0.5"
                                           class="w-24 rounded-2xl border border-slate-300 bg-white px-3 py-2"
                                           required>
                                    <span class="text-sm text-slate-600">%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('admin.bobot.index') }}" class="rounded-full border border-slate-300 px-5 py-2 text-sm text-slate-700 hover:bg-slate-50">Kembali</a>
                <button type="submit" class="rounded-full bg-indigo-600 px-5 py-2 text-sm font-semibold text-white hover:bg-indigo-700">Simpan Bobot</button>
            </div>
        </form>
    </div>
</x-admin-layout>

