@extends('layouts.admin')

@section('title', 'Hasil Rekomendasi')
@section('subtitle', 'Lihat ranking jurusan untuk setiap siswa berdasarkan SAW')

@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Hasil Rekomendasi Siswa</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 min-h-screen p-6 font-sans">

  <div class="max-w-5xl mx-auto space-y-6">

    <!-- TABEL -->
    <div class="bg-white rounded-3xl p-8 border border-slate-100">

      <!-- HEADER -->
      <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-8">
        <div>
          <h2 class="text-xl font-medium text-slate-900 tracking-tight">Hasil rekomendasi siswa</h2>
          <p class="text-sm text-slate-400 mt-1">Ranking jurusan berdasarkan metode SAW</p>
        </div>
        <div class="flex items-center gap-2 bg-slate-50 border border-slate-200 rounded-xl px-3 py-2.5 w-full lg:w-64">
          <svg class="w-4 h-4 text-slate-400 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
          <input id="searchInput" type="text" placeholder="Cari nama siswa..." class="bg-transparent text-sm text-slate-700 placeholder-slate-400 outline-none w-full" />
        </div>
      </div>

      <!-- TABLE -->
      <div class="overflow-x-auto">
        <table class="w-full min-w-[640px]">
          <thead>
            <tr class="border-b border-slate-100">
              <th class="text-left pb-4 text-[11px] font-medium text-slate-400 uppercase tracking-widest pr-6">Nama siswa</th>
              <th class="text-left pb-4 text-[11px] font-medium text-slate-400 uppercase tracking-widest pr-6">Rekomendasi jurusan</th>
              <th class="text-left pb-4 text-[11px] font-medium text-slate-400 uppercase tracking-widest">Skor tertinggi</th>
            </tr>
          </thead>
          <tbody id="tableBody" class="divide-y divide-slate-50"></tbody>
        </table>
      </div>

      <!-- PAGINATION -->
      <div id="paginationControls" class="flex items-center justify-end gap-2 mt-6 flex-wrap"></div>
    </div>

    <!-- DISTRIBUSI CHART -->
    <div class="bg-white rounded-3xl p-8 border border-slate-100">
      <h2 class="text-xl font-medium text-slate-900 tracking-tight">Distribusi rekomendasi jurusan</h2>
      <p class="text-sm text-slate-400 mt-1 mb-8">Jurusan terbanyak direkomendasikan sebagai pilihan pertama</p>

      <div class="flex flex-col lg:flex-row items-center gap-10">

        <!-- DONUT -->
        <div class="relative flex-shrink-0 w-48 h-48">
          <svg id="donutSvg" viewBox="0 0 180 180" class="w-full h-full -rotate-90"></svg>
          <div class="absolute inset-0 flex flex-col items-center justify-center">
            <p id="donutNum" class="text-2xl font-medium text-slate-800">—</p>
            <p class="text-xs text-slate-400">jurusan</p>
          </div>
        </div>

        <!-- LEGEND -->
        <div class="flex-1 w-full">
          <div id="legend" class="space-y-4"></div>
          <div id="summaryRow" class="flex items-center gap-8 pt-5 mt-5 border-t border-slate-100"></div>
        </div>
      </div>
    </div>

  </div>

  <script>
    // Data dari Laravel backend
    const ALL_STUDENTS = {!! json_encode($studentRecommendations) !!};

    const JURUSAN_COLOR = {
      'RPL':       { dot:'bg-blue-500',   bar:'bg-blue-500',   hex:'#3b82f6' },
      'TKJ':       { dot:'bg-violet-500', bar:'bg-violet-500', hex:'#8b5cf6' },
      'AKL':       { dot:'bg-emerald-500',bar:'bg-emerald-500',hex:'#10b981' },
      'DKV':       { dot:'bg-amber-500',  bar:'bg-amber-500',  hex:'#f59e0b' },
      'Tata Boga': { dot:'bg-rose-500',   bar:'bg-rose-500',   hex:'#f43f5e' },
    };
    const FALLBACK_HEX = ['#3b82f6','#8b5cf6','#10b981','#f59e0b','#f43f5e'];

    const PAGE_SIZE = 5;
    let currentPage = 1;
    let filtered = [...ALL_STUDENTS];

    function scoreBarColor(s) {
      if (s >= 0.90) return 'bg-blue-500';
      if (s >= 0.85) return 'bg-violet-500';
      if (s >= 0.80) return 'bg-emerald-500';
      return 'bg-slate-400';
    }

    function badgeRank1(rec) {
      return `
        <div class="flex items-center gap-1.5 px-2.5 py-1.5 rounded-lg bg-blue-50 border border-blue-100">
          <span class="w-4 h-4 rounded bg-blue-600 text-white text-[10px] font-medium flex items-center justify-center flex-shrink-0">1</span>
          <div>
            <p class="text-[11px] font-medium text-blue-800 leading-none">${rec.j}</p>
            <p class="text-[10px] text-blue-400 mt-0.5 leading-none">${rec.s.toFixed(2)}</p>
          </div>
        </div>`;
    }
    function badgeRank2(rec) {
      return `
        <div class="flex items-center gap-1.5 px-2.5 py-1.5 rounded-lg bg-violet-50 border border-violet-100">
          <span class="w-4 h-4 rounded bg-violet-600 text-white text-[10px] font-medium flex items-center justify-center flex-shrink-0">2</span>
          <div>
            <p class="text-[11px] font-medium text-violet-800 leading-none">${rec.j}</p>
            <p class="text-[10px] text-violet-400 mt-0.5 leading-none">${rec.s.toFixed(2)}</p>
          </div>
        </div>`;
    }
    function badgeRank3(rec) {
      return `
        <div class="flex items-center gap-1.5 px-2.5 py-1.5 rounded-lg bg-slate-100 border border-slate-200">
          <span class="w-4 h-4 rounded bg-slate-500 text-white text-[10px] font-medium flex items-center justify-center flex-shrink-0">3</span>
          <div>
            <p class="text-[11px] font-medium text-slate-600 leading-none">${rec.j}</p>
            <p class="text-[10px] text-slate-400 mt-0.5 leading-none">${rec.s.toFixed(2)}</p>
          </div>
        </div>`;
    }

    function renderTable() {
      const totalPages = Math.max(1, Math.ceil(filtered.length / PAGE_SIZE));
      if (currentPage > totalPages) currentPage = totalPages;
      const start = (currentPage - 1) * PAGE_SIZE;
      const pageData = filtered.slice(start, start + PAGE_SIZE);
      const tbody = document.getElementById('tableBody');

      if (pageData.length === 0) {
        tbody.innerHTML = `<tr><td colspan="3" class="text-center py-10 text-sm text-slate-400">Tidak ada siswa ditemukan.</td></tr>`;
      } else {
        tbody.innerHTML = pageData.map(s => {
          const top = s.recs[0];
          const pct = Math.round(top.s * 100);
          const bc = scoreBarColor(top.s);
          return `
          <tr class="hover:bg-slate-50/60 transition">
            <td class="py-5 pr-6">
              <p class="text-sm font-medium text-slate-800">${s.name}</p>
              <p class="text-xs text-slate-400 mt-0.5 font-mono">${s.id}</p>
            </td>
            <td class="py-5 pr-6">
              <div class="flex items-center gap-2 flex-wrap">
                ${badgeRank1(s.recs[0])}
                ${s.recs[1] ? badgeRank2(s.recs[1]) : ''}
                ${s.recs[2] ? badgeRank3(s.recs[2]) : ''}
              </div>
            </td>
            <td class="py-5">
              <p class="text-xl font-medium text-slate-800 tracking-tight">${pct}%</p>
              <div class="w-28 h-0.5 rounded-full bg-slate-100 mt-2">
                <div class="h-full ${bc} rounded-full" style="width:${pct}%"></div>
              </div>
            </td>
          </tr>`;
        }).join('');
      }

      renderPagination(totalPages);
      renderChart();
    }

    function renderPagination(totalPages) {
      const start = (currentPage - 1) * PAGE_SIZE + 1;
      const end = Math.min(currentPage * PAGE_SIZE, filtered.length);
      const ctrl = document.getElementById('paginationControls');

      const infoText = filtered.length > 0
        ? `${start}–${end} dari ${filtered.length} siswa`
        : `0 dari 0 siswa`;

      const prevDisabled = currentPage === 1 ? 'opacity-40 cursor-not-allowed pointer-events-none' : 'hover:bg-slate-50 cursor-pointer';
      const nextDisabled = currentPage === totalPages || totalPages === 0 ? 'opacity-40 cursor-not-allowed pointer-events-none' : 'hover:bg-slate-50 cursor-pointer';

      let pageButtons = '';
      for (let i = 1; i <= totalPages; i++) {
        const active = i === currentPage
          ? 'bg-blue-500 text-white border-blue-500'
          : 'bg-white text-slate-600 border-slate-200 hover:bg-slate-50 cursor-pointer';
        pageButtons += `<button onclick="changePage(${i})" class="w-8 h-8 rounded-lg border text-xs font-medium transition ${active}">${i}</button>`;
      }

      ctrl.innerHTML = `
        <span class="text-xs text-slate-400 mr-2">${infoText}</span>
        <button onclick="changePage(${currentPage - 1})" class="w-8 h-8 flex items-center justify-center rounded-lg border border-slate-200 bg-white text-slate-600 transition ${prevDisabled}">
          <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
        </button>
        ${pageButtons}
        <button onclick="changePage(${currentPage + 1})" class="w-8 h-8 flex items-center justify-center rounded-lg border border-slate-200 bg-white text-slate-600 transition ${nextDisabled}">
          <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
        </button>`;
    }

    function changePage(p) {
      const totalPages = Math.ceil(filtered.length / PAGE_SIZE);
      if (p < 1 || p > totalPages) return;
      currentPage = p;
      renderTable();
    }

    function renderChart() {
      const dist = {};
      ALL_STUDENTS.forEach(s => {
        const j = s.recs[0].j;
        dist[j] = (dist[j] || 0) + 1;
      });
      const entries = Object.entries(dist).sort((a, b) => b[1] - a[1]);
      const total = ALL_STUDENTS.length;
      const R = 70, cx = 90, cy = 90;
      const circumference = 2 * Math.PI * R;

      const svg = document.getElementById('donutSvg');
      let offset = 0;
      svg.innerHTML = entries.map((e, i) => {
        const color = JURUSAN_COLOR[e[0]] ? JURUSAN_COLOR[e[0]].hex : FALLBACK_HEX[i % FALLBACK_HEX.length];
        const frac = e[1] / total;
        const dash = frac * circumference;
        const gap = circumference - dash;
        const el = `<circle cx="${cx}" cy="${cy}" r="${R}" fill="none" stroke="${color}" stroke-width="26"
          stroke-dasharray="${dash.toFixed(2)} ${gap.toFixed(2)}"
          stroke-dashoffset="${(-offset).toFixed(2)}" stroke-linecap="butt"/>`;
        offset += dash;
        return el;
      }).join('');

      document.getElementById('donutNum').textContent = entries.length;

      document.getElementById('legend').innerHTML = entries.map((e, i) => {
        const c = JURUSAN_COLOR[e[0]] || { dot: 'bg-slate-400', bar: 'bg-slate-400', hex: FALLBACK_HEX[i % FALLBACK_HEX.length] };
        const pct = Math.round((e[1] / total) * 100);
        return `
          <div class="flex items-center gap-3">
            <span class="w-2.5 h-2.5 rounded-full ${c.dot} flex-shrink-0"></span>
            <p class="text-sm font-medium text-slate-700 w-20">${e[0]}</p>
            <div class="flex-1 h-1 rounded-full bg-slate-100">
              <div class="h-full ${c.bar} rounded-full" style="width:${pct}%"></div>
            </div>
            <div class="text-right w-20">
              <p class="text-sm font-medium text-slate-800">${e[1]} siswa</p>
              <p class="text-xs text-slate-400">${pct}%</p>
            </div>
          </div>`;
      }).join('');

      const avgScore = (ALL_STUDENTS.reduce((s, d) => s + d.recs[0].s, 0) / total * 100).toFixed(1);
      document.getElementById('summaryRow').innerHTML = `
        <div>
          <p class="text-xs text-slate-400">Total siswa</p>
          <p class="text-lg font-medium text-slate-800 mt-0.5">${total} siswa</p>
        </div>
        <div>
          <p class="text-xs text-slate-400">Jurusan unik</p>
          <p class="text-lg font-medium text-slate-800 mt-0.5">${entries.length} jurusan</p>
        </div>
        <div>
          <p class="text-xs text-slate-400">Rata-rata skor</p>
          <p class="text-lg font-medium text-slate-800 mt-0.5">${avgScore}%</p>
        </div>`;
    }

    document.getElementById('searchInput').addEventListener('input', function () {
      const q = this.value.toLowerCase().trim();
      filtered = q
        ? ALL_STUDENTS.filter(s => s.name.toLowerCase().includes(q) || s.id.toLowerCase().includes(q))
        : [...ALL_STUDENTS];
      currentPage = 1;
      renderTable();
    });

    renderTable();
  </script>
</body>
</html>
@endsection
