@extends('layouts.main')

@section('content')
<section id="potensi">
    <div class="container">
        <div class="section-title">
            <h2>Potensi & UMKM</h2>
            <p>Kekayaan sumber daya alam dan kreativitas ekonomi warga</p>
        </div>
        
        <div class="card-grid">
            @forelse($potentials as $potential)
                <div class="article-card">
                    @if($potential->image)
                        <img src="{{ asset('storage/' . $potential->image) }}" alt="{{ $potential->title }}" class="article-img">
                    @else
                        <div class="article-img" style="background: linear-gradient(135deg, #f1f5f9, #cbd5e1); display:flex; align-items:center; justify-content:center; color:#64748b;">
                            <svg width="48" height="48" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                    @endif
                    <div class="article-content">
                        <h3 class="article-title">{{ $potential->title }}</h3>
                        <p class="prose" style="font-size: 0.95rem;">{{ Str::limit($potential->description, 120) }}</p>
                    </div>
                </div>
            @empty
                <p style="text-align: center; grid-column: 1 / -1;">Data potensi UMKM belum tersedia.</p>
            @endforelse
        </div>
    </div>
</section>
@endsection
