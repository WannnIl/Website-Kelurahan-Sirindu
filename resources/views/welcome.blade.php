@extends('layouts.main')

@section('title', 'Kelurahan Sirindu - Beranda')
@section('navbar_class', 'navbar-transparent')

@section('content')
<style>
    /* Slider Styles */
    .slider-container {
        position: relative;
        width: 100%;
        height: calc(100vh - 80px); /* Fill screen minus navbar */
        overflow: hidden;
        margin-top: -80px; /* Offset to go under navbar since navbar is fixed */
    }
    .slide {
        position: absolute;
        top: 0; left: 0;
        width: 100%; height: 100%;
        opacity: 0;
        transition: opacity 1s ease-in-out;
        background-size: cover;
        background-position: center;
    }
    .slide.active {
        opacity: 1;
    }
    .slide-overlay {
        position: absolute;
        inset: 0;
        background: rgba(0,0,0,0.4);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        color: white;
        text-align: center;
        padding: 2rem;
    }
    .slide-title {
        font-size: 3.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
        color: #ffffff !important;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.6);
    }
    .slide-subtitle {
        font-size: 1.5rem;
        color: #ffffff !important;
        text-shadow: 1px 1px 3px rgba(0,0,0,0.6);
    }
</style>

<div class="slider-container">
    <div class="slide active" style="background-image: url('{{ asset('images/home/slide1.png') }}');">
        <div class="slide-overlay">
            <h1 class="slide-title">Selamat Datang di Kelurahan Sirindu</h1>
            <p class="slide-subtitle">Lingkungan Asri, Warga Berseri</p>
        </div>
    </div>
    <div class="slide" style="background-image: url('{{ asset('images/home/slide2.jpg') }}');">
        <div class="slide-overlay">
            <h1 class="slide-title">Membangun Bersama</h1>
            <p class="slide-subtitle">Gotong royong untuk kemajuan desa</p>
        </div>
    </div>
    <div class="slide" style="background-image: url('{{ asset('images/home/slide3.jpg') }}');">
        <div class="slide-overlay">
            <h1 class="slide-title">Pelayanan Prima</h1>
            <p class="slide-subtitle">Berdedikasi melayani seluruh warga</p>
        </div>
    </div>
</div>

<section style="padding: 4rem 0;">
    <div class="container">
        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 2rem;">
            
            <!-- Berita Terkini -->
            <div>
                <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid var(--primary); padding-bottom: 0.5rem; margin-bottom: 2rem;" data-aos="fade-right">
                    <h2 style="color: var(--primary-dark); font-size: 1.8rem;">Berita Terkini</h2>
                    <a href="{{ route('berita') }}" class="btn btn-primary" style="font-size: 0.9rem; padding: 0.5rem 1rem;">Lihat Semua &rarr;</a>
                </div>
                
                <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                    @forelse($articles as $index => $article)
                        <div class="glass-card" style="display: flex; gap: 1.5rem; padding: 1.5rem; align-items: flex-start;" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                            @if($article->image)
                                <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" style="width: 200px; height: 130px; object-fit: cover; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                            @else
                                <div style="width: 200px; height: 130px; background: rgba(0,0,0,0.03); border-radius: 12px; display:flex; align-items:center; justify-content:center; color: var(--text-light); border: 1px solid var(--border);">
                                    <svg width="40" height="40" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                </div>
                            @endif
                            <div style="flex: 1;">
                                <div style="font-size: 0.9rem; color: var(--text-light); margin-bottom: 0.5rem; font-weight: 600; display: flex; align-items: center; gap: 0.25rem;">
                                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                    {{ \Carbon\Carbon::parse($article->published_at)->format('d F Y') }}
                                </div>
                                <h3 style="font-size: 1.4rem; margin-bottom: 0.5rem; line-height: 1.3;"><a href="{{ route('berita.show', $article->slug) }}" style="color: var(--primary-dark); text-decoration: none;">{{ $article->title }}</a></h3>
                                <p style="font-size: 1rem; color: var(--text-main); line-height: 1.5; margin-bottom: 1rem; opacity: 0.8;">{{ Str::limit(strip_tags($article->content), 120) }}</p>
                                <a href="{{ route('berita.show', $article->slug) }}" style="color: var(--primary-dark); text-decoration: none; font-weight: 700; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.5px;">Baca selengkapnya &rarr;</a>
                            </div>
                        </div>
                    @empty
                        <p style="text-align: center; color: var(--text-main); padding: 2rem;" class="glass-card">Belum ada berita terbaru.</p>
                    @endforelse
                </div>
            </div>

            <!-- Agenda Kegiatan -->
            <div data-aos="fade-left" data-aos-delay="200">
                <div style="border-bottom: 2px solid var(--primary); padding-bottom: 0.5rem; margin-bottom: 2rem;">
                    <h2 style="color: var(--primary-dark); font-size: 1.8rem;">Agenda Kegiatan</h2>
                </div>
                
                <div class="glass-card" style="display: flex; flex-direction: column; gap: 1.5rem; padding: 2rem;">
                    @forelse($agendas as $agenda)
                        <div style="border-left: 4px solid var(--primary); padding-left: 1rem;">
                            <div style="font-weight: 700; color: var(--primary-dark); margin-bottom: 0.25rem; font-size: 0.95rem;">
                                {{ \Carbon\Carbon::parse($agenda->date)->format('d F Y') }}
                            </div>
                            <h4 style="color: var(--text-main); margin-bottom: 0.5rem; font-size: 1.1rem; line-height: 1.3;">{{ $agenda->title }}</h4>
                            <div style="font-size: 0.9rem; color: var(--text-light); display: flex; flex-direction: column; gap: 0.25rem;">
                                <span style="display: flex; align-items: center; gap: 0.35rem;">
                                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                    {{ $agenda->location }}
                                </span>
                                @if($agenda->time) 
                                <span style="display: flex; align-items: center; gap: 0.35rem;">
                                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                    {{ \Carbon\Carbon::parse($agenda->time)->format('H:i') }} WIB
                                </span> 
                                @endif
                            </div>
                        </div>
                    @empty
                        <p style="text-align: center; color: var(--text-main); opacity: 0.8;">Tidak ada agenda dalam waktu dekat.</p>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const slides = document.querySelectorAll('.slide');
        let currentSlide = 0;
        
        if (slides.length > 0) {
            setInterval(() => {
                slides[currentSlide].classList.remove('active');
                currentSlide = (currentSlide + 1) % slides.length;
                slides[currentSlide].classList.add('active');
            }, 5000); // Ganti gambar setiap 5 detik
        }
    });
</script>
@endsection
