@extends('layouts.main')

@section('title', 'Profil Kelurahan - Sirindu')
@section('navbar_class', 'navbar-transparent')

@section('content')
<style>
    /* Full Width Hero Section */
    .page-hero {
        height: 50vh;
        min-height: 400px;
        background-image: url('{{ asset('images/home/slide1.jpg') }}'); /* Ganti dengan gambar profil jika ada */
        background-size: cover;
        background-position: center;
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        margin-top: -80px; /* Pull up to cover transparent navbar */
        margin-bottom: 5rem;
    }
    
    .page-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.55);
    }

    .page-hero-content {
        position: relative;
        z-index: 1;
        padding: 0 2rem;
    }

    .page-hero h1 {
        font-size: 3.5rem;
        color: white;
        font-weight: 800;
        margin-bottom: 1rem;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
    }

    .page-hero p {
        font-size: 1.15rem;
        color: rgba(255, 255, 255, 0.9);
        max-width: 600px;
        margin: 0 auto;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
    }

    /* Dekorasi Lingkaran Latar Belakang (Glassmorphism enhancer) */
    .bg-blob {
        position: absolute;
        width: 300px;
        height: 300px;
        background: linear-gradient(135deg, rgba(37, 99, 235, 0.1) 0%, rgba(30, 64, 175, 0.05) 100%);
        border-radius: 50%;
        filter: blur(40px);
        z-index: -1;
    }

    .bg-blob-1 { top: 0; left: -100px; }
    .bg-blob-2 { bottom: 200px; right: -150px; }

    /* VISI SECTION - Unik dan Elegan */
    .visi-container {
        display: flex;
        flex-direction: column;
        background: linear-gradient(135deg, #eef2ff 0%, #c7d2fe 100%); /* Elegant soft indigo */
        border: 1px solid rgba(255, 255, 255, 0.8);
        border-radius: 24px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.04);
        overflow: hidden;
        margin-bottom: 5rem;
        position: relative;
    }

    @media (min-width: 992px) {
        .visi-container {
            flex-direction: row;
        }
    }

    .visi-label {
        background: var(--primary);
        color: white;
        padding: 3rem 2rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .visi-author {
        opacity: 0.9;
        font-size: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: var(--primary-dark);
        font-weight: 600;
    }
    
    .visi-author::before {
        content: '';
        width: 30px;
        height: 2px;
        background-color: var(--primary-dark);
        display: inline-block;
    }

    @media (min-width: 992px) {
        .visi-label {
            width: 250px;
            padding: 4rem 3rem;
        }
    }

    .visi-label h2 {
        font-size: 2.5rem;
        font-weight: 800;
        letter-spacing: 4px;
        margin: 0;
        text-transform: uppercase;
        color: white;
    }

    @media (min-width: 992px) {
        .visi-label h2 {
            writing-mode: vertical-rl;
            transform: rotate(180deg);
            font-size: 4rem;
        }
    }

    .visi-content {
        padding: 3rem 2rem;
        position: relative;
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    @media (min-width: 992px) {
        .visi-content {
            padding: 4rem 4rem;
        }
    }

    /* Watermark Kutipan */
    .visi-content::before {
        content: '"';
        position: absolute;
        top: -20px;
        left: 20px;
        font-size: 15rem;
        font-family: serif;
        color: rgba(37, 99, 235, 0.05);
        line-height: 1;
        z-index: -1;
    }

    .visi-text {
        font-size: 1.5rem;
        line-height: 1.6;
        color: var(--primary-dark);
        font-weight: 700;
        margin-bottom: 1.5rem;
    }

    @media (min-width: 992px) {
        .visi-text {
            font-size: 1.8rem;
        }
    }

    /* MISI SECTION - Kartu Staggered/Zigzag dengan Angka Besar */
    .misi-header {
        margin-bottom: 3rem;
        text-align: center;
    }

    .misi-header h3 {
        font-size: 2rem;
        color: var(--primary-dark);
        font-weight: 800;
    }

    .misi-list {
        display: grid;
        grid-template-columns: 1fr;
        gap: 2rem;
        margin-bottom: 6rem;
    }

    @media (min-width: 768px) {
        .misi-list {
            grid-template-columns: repeat(2, 1fr);
            gap: 2.5rem;
        }
        
        /* Efek turun-naik (zigzag) pada kolom kedua */
        .misi-item:nth-child(even) {
            transform: translateY(3rem);
        }
    }

    .misi-item {
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.9);
        border-radius: 20px;
        padding: 2.5rem;
        position: relative;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.03);
        transition: all 0.3s ease;
        border-bottom: 4px solid transparent;
    }

    .misi-item:hover {
        background: rgba(255, 255, 255, 0.9);
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(37, 99, 235, 0.08);
        border-bottom: 4px solid var(--primary);
    }

    /* Jika layar besar, sesuaikan efek hover agar zigzag tetap terjaga posisinya */
    @media (min-width: 768px) {
        .misi-item:nth-child(even):hover {
            transform: translateY(calc(3rem - 5px));
        }
    }

    .misi-number {
        position: absolute;
        top: -15px;
        right: 10px;
        font-size: 6rem;
        font-weight: 900;
        color: rgba(37, 99, 235, 0.05);
        line-height: 1;
        transition: color 0.3s ease;
    }

    .misi-item:hover .misi-number {
        color: rgba(37, 99, 235, 0.1);
    }

    .misi-title {
        font-size: 1.25rem;
        color: var(--primary-dark);
        font-weight: 700;
        margin-bottom: 1rem;
        position: relative;
        z-index: 1;
    }

    .misi-desc {
        color: var(--text-main);
        opacity: 0.85;
        line-height: 1.6;
        position: relative;
        z-index: 1;
    }

    /* SEJARAH SECTION */
    .sejarah-container {
        background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%); /* Very dark elegant blue */
        border-radius: 24px;
        padding: 3rem 2rem;
        box-shadow: 0 4px 20px rgba(0,0,0,0.03);
        border: 1px solid var(--border);
        margin-bottom: 4rem;
    }
    
    .sejarah-container .prose h1,
    .sejarah-container .prose h2,
    .sejarah-container .prose h3,
    .sejarah-container .prose h4,
    .sejarah-container .prose strong,
    .sejarah-container .prose b {
        color: white !important;
    }

    .sejarah-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 2rem;
        align-items: start;
    }

    @media (min-width: 992px) {
        .sejarah-container {
            padding: 4rem;
        }
        .sejarah-grid {
            grid-template-columns: 1fr 1.6fr;
            gap: 4rem;
        }
    }
