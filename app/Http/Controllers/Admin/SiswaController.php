<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HasilRekomendasi;
use App\Models\JawabanSiswa;
use App\Models\NilaiSiswa;
use App\Models\User;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
{
    $siswa = User::where('role', 'student')
        ->withCount(['jawabanSiswas', 'nilaiSiswas', 'hasilRekomendasis'])
        ->paginate(15);

    return view('admin.siswa.index', compact('siswa'));
}

    public function show(User $user)
    {
        $user->load([
            'nilaiSiswas.kriteria',
            'jawabanSiswas.pertanyaan.jurusan',
            'hasilRekomendasis.jurusan',
        ]);

        return view('admin.siswa.show', compact('user'));
    }
}
