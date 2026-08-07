@extends('layouts.main')

@section('content')
<section id="pemerintahan" class="bg-light">
    <div class="container">
        <div class="section-title">
            <h2>SOTK</h2>
            <p>Susunan Organisasi dan Tata Kerja Kelurahan Sirindu</p>
        </div>
        
        <div class="card-grid">
            @forelse($officials as $official)
                <div class="official-card glass-card">
                    @if($official->photo)
                        <img src="{{ asset('storage/' . $official->photo) }}" alt="{{ $official->name }}" class="official-photo">
                    @else
                        <div class="official-photo" style="background: linear-gradient(135deg, #e0e7ff, #c7d2fe); display:flex; align-items:center; justify-content:center; font-size: 3rem; color: #4f46e5; font-weight: bold;">
                            {{ substr($official->name, 0, 1) }}
                        </div>
                    @endif
                    <h3 style="color: var(--text-main); margin-bottom: 0.5rem;">{{ $official->name }}</h3>
                    <p style="color: var(--primary); font-weight: 500;">{{ $official->position }}</p>
                </div>
            @empty
                <p style="text-align: center; grid-column: 1 / -1;">Data aparatur belum tersedia.</p>
            @endforelse
        </div>
    </div>
</section>
@endsection