</style>

<!-- Full Width Hero Background -->
<div class="page-hero">
    <div class="page-hero-content">
        <h1>Profil Kelurahan</h1>
        <p>Mengenal lebih dekat sejarah, visi, dan misi Pemerintah Kelurahan Sirindu.</p>
    </div>
</div>

<div class="container" style="position: relative;">
    <!-- Efek Latar Belakang -->
    <div class="bg-blob bg-blob-1"></div>
    <div class="bg-blob bg-blob-2"></div>

    <!-- Sejarah Kelurahan (Dipindah ke atas) -->
    <div style="margin-bottom: 6rem;" data-aos="fade-up">
        <h2 style="font-size: 2.2rem; color: var(--primary-dark); font-weight: 800; text-align: center; margin-bottom: 3rem;">Sejarah Kelurahan</h2>
        <div class="sejarah-container sejarah-grid">
            <!-- Placeholder Gambar Sejarah -->
            <div>
                <div style="width: 100%; height: 280px; background-color: rgba(255, 255, 255, 0.05); border-radius: 16px; overflow: hidden; position: relative; border: 2px dashed rgba(255, 255, 255, 0.2);">
                    <!-- Placeholder Content -->
                    <div style="position: absolute; inset: 0; display: flex; flex-direction: column; align-items: center; justify-content: center; color: rgba(255, 255, 255, 0.5);">
                        <svg width="48" height="48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="margin-bottom: 1rem;"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
                        <span style="font-weight: 500;">[ Placeholder Gambar Sejarah ]</span>
                        <span style="font-size: 0.85rem; margin-top: 0.5rem; text-align: center; padding: 0 1rem;">Ganti kode &lt;img&gt; di dalam file profil.blade.php</span>
                    </div>
                    <!-- Untuk mengganti gambar, hapus komentar pada tag img di bawah ini dan sesuaikan letak gambarnya -->
                        <img src="{{ asset('images/sejarah.png') }}" alt="Sejarah Kelurahan Sirindu" style="width: 100%; height: 100%; object-fit: cover; position: relative; z-index: 1;">
                </div>
            </div>
            
            <!-- Konten Sejarah -->
            <div>
                <div class="prose" style="max-width: none; color: rgba(255, 255, 255, 0.85); line-height: 1.8;">
                    {!! $profiles['history']->content ?? 'Belum ada data sejarah.' !!}
                </div>
            </div>
        </div>
    </div>

    <!-- Sub-Header Visi Misi -->
    <div style="text-align: center; margin-bottom: 3rem;" data-aos="fade-up">
        <h2 style="font-size: 2.5rem; color: var(--primary-dark); font-weight: 800; margin-bottom: 1rem;">Visi & Misi</h2>
        <p style="font-size: 1.15rem; color: var(--text-light); max-width: 600px; margin: 0 auto;">Arah pembangunan strategis serta cita-cita panjang Pemerintah Kelurahan Sirindu untuk masyarakat.</p>
    </div>

    <!-- Visi Utama (Split Vertical/Horizontal Layout) -->
    <div class="visi-container" data-aos="zoom-in-up">
        <div class="visi-label">
            <h2>VISI</h2>
        </div>
        <div class="visi-content">
            <h3 class="visi-text">
                "Terciptanya Tata Kelola Pemerintahan Kelurahan Yang Baik Dan Bersih, Guna Mewujudkan Kehidupan Masyarakat Yang Adil, Makmur, Damai, Aman, Tentram Dan Sejahtera."
            </h3>
            <div style="display: flex; align-items: center; gap: 1rem;">
                <div style="height: 2px; width: 40px; background: var(--primary-dark);"></div>
                <span style="color: var(--primary-dark); font-weight: 600;">Pemerintah Kelurahan Sirindu</span>
            </div>
        </div>
    </div>

    <!-- Misi Pembangunan (Zigzag Cards) -->
    <div class="misi-header" data-aos="fade-up">
        <h3>Misi Kelurahan</h3>
    </div>
    
    <div class="misi-list">
        <div class="misi-item" data-aos="fade-up" data-aos-delay="100">
            <div class="misi-number">01</div>
            <h4 class="misi-title">Pemberdayaan SDM & Sumber Daya Alam</h4>
            <p class="misi-desc">Mengoptimalkan kualitas sumber daya manusia dan mengelola potensi sumber daya alam wilayah pesisir serta perbukitan secara berkelanjutan.</p>
        </div>
        
        <div class="misi-item" data-aos="fade-up" data-aos-delay="200">
            <div class="misi-number">02</div>
            <h4 class="misi-title">Pemberdayaan Ekonomi Kerakyatan</h4>
            <p class="misi-desc">Mendorong kemandirian ekonomi masyarakat melalui pengembangan usaha mikro (UMKM), potensi perikanan, dan hasil pertanian.</p>
        </div>
        
        <div class="misi-item" data-aos="fade-up" data-aos-delay="300">
            <div class="misi-number">03</div>
            <h4 class="misi-title">Pemerintahan Transparan & Pelayanan Prima</h4>
            <p class="misi-desc">Menyelenggarakan tata kelola pemerintahan desa yang transparan, akuntabel, serta memberikan pelayanan publik yang cepat, tepat, dan benar.</p>
        </div>
        
        <div class="misi-item" data-aos="fade-up" data-aos-delay="400">
            <div class="misi-number">04</div>
            <h4 class="misi-title">Kearifan Lokal & Gotong Royong</h4>
            <p class="misi-desc">Memelihara keharmonisan sosial, adat istiadat setempat, serta meningkatkan budaya gotong royong dalam kehidupan bermasyarakat.</p>
        </div>
    </div>



    <!-- Visi Misi Tambahan (Opsional dari Admin Panel) -->
    @if(isset($profiles['vision_mission']) && strip_tags($profiles['vision_mission']->content) != '')
    <div style="margin-top: 3rem; margin-bottom: 4rem; padding-top: 2rem; border-top: 1px solid var(--border);">
        <h4 style="font-size: 1.2rem; color: var(--text-light); margin-bottom: 1rem;">Catatan Tambahan (Dari Admin Panel):</h4>
        <div class="prose" style="max-width: none; color: var(--text-main);">
            {!! $profiles['vision_mission']->content !!}
        </div>
    </div>
    @endif

</div>
@endsection
