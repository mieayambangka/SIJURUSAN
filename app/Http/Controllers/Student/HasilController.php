<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\HasilRekomendasi;
use App\Services\SAWService;
use Illuminate\Http\Request;

class HasilController extends Controller
{
    public function index(Request $request, SAWService $sawService)
    {
        $student = $request->user();

        // Cek apakah sudah mengisi nilai dan kuisioner
        if (!$student->nilaiSiswas()->exists()) {
            return redirect()->route('student.nilai.index')->with('warning', 'Silakan isi nilai akademik terlebih dahulu.');
        }

        if (!$student->jawabanSiswas()->exists()) {
            return redirect()->route('student.kuisioner.index')->with('warning', 'Silakan isi kuisioner terlebih dahulu.');
        }

        if (!$student->hasilRekomendasis()->exists()) {
            try {
                $sawService->persistRecommendations($student);
            } catch (\Exception $e) {
                \Log::error('SAW Service Error: ' . $e->getMessage());
            }
        }

        $recommendations = HasilRekomendasi::with('jurusan')
            ->where('user_id', $student->id)
            ->orderByDesc('score')
            ->get();

        return view('student.hasil', compact('recommendations'));
    }
}