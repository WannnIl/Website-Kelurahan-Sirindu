@extends('layouts.main')

@section('title', 'Program Kerja KKN - Kelurahan Sirindu')
@section('navbar_class', 'navbar-transparent')

@section('styles')
<style>
    /* Full Width Hero Section */
    .page-hero {
        height: 50vh;
        min-height: 400px;
        background-image: url('{{ asset('images/home/slide2.jpg') }}'); /* Ganti dengan foto bersama KKN jika ada */
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
        max-width: 700px;
        margin: 0 auto;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
    }

    /* Proker Utama Section */
    .proker-utama {
        margin-bottom: 4rem;
    }

    .proker-utama-card {
        background: rgba(255, 255, 255, 0.4);
        backdrop-filter: blur(24px) saturate(180%);
        -webkit-backdrop-filter: blur(24px) saturate(180%);
        border: 1px solid rgba(255, 255, 255, 0.6);
        border-radius: 24px;
        padding: 3rem;
        box-shadow: 0 12px 40px 0 rgba(31, 38, 135, 0.08), inset 0 0 0 1px rgba(255, 255, 255, 0.5);
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .proker-utama-card::before {
        content: '';
        position: absolute;
        top: -50px;
        right: -50px;
        width: 150px;
        height: 150px;
        background: radial-gradient(circle, rgba(56,189,248,0.4) 0%, rgba(255,255,255,0) 70%);
        border-radius: 50%;
    }

    .proker-utama-icon {
        width: 80px;
        height: 80px;
        background: var(--primary);
        color: white;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 10px 25px rgba(37, 99, 235, 0.3);
    }

    .proker-utama-title {
        font-size: 2rem;
        color: var(--text-main);
        margin-bottom: 1rem;
    }

    .proker-utama-desc {
        color: var(--text-light);
        font-size: 1.1rem;
        max-width: 800px;
        line-height: 1.8;
    }

    /* Tim Mahasiswa Section */
    .mahasiswa-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin-bottom: 4rem;
    }

    .mahasiswa-card {
        background: rgba(255, 255, 255, 0.35);
        backdrop-filter: blur(24px) saturate(180%);
        -webkit-backdrop-filter: blur(24px) saturate(180%);
        border: 1px solid rgba(255, 255, 255, 0.5);
        border-radius: 24px;
        padding: 2rem;
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.07), inset 0 0 0 1px rgba(255, 255, 255, 0.4);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        text-align: center;
    }

    .mahasiswa-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 40px 0 rgba(31, 38, 135, 0.15), inset 0 0 0 1px rgba(255, 255, 255, 0.6);
        background: rgba(255, 255, 255, 0.45);
    }

    .mahasiswa-photo {
        width: 140px;
        height: 140px;
        border-radius: 50%;
        object-fit: cover;
        margin: 0 auto 1.5rem auto;
        border: 4px solid rgba(255, 255, 255, 0.8);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        background-color: #e2e8f0;
    }

    .mahasiswa-name {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--text-main);
        margin-bottom: 0.25rem;
    }

    .mahasiswa-nim {
        font-size: 0.9rem;
        color: var(--primary);
        font-weight: 600;
        margin-bottom: 0.25rem;
    }

    .mahasiswa-prodi {
        font-size: 0.95rem;
        color: var(--text-light);
        margin-bottom: 0.75rem;
    }

    .mahasiswa-divisi {
        display: inline-block;
        background: var(--primary);
        color: white;
        padding: 0.25rem 0.75rem;
        border-radius: 99px;
        font-size: 0.8rem;
        font-weight: 600;
        margin-bottom: 1.5rem;
        box-shadow: 0 4px 10px rgba(37, 99, 235, 0.2);
    }

    .proker-individu-badge {
        display: inline-block;
        background: rgba(239, 246, 255, 0.7);
        color: var(--primary-dark);
        padding: 0.4rem 1rem;
        border-radius: 99px;
        font-size: 0.85rem;
        font-weight: 600;
        border: 1px solid rgba(191, 219, 254, 0.5);
    }
    
    /* Proker Modal Styles */
    .modal-overlay {
        position: fixed;
        top: 0; left: 0; right: 0; bottom: 0;
        background: rgba(15, 23, 42, 0.6);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        z-index: 2000;
        display: none;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .modal-overlay.active {
        display: flex;
        opacity: 1;
    }
    
    .modal-container {
        background: var(--white);
        border-radius: 24px;
        width: 90%;
        max-width: 600px;
        max-height: 90vh;
        overflow-y: auto;
        position: relative;
        transform: translateY(30px) scale(0.95);
        transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }
    
    .modal-overlay.active .modal-container {
        transform: translateY(0) scale(1);
    }
    
    .modal-close {
        position: absolute;
        top: 20px;
        right: 20px;
        background: #f1f5f9;
        color: #64748b;
        border: none;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        font-size: 1.5rem;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s;
        z-index: 10;
    }
    
    .modal-close:hover {
        background: #e2e8f0;
        color: #0f172a;
        transform: rotate(90deg);
    }
    
    .modal-header {
        padding: 2.5rem 2.5rem 1.5rem;
        border-bottom: 1px solid var(--border);
    }
    
    .modal-header h3 {
        color: var(--primary-dark);
        font-size: 1.5rem;
        margin: 0;
        line-height: 1.4;
        font-weight: 800;
        padding-right: 2rem;
    }
    
    .modal-body {
        padding: 2.5rem;
    }
    
    .modal-image-placeholder {
        width: 100%;
        height: 250px;
        background: #f8fafc;
        border: 2px dashed #cbd5e1;
        border-radius: 16px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: #94a3b8;
        margin-bottom: 2rem;
        transition: all 0.3s ease;
    }
    
    .modal-image-placeholder:hover {
        background: #f1f5f9;
        border-color: #94a3b8;
    }
    
    .modal-content-text {
        color: var(--text-main);
        line-height: 1.7;
        font-size: 1.05rem;
    }

    .btn-detail-proker {
        background: var(--primary);
        color: white;
        border: none;
        padding: 0.6rem 1.5rem;
        border-radius: 99px;
        font-size: 0.9rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 1.5rem;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        box-shadow: 0 4px 10px rgba(37,99,235,0.2);
    }
    
    .btn-detail-proker:hover {
        background: var(--primary-dark);
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(37,99,235,0.3);
    }

</style>
@endsection

@section('content')
<!-- Full Width Hero Background -->
<div class="page-hero">
    <div class="page-hero-content">
        <h1>Mahasiswa KKN</h1>
        <p>Informasi Program Kerja Utama dan Program Kerja Individu dari Tim Mahasiswa Kuliah Kerja Nyata Tematik (KKN-T) Gelombang 116 Universitas Hasanuddin di Kelurahan Sirindu.</p>
    </div>
</div>

<div class="container" style="position: relative;">

    <!-- PROKER UTAMA -->
    <section class="proker-utama" data-aos="fade-up">
        <div class="section-title">
            <h2>Program Kerja Utama</h2>
            <p>Program unggulan yang dilaksanakan secara berkelompok</p>
        </div>
        
        <div class="proker-utama-card" data-aos="zoom-in" data-aos-delay="100">
            <div class="proker-utama-icon">
                <svg width="36" height="36" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
            </div>
            <h3 class="proker-utama-title">Edukasi & Implementasi Lubang Sampah Organik</h3>
            <p class="proker-utama-desc">
                [Deskripsi program kerja utama. Silakan tuliskan latar belakang, tujuan, serta sasaran dari program kerja kelompok yang dijalankan di Kelurahan Sirindu di sini. Anda dapat mengedit teks ini langsung di dalam file kode kkn.blade.php]
            </p>
        </div>
    </section>

    <!-- PROFIL & PROKER INDIVIDU -->
    <section class="tim-kkn">
        <div class="section-title" data-aos="fade-up">
            <h2>Profil & Proker Individu</h2>
            <p>Mengenal lebih dekat tim KKN beserta program kerja masing-masing (7 Proker Individu)</p>
        </div>

        <div class="mahasiswa-grid">
            
            <!-- Mahasiswa 1 -->
            <div class="mahasiswa-card" data-aos="fade-up" data-aos-delay="100">
                <!-- Gunakan gambar default atau ganti dengan link foto asli -->
                <img src="{{ asset('images/kkn/Alif.JPG') }}" alt="Foto Koordinator" class="mahasiswa-photo">
                <h3 class="mahasiswa-name">Muhammad Alif Anshar</h3>
                <div class="mahasiswa-nim">NIM: D121231097</div>
                <div class="mahasiswa-prodi">Prodi: Teknik Informatika</div>
                <div class="mahasiswa-divisi">Koordinator</div>
                
                <div class="proker-individu-badge">Proker Individu</div>
                <h4 class="proker-title" style="font-size: 1.05rem; color: var(--primary-dark); font-weight: 700; margin-bottom: 0.5rem; line-height: 1.3;">Digitalisasi Pelayanan Kelurahan</h4>
                <button class="btn-detail-proker" onclick="openProkerModal(this)">
                    Lihat Detail
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"></path><path d="M12 5l7 7-7 7"></path></svg>
                </button>
                <div class="proker-desc-hidden" style="display: none;">
                    <p>Pembuatan sistem informasi desa untuk mendigitalisasi layanan administrasi persuratan bagi warga, sehingga pelayanan kelurahan menjadi lebih cepat, efisien, dan transparan.</p>
                </div>
            </div>

            <!-- Mahasiswa 2 -->
            <div class="mahasiswa-card" data-aos="fade-up" data-aos-delay="200">
                <img src="{{ asset('images/kkn/Tiara.JPG') }}" alt="Foto Anggota" class="mahasiswa-photo">
                <h3 class="mahasiswa-name">Mutiara Putri Nirmala</h3>
                <div class="mahasiswa-nim">NIM: B011231288</div>
                <div class="mahasiswa-prodi">Prodi: Ilmu Hukum</div>
                <div class="mahasiswa-divisi">Sekretaris</div>
                
                <div class="proker-individu-badge">Proker Individu</div>
                <h4 class="proker-title" style="font-size: 1.05rem; color: var(--primary-dark); font-weight: 700; margin-bottom: 0.5rem; line-height: 1.3;">Penyuluhan Hukum Kesadaran PBB</h4>
                <button class="btn-detail-proker" onclick="openProkerModal(this)">
                    Lihat Detail
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"></path><path d="M12 5l7 7-7 7"></path></svg>
                </button>
                <div class="proker-desc-hidden" style="display: none;">
                    <p>Memberikan edukasi kepada masyarakat mengenai pentingnya taat membayar Pajak Bumi dan Bangunan (PBB) beserta implikasi hukumnya untuk menunjang pembangunan kelurahan.</p>
                </div>
            </div>

            <!-- Mahasiswa 3 -->
            <div class="mahasiswa-card" data-aos="fade-up" data-aos-delay="300">
                <img src="{{ asset('images/kkn/Rini.JPG') }}" alt="Foto Anggota" class="mahasiswa-photo">
                <h3 class="mahasiswa-name">Rini Astuti</h3>
                <div class="mahasiswa-nim">NIM: F061231059</div>
                <div class="mahasiswa-prodi">Prodi: Ilmu Sejarah</div>
                <div class="mahasiswa-divisi">Bendahara</div>
                
                <div class="proker-individu-badge">Proker Individu</div>
                <h4 class="proker-title" style="font-size: 1.05rem; color: var(--primary-dark); font-weight: 700; margin-bottom: 0.5rem; line-height: 1.3;">Pengarsipan Dokumen Sejarah Desa</h4>
                <button class="btn-detail-proker" onclick="openProkerModal(this)">
                    Lihat Detail
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"></path><path d="M12 5l7 7-7 7"></path></svg>
                </button>
                <div class="proker-desc-hidden" style="display: none;">
                    <p>Mengumpulkan dan mendigitalisasi arsip-arsip sejarah pembentukan Kelurahan Sirindu agar memori kolektif masyarakat tetap terjaga untuk generasi mendatang.</p>
                </div>
            </div>

            <!-- Mahasiswa 6 -->
            <div class="mahasiswa-card" data-aos="fade-up" data-aos-delay="600">
                <img src="{{ asset('images/kkn/Citra.JPG') }}" alt="Foto Anggota" class="mahasiswa-photo">
                <h3 class="mahasiswa-name">Citra Fikriah Jamal</h3>
                <div class="mahasiswa-nim">NIM: H021231010</div>
                <div class="mahasiswa-prodi">Prodi: Fisika</div>
                <div class="mahasiswa-divisi">Humas & Acara</div>
                
                <div class="proker-individu-badge">Proker Individu</div>
                <h4 class="proker-title" style="font-size: 1.05rem; color: var(--primary-dark); font-weight: 700; margin-bottom: 0.5rem; line-height: 1.3;">Sistem Filtrasi Air Bersih</h4>
                <button class="btn-detail-proker" onclick="openProkerModal(this)">
                    Lihat Detail
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"></path><path d="M12 5l7 7-7 7"></path></svg>
                </button>
                <div class="proker-desc-hidden" style="display: none;">
                    <p>Penerapan alat filtrasi air bersih sederhana berbasis material lokal untuk meningkatkan kualitas air tanah yang digunakan warga dalam kehidupan sehari-hari.</p>
                </div>
            </div>

            <!-- Mahasiswa 5 -->
            <div class="mahasiswa-card" data-aos="fade-up" data-aos-delay="500">
                <img src="{{ asset('images/kkn/Ilham.JPG') }}" alt="Foto Anggota" class="mahasiswa-photo">
                <h3 class="mahasiswa-name">Ilham Kurniawan</h3>
                <div class="mahasiswa-nim">NIM: H071231024</div>
                <div class="mahasiswa-prodi">Prodi: Sistem Informasi</div>
                <div class="mahasiswa-divisi">PDD</div>
                
                <div class="proker-individu-badge">Proker Individu</div>
                <h4 class="proker-title" style="font-size: 1.05rem; color: var(--primary-dark); font-weight: 700; margin-bottom: 0.5rem; line-height: 1.3;">Pemetaan Potensi UMKM Web</h4>
                <button class="btn-detail-proker" onclick="openProkerModal(this)">
                    Lihat Detail
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"></path><path d="M12 5l7 7-7 7"></path></svg>
                </button>
                <div class="proker-desc-hidden" style="display: none;">
                    <p>Membangun direktori digital untuk memetakan seluruh potensi UMKM dan sumber daya alam di kelurahan agar dapat diakses luas oleh publik.</p>
                </div>
            </div>

            <!-- Mahasiswa 7 -->
            <div class="mahasiswa-card" data-aos="fade-up" data-aos-delay="700">
                <img src="{{ asset('images/kkn/Nanda.JPG') }}" alt="Foto Anggota" class="mahasiswa-photo">
                <h3 class="mahasiswa-name">Nanda Nurwalida Putri</h3>
                <div class="mahasiswa-nim">NIM: E071231009</div>
                <div class="mahasiswa-prodi">Prodi: Antropologi</div>
                <div class="mahasiswa-divisi">Humas & Acara</div>
                
                <div class="proker-individu-badge">Proker Individu</div>
                <h4 class="proker-title" style="font-size: 1.05rem; color: var(--primary-dark); font-weight: 700; margin-bottom: 0.5rem; line-height: 1.3;">Pelestarian Budaya Lokal</h4>
                <button class="btn-detail-proker" onclick="openProkerModal(this)">
                    Lihat Detail
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"></path><path d="M12 5l7 7-7 7"></path></svg>
                </button>
                <div class="proker-desc-hidden" style="display: none;">
                    <p>Melakukan riset partisipatif dan pendampingan terhadap tokoh adat dalam melestarikan tradisi lisan dan kearifan lokal gotong royong warga.</p>
                </div>
            </div>

        </div>
    </section>

    <!-- Modal Container -->
    <div id="prokerModal" class="modal-overlay">
        <div class="modal-container">
            <button class="modal-close" onclick="closeProkerModal()">&times;</button>
            <div class="modal-header">
                <h3 id="modalTitle">Judul Proker</h3>
            </div>
            <div class="modal-body">
                <div class="modal-image-placeholder">
                    <svg width="48" height="48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="margin-bottom: 1rem;">
                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                        <circle cx="8.5" cy="8.5" r="1.5"></circle>
                        <polyline points="21 15 16 10 5 21"></polyline>
                    </svg>
                    <span>Foto Dokumentasi (Opsional)</span>
                </div>
                <div id="modalContent" class="modal-content-text">
                    <!-- Isi deskripsi proker akan dimuat secara dinamis oleh Javascript -->
                </div>
            </div>
        </div>
    </div>

</div>

<script>
function openProkerModal(btn) {
    const card = btn.closest('.mahasiswa-card');
    const title = card.querySelector('.proker-title').innerText;
    const content = card.querySelector('.proker-desc-hidden').innerHTML;
    
    document.getElementById('modalTitle').innerText = title;
    document.getElementById('modalContent').innerHTML = content;
    
    const modal = document.getElementById('prokerModal');
    modal.style.display = 'flex';
    setTimeout(() => {
        modal.classList.add('active');
    }, 10);
    document.body.style.overflow = 'hidden';
}

function closeProkerModal() {
    const modal = document.getElementById('prokerModal');
    modal.classList.remove('active');
    setTimeout(() => {
        modal.style.display = 'none';
    }, 300);
    document.body.style.overflow = '';
}

// Tutup saat area luar diklik
document.getElementById('prokerModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeProkerModal();
    }
});
</script>
@endsection
