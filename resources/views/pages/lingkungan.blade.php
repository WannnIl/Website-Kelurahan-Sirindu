@extends('layouts.main')

@section('content')
<section id="lingkungan" style="padding-top: 5rem;">
    <div class="container">
        <div class="section-title">
            <h2>Data Wilayah & Lingkungan</h2>
            <p>Informasi geografis dan demografis Kelurahan Sirindu</p>
        </div>
        
        <div class="card-grid">
            @forelse($lingkungans as $lingkungan)
                <div class="glass-card" style="display: flex; flex-direction: column; gap: 1rem;">
                    @if($lingkungan->image)
                        <img src="{{ asset('storage/' . $lingkungan->image) }}" alt="{{ $lingkungan->name }}" style="width: 100%; height: 200px; object-fit: cover; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                    @else
                        <div style="width: 100%; height: 200px; background: rgba(255,255,255,0.2); border-radius: 12px; display:flex; align-items:center; justify-content:center; color: var(--primary-dark); font-size: 3rem; backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.4);">
                            🏡
                        </div>
                    @endif
                    
                    <h3 style="color: var(--primary-dark); margin-bottom: 0.5rem; font-size: 1.5rem;">{{ $lingkungan->name }}</h3>
                    
                    <div style="display: flex; flex-direction: column; gap: 0.5rem; font-size: 0.95rem; color: var(--text-main); opacity: 0.9;">
                        <p style="margin: 0; display: flex; align-items: flex-start; gap: 0.5rem;"><strong>🗺️ Luas Wilayah:</strong> {{ $lingkungan->area_size ?: '-' }}</p>
                        <p style="margin: 0; display: flex; align-items: flex-start; gap: 0.5rem;"><strong>👥 Populasi:</strong> {{ $lingkungan->population ?: '-' }}</p>
                        <p style="margin: 0; display: flex; align-items: flex-start; gap: 0.5rem;"><strong>💼 Mata Pencaharian:</strong> {{ $lingkungan->livelihood ?: '-' }}</p>
                    </div>
                    
                    <hr style="border: 0; border-top: 1px solid rgba(255,255,255,0.4); margin: 0.5rem 0;">
                    
                    <p style="font-size: 0.9rem; color: var(--text-main); line-height: 1.6; opacity: 0.85;">
                        {{ $lingkungan->description ?: 'Belum ada deskripsi untuk lingkungan ini.' }}
                    </p>
                </div>
            @empty
                <p style="text-align: center; grid-column: 1 / -1;" class="glass-card">Data lingkungan belum tersedia.</p>
            @endforelse
        </div>
    </div>
</section>
@endsection
