<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KuisonerController extends Controller
{
    public function index(Request $request)
    {
        $questions = collect([
            'Seberapa tertarik kamu dengan komputer?',
            'Apakah kamu suka merakit komputer?',
            'Apakah kamu tertarik belajar jaringan?',
            'Apakah kamu suka coding?',
            'Seberapa minat kamu dengan matematika?',
            'Apakah kamu suka memecahkan masalah logika?',
            'Seberapa suka kamu dengan desain grafis?',
            'Apakah kamu tertarik dengan database?',
            'Seberapa minat kamu dengan kecerdasan buatan?',
            'Apakah kamu suka belajar hal baru setiap hari?',
        ]);

        $totalQuestions = $questions->count();
        $currentPage = 1;
        $totalPages = 1;
        $progress = 100; // Since all questions on one page

        return view('kuisoner', compact('questions', 'totalQuestions', 'currentPage', 'totalPages', 'progress'));
    }
}