<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\HasilRekomendasi;
use App\Models\JawabanSiswa;
use App\Models\NilaiSiswa;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;

class KuisionerController extends Controller
{
    public function index(Request $request)
    {
        $student = $request->user();

        // Cek apakah sudah mengisi nilai
        if (!$student->nilaiSiswas()->exists()) {
            return redirect()->route('student.nilai.index')->with('warning', 'Silakan isi nilai akademik terlebih dahulu.');
        }

        $pertanyaans = Pertanyaan::with('jurusan')
            ->where('active', true)
            ->orderBy('order')
            ->get();

        // Pagination: 10 pertanyaan per halaman
        $perPage = 10;
        $currentPage = $request->get('page', 1);
        $totalQuestions = $pertanyaans->count();
        $totalPages = ceil($totalQuestions / $perPage);

        // Validasi page
        if ($currentPage < 1 || $currentPage > $totalPages) {
            $currentPage = 1;
        }

        $offset = ($currentPage - 1) * $perPage;
        $currentQuestions = $pertanyaans->slice($offset, $perPage)->values()->toArray();

        // Cek jawaban yang sudah ada
        $existingJawaban = JawabanSiswa::where('user_id', $student->id)
            ->pluck('score', 'pertanyaan_id');

        return view('student.kuisioner', compact(
            'currentQuestions',
            'existingJawaban',
            'currentPage',
            'totalPages',
            'totalQuestions',
            'perPage'
        ));
    }

    public function store(Request $request)
    {
        // Cek authentication
        if (!$request->user()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $student = $request->user();

        // Cek apakah sudah mengisi nilai
        if (!$student->nilaiSiswas()->exists()) {
            return redirect()->route('student.nilai.index')->with('warning', 'Silakan isi nilai akademik terlebih dahulu.');
        }

        $pertanyaans = Pertanyaan::where('active', true)->orderBy('order')->get();
        $totalQuestions = $pertanyaans->count();
        $perPage = 10;
        $totalPages = ceil($totalQuestions / $perPage);
        $currentPage = (int)$request->get('current_page', 1);

        // Validasi current page
        if ($currentPage < 1 || $currentPage > $totalPages) {
            $currentPage = 1;
        }

        // Jika ini bukan step terakhir, simpan jawaban step ini dan lanjut ke step berikutnya
        if ($currentPage < $totalPages) {
            // Validasi hanya untuk pertanyaan di step ini
            $offset = ($currentPage - 1) * $perPage;
            $currentStepQuestions = $pertanyaans->slice($offset, $perPage);

            $rules = [];
            foreach ($currentStepQuestions as $pertanyaan) {
                $rules["jawaban.{$pertanyaan->id}"] = 'required|integer|min:1|max:5';
            }

            try {
                $validated = $request->validate($rules);
            } catch (\Illuminate\Validation\ValidationException $e) {
                if ($request->expectsJson()) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Silakan jawab semua pertanyaan.'
                    ], 422);
                }
                return back()->withErrors($e->validator);
            }

            // Simpan jawaban step ini
            foreach ($validated['jawaban'] as $pertanyaanId => $score) {
                JawabanSiswa::updateOrCreate(
                    [
                        'user_id' => $student->id,
                        'pertanyaan_id' => $pertanyaanId,
                    ],
                    ['score' => $score]
                );
            }

            // Jika request AJAX, return JSON response
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Jawaban berhasil disimpan.',
                    'next_page' => $currentPage + 1
                ]);
            }

            // Jika bukan AJAX, redirect seperti biasa
            return redirect()->route('student.kuisioner.index', ['page' => $currentPage + 1])
                ->with('success', 'Jawaban berhasil disimpan.');
        }

        // Jika ini step terakhir, simpan jawaban halaman terakhir dan hitung rekomendasi
        $offset = ($currentPage - 1) * $perPage;
        $currentStepQuestions = $pertanyaans->slice($offset, $perPage);

        $rules = [];
        foreach ($currentStepQuestions as $pertanyaan) {
            $rules["jawaban.{$pertanyaan->id}"] = 'required|integer|min:1|max:5';
        }

        try {
            $validated = $request->validate($rules);
        } catch (\Illuminate\Validation\ValidationException $e) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Silakan jawab semua pertanyaan.'
                ], 422);
            }
            return back()->withErrors($e->validator);
        }

        // Simpan jawaban halaman terakhir
        foreach ($validated['jawaban'] as $pertanyaanId => $score) {
            JawabanSiswa::updateOrCreate(
                [
                    'user_id' => $student->id,
                    'pertanyaan_id' => $pertanyaanId,
                ],
                ['score' => $score]
            );
        }

        // Hitung dan simpan rekomendasi
        try {
            $sawService = app(\App\Services\SAWService::class);
            $sawService->persistRecommendations($student);
        } catch (\Exception $e) {
            \Log::error('SAW Service Error: ' . $e->getMessage());
        }

        // Redirect ke hasil dengan success message
        return redirect()->route('student.hasil.index')->with('success', 'Kuisioner berhasil disimpan. Lihat hasil rekomendasi jurusan Anda.');
    }

    public function reset(Request $request)
    {
        $student = $request->user();

        JawabanSiswa::where('user_id', $student->id)->delete();
        HasilRekomendasi::where('user_id', $student->id)->delete();
        NilaiSiswa::where('user_id', $student->id)->delete();

        return redirect()->route('student.nilai.index')
            ->with('success', 'Semua data lama telah direset. Silakan input nilai kembali dari awal.');
    }
}