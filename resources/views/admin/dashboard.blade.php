@extends('admin.layouts.app')

@section('content')

{{-- Stat Overview --}}
<div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.25rem; margin-bottom: 2rem;">
    @php
        $articleCount   = \App\Models\Article::count();
        $agendaCount    = \App\Models\Agenda::count();
        $officialCount  = \App\Models\Official::count();
    @endphp

    <div style="background:#fff; border-radius:12px; padding:1.5rem; border:1px solid #e2e8f0; display:flex; align-items:center; gap:1rem; box-shadow:0 1px 3px rgba(0,0,0,0.06);">
        <div style="width:48px;height:48px;background:#eff6ff;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:1.5rem;">📰</div>
        <div>
            <div style="font-size:1.75rem;font-weight:700;color:#1e293b;">{{ $articleCount }}</div>
            <div style="font-size:0.85rem;color:#64748b;font-weight:500;">Total Berita</div>
        </div>
    </div>

    <div style="background:#fff; border-radius:12px; padding:1.5rem; border:1px solid #e2e8f0; display:flex; align-items:center; gap:1rem; box-shadow:0 1px 3px rgba(0,0,0,0.06);">
        <div style="width:48px;height:48px;background:#f0fdf4;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:1.5rem;">📅</div>
        <div>
            <div style="font-size:1.75rem;font-weight:700;color:#1e293b;">{{ $agendaCount }}</div>
            <div style="font-size:0.85rem;color:#64748b;font-weight:500;">Agenda Kegiatan</div>
        </div>
    </div>

    <div style="background:#fff; border-radius:12px; padding:1.5rem; border:1px solid #e2e8f0; display:flex; align-items:center; gap:1rem; box-shadow:0 1px 3px rgba(0,0,0,0.06);">
        <div style="width:48px;height:48px;background:#fef9c3;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:1.5rem;">👥</div>
        <div>
            <div style="font-size:1.75rem;font-weight:700;color:#1e293b;">{{ $officialCount }}</div>
            <div style="font-size:0.85rem;color:#64748b;font-weight:500;">Perangkat Kelurahan</div>
        </div>
    </div>
</div>

{{-- Quick Access --}}
<div class="card">
    <h2 style="font-size:1.1rem;font-weight:700;color:#1e293b;margin-bottom:1.5rem;">⚡ Akses Cepat</h2>
    <div style="display:grid; grid-template-columns:repeat(3, 1fr); gap:1rem;">
        @php
        $menus = [
            ['route' => 'admin.profiles.index',  'icon' => '📋', 'label' => 'Profil Kelurahan',  'desc' => 'Sejarah, Visi & Misi', 'color' => '#eff6ff', 'border' => '#2563eb'],
            ['route' => 'admin.officials.index',  'icon' => '👤', 'label' => 'Perangkat',          'desc' => 'Struktur Organisasi', 'color' => '#f0fdf4', 'border' => '#22c55e'],
            ['route' => 'admin.lingkungan.index', 'icon' => '🏡', 'label' => 'Data Lingkungan',    'desc' => '5 Wilayah Kelurahan', 'color' => '#fff7ed', 'border' => '#f97316'],
            ['route' => 'admin.potentials.index', 'icon' => '⭐', 'label' => 'Potensi & UMKM',    'desc' => 'Potensi Kelurahan',   'color' => '#fefce8', 'border' => '#eab308'],
            ['route' => 'admin.articles.index',   'icon' => '📰', 'label' => 'Berita & Kegiatan',  'desc' => 'Publikasi Berita',    'color' => '#fdf4ff', 'border' => '#a855f7'],
            ['route' => 'admin.agendas.index',    'icon' => '📅', 'label' => 'Agenda Kegiatan',    'desc' => 'Jadwal Acara',        'color' => '#fce7f3', 'border' => '#ec4899'],
        ];
        @endphp

        @foreach($menus as $menu)
        <a href="{{ route($menu['route']) }}" style="display:flex;align-items:center;gap:1rem;padding:1.1rem 1.25rem;background:{{ $menu['color'] }};border:1px solid {{ $menu['border'] }}33;border-left:4px solid {{ $menu['border'] }};border-radius:10px;text-decoration:none;transition:all 0.2s;" onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 4px 12px rgba(0,0,0,0.08)'" onmouseout="this.style.transform='';this.style.boxShadow=''">
            <span style="font-size:1.5rem;flex-shrink:0;">{{ $menu['icon'] }}</span>
            <div>
                <div style="font-weight:700;font-size:0.9rem;color:#1e293b;">{{ $menu['label'] }}</div>
                <div style="font-size:0.78rem;color:#64748b;margin-top:0.1rem;">{{ $menu['desc'] }}</div>
            </div>
        </a>
        @endforeach
    </div>
</div>

@endsection
