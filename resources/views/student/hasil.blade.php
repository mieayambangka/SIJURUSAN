@extends('layouts.student')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-2xl shadow-lg p-8">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Hasil Rekomendasi Jurusan</h2>
        <p class="text-gray-600 mb-8">Berdasarkan nilai akademik dan jawaban kuisioner Anda, berikut adalah rekomendasi jurusan SMK yang sesuai:</p>

        @if($recommendations->isEmpty())
            <div class="text-center py-12">
                <div class="text-gray-400 mb-4">
                    <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-600 mb-2">Belum Ada Hasil</h3>
                <p class="text-gray-500">Sistem belum dapat menghitung rekomendasi. Pastikan Anda telah mengisi nilai dan kuisioner.</p>
                <a href="{{ route('student.dashboard') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors mt-4">
                    Kembali ke Dashboard
                </a>
            </div>
        @else
            <div class="space-y-6">
                @foreach($recommendations->take(3) as $index => $rec)
                    <div class="border border-gray-200 rounded-xl p-6 {{ $index === 0 ? 'bg-yellow-50 border-yellow-300' : 'bg-white' }}">
                        @if($index === 0)
                            <div class="flex items-center space-x-2 mb-4">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                                    🏆 Rekomendasi Teratas
                                </span>
                            </div>
                        @endif

                        <div class="flex items-start justify-between">
                            <div class="flex-1">
                                <div class="flex items-center space-x-3 mb-2">
                                    <span class="flex-shrink-0 w-10 h-10 bg-blue-600 text-white rounded-full flex items-center justify-center font-bold text-sm">
                                        {{ $index + 1 }}
                                    </span>
                                    <div>
                                        <h3 class="text-xl font-bold text-gray-800">{{ $index + 1 }}. {{ $rec->jurusan->name }}</h3>
                                        <p class="text-gray-600">{{ $rec->jurusan->deskripsi }}</p>
                                    </div>
                                </div>

                                <div class="ml-13 space-y-2">
                                    <div class="text-sm text-gray-600">
                                        <span class="font-medium">Skor SAW:</span>
                                        <span class="text-lg font-bold text-blue-600">{{ number_format($rec->score, 4) }}</span>

                                    </div>

                                    @if($rec->meta && isset($rec->meta['details']))
                                        <div class="text-sm text-gray-600">
                                            <span class="font-medium">Detail Perhitungan:</span>
                                            <div class="mt-2 space-y-2 text-xs">
                                                @foreach($rec->meta['details'] as $detail)
                                                    <div class="flex justify-between items-center bg-slate-50 p-2 rounded">
                                                        <div>
                                                            <span class="font-semibold text-gray-700">{{ $detail['kriteria'] }}</span>
                                                            <span class="text-gray-500 ml-2">({{ ucfirst($detail['source']) }})</span>
                                                        </div>
                                                        <div class="text-right">
                                                            <div class="text-gray-600">
                                                                {{ number_format($detail['normalized'], 4) }} × {{ $detail['weight'] }}% = <span class="font-semibold">{{ number_format($detail['subtotal'], 4) }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="mt-3 border-t border-gray-300 pt-2 flex justify-between font-semibold text-gray-800">
                                                <span>Total Skor:</span>
                                                <span>{{ number_format($rec->score, 4) }}</span>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-8 text-center">
                <p class="text-gray-600 mb-4">Rekomendasi ini dihitung menggunakan metode SAW (Simple Additive Weighting) berdasarkan nilai akademik dan minat bakat Anda.</p>
                <div class="flex justify-center flex-wrap gap-4">
                    <a href="{{ route('student.dashboard') }}" class="px-6 py-3 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition-colors">
                        Kembali ke Dashboard
                    </a>
                    <a href="{{ route('student.ulang') }}" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                        Kerjakan Ulang Kuisioner
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection