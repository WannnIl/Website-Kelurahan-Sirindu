@extends('layouts.main')

@section('content')

<!-- Minimalist Hero Section -->
<section class="page-hero" style="background: linear-gradient(135deg, var(--primary-dark), #0f172a); min-height: 40vh; height: auto; padding: 8rem 0 4rem; display: flex; align-items: center;">
    <div class="container" style="position: relative; z-index: 2; text-align: center;">
        <h1 style="font-size: 3rem; font-weight: 800; color: white; margin-bottom: 1rem; letter-spacing: -1px;" data-aos="fade-up">Data Wilayah & Lingkungan</h1>
        <p style="font-size: 1.15rem; color: rgba(255,255,255,0.8); max-width: 600px; margin: 0 auto; line-height: 1.6;" data-aos="fade-up" data-aos-delay="100">Jelajahi potensi, keragaman, dan informasi geografis dari kelima lingkungan di Kelurahan Sirindu.</p>
    </div>
    
    <!-- Abstract Background Pattern -->
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; opacity: 0.1; background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 40px 40px;"></div>
</section>

<section style="padding: 6rem 0; background-color: #f8fafc; overflow: hidden;">
    <div class="container">
        
        <div class="lingkungan-wrapper">
            @forelse($lingkungans as $index => $lingkungan)
                @php
                    $popString = $lingkungan->population ?: '0';
                    $popNum = (int) filter_var($popString, FILTER_SANITIZE_NUMBER_INT);
                    $totalPop = 4520; 
                    $percentage = $totalPop > 0 ? min(100, round(($popNum / $totalPop) * 100)) : 0;
                    $isEven = $index % 2 !== 0; 
                @endphp

                <div class="lingkungan-row {{ $isEven ? 'row-reversed' : '' }}">
                    
                    <!-- Image Column -->
                    <div class="lingkungan-img-col" data-aos="{{ $isEven ? 'fade-left' : 'fade-right' }}" data-aos-duration="1000">
                        @if($lingkungan->image)
                            <img src="{{ asset('storage/' . $lingkungan->image) }}" alt="{{ $lingkungan->name }}">
                        @else
                            <div class="lingkungan-placeholder">
                                <div class="placeholder-bg"></div>
                                <span class="placeholder-letter">{{ substr($lingkungan->name, 0, 1) }}</span>
                                <svg class="placeholder-icon" width="64" height="64" fill="none" stroke="currentColor" stroke-width="1"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                            </div>
                        @endif
                    </div>

                    <!-- Content Column -->
                    <div class="lingkungan-content-col" data-aos="{{ $isEven ? 'fade-right' : 'fade-left' }}" data-aos-duration="1000" data-aos-delay="200">
                        <div class="l-badge">0{{ $index + 1 }}</div>
                        <h2 class="l-title">{{ $lingkungan->name }}</h2>
                        <p class="l-desc">
                            {{ $lingkungan->description ?: 'Lingkungan ini merupakan bagian integral dari Kelurahan Sirindu yang terus berkembang dengan mengedepankan harmoni sosial dan semangat gotong royong antar warga.' }}
                        </p>
                        
                        <!-- Sleek Stats Grid -->
                        <div class="l-stats-grid">
                            <div class="l-stat-item">
                                <div class="l-stat-icon">
                                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                </div>
                                <div>
                                    <span class="l-stat-label">Luas Wilayah</span>
                                    <span class="l-stat-value">{{ $lingkungan->area_size ?: 'Belum didata' }}</span>
                                </div>
                            </div>
                            
                            <div class="l-stat-item">
                                <div class="l-stat-icon">
                                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                </div>
                                <div>
                                    <span class="l-stat-label">Mata Pencaharian Utama</span>
                                    <span class="l-stat-value">{{ $lingkungan->livelihood ?: 'Belum didata' }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Premium Population Bar -->
                        <div class="l-population-box">
                            <div class="pop-header">
                                <div style="display:flex; align-items:center; gap:0.5rem;">
                                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                    <span>Total Populasi</span>
                                </div>
                                <strong class="pop-number">{{ $lingkungan->population ?: '-' }}</strong>
                            </div>
                            <div class="pop-progress-track">
                                <div class="pop-progress-fill" style="width: {{ $percentage }}%;"></div>
                            </div>
                            <div class="pop-footer">
                                Mewakili <span style="font-weight: 700; color: var(--primary-dark);">{{ $percentage }}%</span> dari total demografi kelurahan
                            </div>
                        </div>

                    </div>
                </div>
            @empty
                <div style="text-align: center; padding: 5rem 0; color: var(--text-light);">
                    <svg width="64" height="64" fill="none" stroke="currentColor" stroke-width="1" style="margin: 0 auto 1.5rem; opacity: 0.5;"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path></svg>
                    <h3 style="font-size: 1.5rem; color: var(--text-main);">Data Lingkungan Belum Tersedia</h3>
                    <p>Silakan tambahkan data lingkungan melalui panel admin.</p>
                </div>
            @endforelse
        </div>
        
    </div>
</section>

<style>
    .lingkungan-wrapper {
        display: flex;
        flex-direction: column;
        gap: 6rem;
    }

    .lingkungan-row {
        display: flex;
        align-items: center;
        gap: 4rem;
        background: white;
        border-radius: 30px;
        padding: 3rem;
        box-shadow: 0 20px 40px rgba(0,0,0,0.03);
        border: 1px solid rgba(0,0,0,0.02);
    }

    .lingkungan-row.row-reversed {
        flex-direction: row-reverse;
    }

    .lingkungan-img-col {
        flex: 1;
        position: relative;
    }

    .lingkungan-img-col img {
        width: 100%;
        height: 400px;
        object-fit: cover;
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        transition: transform 0.5s ease;
    }
    
    .lingkungan-row:hover .lingkungan-img-col img {
        transform: scale(1.02);
    }

    .lingkungan-placeholder {
        width: 100%;
        height: 400px;
        border-radius: 20px;
        background: linear-gradient(135deg, #f1f5f9, #e2e8f0);
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
        box-shadow: 0 15px 35px rgba(0,0,0,0.05);
    }
    
    .placeholder-bg {
        position: absolute;
        width: 150%;
        height: 150%;
        background: radial-gradient(circle, rgba(255,255,255,0.4) 0%, transparent 60%);
        top: -25%;
        left: -25%;
    }

    .placeholder-letter {
        font-size: 8rem;
        font-weight: 900;
        color: rgba(148, 163, 184, 0.2);
        position: absolute;
        line-height: 1;
    }

    .placeholder-icon {
        color: #94a3b8;
        position: relative;
        z-index: 2;
    }

    .lingkungan-content-col {
        flex: 1.2;
    }

    .l-badge {
        display: inline-block;
        font-size: 1rem;
        font-weight: 800;
        color: var(--primary);
        letter-spacing: 2px;
        margin-bottom: 1rem;
        position: relative;
    }
    
    .l-badge::before {
        content: '';
        position: absolute;
        left: -2rem;
        top: 50%;
        width: 1.5rem;
        height: 2px;
        background: var(--primary);
    }

    .l-title {
        font-size: 2.2rem;
        font-weight: 800;
        color: var(--primary-dark);
        margin-bottom: 1.2rem;
        line-height: 1.2;
    }

    .l-desc {
        font-size: 1.05rem;
        color: var(--text-light);
        line-height: 1.8;
        margin-bottom: 2rem;
    }

    .l-stats-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
        margin-bottom: 2.5rem;
    }

    .l-stat-item {
        display: flex;
        align-items: flex-start;
        gap: 1rem;
    }

    .l-stat-icon {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        background: rgba(37,99,235,0.05);
        color: var(--primary);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .l-stat-label {
        display: block;
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: var(--text-light);
        margin-bottom: 0.25rem;
    }

    .l-stat-value {
        font-weight: 700;
        color: var(--primary-dark);
        font-size: 1rem;
    }

    .l-population-box {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        padding: 1.5rem;
        position: relative;
        overflow: hidden;
    }
    
    .l-population-box::after {
        content: '';
        position: absolute;
        top: 0; right: 0; width: 100px; height: 100px;
        background: radial-gradient(circle, rgba(37,99,235,0.05) 0%, transparent 70%);
        border-radius: 50%;
        transform: translate(30%, -30%);
    }

    .pop-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: var(--text-main);
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .pop-number {
        font-size: 1.5rem;
        color: var(--primary-dark);
        font-weight: 800;
    }

    .pop-progress-track {
        width: 100%;
        height: 6px;
        background: #e2e8f0;
        border-radius: 99px;
        margin-bottom: 1rem;
        overflow: hidden;
    }

    .pop-progress-fill {
        height: 100%;
        background: linear-gradient(90deg, var(--primary), #38bdf8);
        border-radius: 99px;
        position: relative;
    }
    
    .pop-progress-fill::after {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
        animation: shimmer 2s infinite;
    }
    
    @keyframes shimmer {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(100%); }
    }

    .pop-footer {
        font-size: 0.85rem;
        color: var(--text-light);
    }

    /* Responsive */
    @media (max-width: 992px) {
        .lingkungan-row, .lingkungan-row.row-reversed {
            flex-direction: column;
            gap: 2rem;
            padding: 2rem;
        }
        .lingkungan-img-col img, .lingkungan-placeholder {
            height: 300px;
        }
        .l-badge::before {
            display: none;
        }
        .l-badge {
            left: 0;
        }
    }
    
    @media (max-width: 576px) {
        .l-stats-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection
