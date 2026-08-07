<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kelurahan Sirindu - Profil & Informasi Publik')</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@500;700&display=swap" rel="stylesheet">
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        :root {
            --primary: #1e40af; /* Deep blue */
            --primary-light: #3b82f6;
            --primary-dark: #1e3a8a;
            --secondary: #0f172a; /* Slate */
            --bg-color: #f8fafc;
            --text-main: #1e293b;
            --text-light: #64748b;
            --white: #ffffff;
            --border: #e2e8f0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background-color: var(--bg-color);
            background-image: radial-gradient(circle at 15% 50%, rgba(59, 130, 246, 0.08), transparent 25%),
                              radial-gradient(circle at 85% 30%, rgba(59, 130, 246, 0.08), transparent 25%);
            background-attachment: fixed;
            color: var(--text-main);
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Outfit', sans-serif;
            color: var(--text-main);
        }

        a {
            text-decoration: none;
            color: var(--primary);
            transition: color 0.3s ease;
        }

        a:hover {
            color: var(--primary-dark);
        }

        .navbar {
            background-color: var(--white);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            position: fixed;
            width: 100%;
            top: 0;
            height: 80px;
            z-index: 1000;
            transition: all 0.4s ease;
        }

        .navbar-transparent {
            background-color: transparent;
            border-bottom: 1px solid transparent;
            box-shadow: none;
        }

        .navbar.scrolled {
            background-color: var(--white);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            height: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-family: 'Outfit', sans-serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-dark);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            list-style: none;
        }
        
        .nav-links > li:last-child {
            margin-left: 1rem;
        }

        .nav-links a {
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
            position: relative;
        }

        .nav-links a:hover {
            color: var(--primary);
        }

        /* Dropdown CSS */
        .dropdown {
            position: relative;
        }
        
        .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(24px) saturate(180%);
            -webkit-backdrop-filter: blur(24px) saturate(180%);
            min-width: 240px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1), inset 0 0 0 1px rgba(255, 255, 255, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.8);
            border-radius: 16px;
            padding: 0.5rem;
            list-style: none;
            z-index: 1000;
            margin-top: 10px;
        }

        .dropdown-menu::before {
            content: '';
            position: absolute;
            top: -15px;
            left: 0;
            width: 100%;
            height: 15px;
            background: transparent;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
            animation: fadeIn 0.2s ease-in-out;
        }

        .dropdown-menu li {
            padding: 0;
        }

        .dropdown-menu a {
            display: block;
            padding: 0.75rem 1.25rem;
            color: var(--text-main);
            transition: all 0.3s ease;
            font-size: 0.95rem;
            text-align: left;
            border-radius: 8px;
            margin: 0.2rem 0;
        }

        .dropdown-menu a:hover {
            background-color: var(--primary);
            color: var(--white);
            transform: translateX(5px);
            box-shadow: 0 4px 10px rgba(37, 99, 235, 0.2);
        }

        .dropdown-icon {
            font-size: 0.6rem;
            margin-left: 4px;
            vertical-align: middle;
            color: inherit;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Main Content */
        main {
            margin-top: 80px; /* offset for fixed navbar */
            min-height: calc(100vh - 80px - 200px);
        }
        
        section {
            padding: 1rem 0;
            scroll-margin-top: 80px;
        }

        /* Footer */
        .footer {
            background-color: var(--text-main);
            color: var(--white);
            padding: 4rem 2rem;
            margin-top: 4rem;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .footer h3 {
            color: var(--white);
            margin-bottom: 1.5rem;
            font-size: 1.25rem;
        }

        .footer p {
            color: #cbd5e1;
            font-size: 0.95rem;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 0.75rem;
        }

        .footer-links a {
            color: #cbd5e1;
        }

        .footer-links a:hover {
            color: var(--white);
        }

        .footer-bottom {
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
            padding-top: 2rem;
            margin-top: 2rem;
            border-top: 1px solid #334155;
            color: #94a3b8;
            font-size: 0.875rem;
        }

        /* Utility Classes */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .btn {
            display: inline-block;
            padding: 0.65rem 1.25rem;
            border-radius: 8px;
            font-weight: 600;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border: 1px solid var(--border);
            color: var(--text-main);
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            font-size: 0.95rem;
        }

        /* Navbar button - Default (Solid) */
        .navbar .nav-links a.btn-glass {
            color: var(--primary-dark);
            background: transparent;
            border: 1px solid transparent;
            box-shadow: none;
            backdrop-filter: none;
            -webkit-backdrop-filter: none;
            padding: 0.65rem 1.25rem;
        }

        .navbar .nav-links a.btn-glass:hover {
            background: rgba(0, 0, 0, 0.04);
            color: var(--primary);
        }

        /* Transparent state when at top */
        .navbar-transparent:not(.scrolled) .nav-links a.btn-glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            color: var(--white);
        }

        .navbar-transparent:not(.scrolled) .nav-links a.btn-glass:hover {
            background: rgba(255, 255, 255, 0.25);
            border-color: rgba(255, 255, 255, 0.5);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            color: var(--white);
        }
        
        .navbar .logo {
            color: var(--primary-dark);
            transition: color 0.4s ease;
        }
        
        .navbar-transparent:not(.scrolled) .logo {
            color: var(--white);
        }

        .btn:hover {
            background: rgba(255, 255, 255, 0.5);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background: var(--primary);
            border: 1px solid var(--primary-dark);
            color: var(--white);
            box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.1), 0 2px 4px -1px rgba(37, 99, 235, 0.06);
            backdrop-filter: none;
            -webkit-backdrop-filter: none;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
            color: var(--white);
            border-color: var(--primary-dark);
        }

        /* Cards */
        .glass-card, .article-card {
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            overflow: hidden;
        }

        .glass-card:hover, .article-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            background: #ffffff;
        }

        .article-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 12px;
            margin-bottom: 1.5rem;
        }

        .article-content {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }
        
        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .official-card {
            text-align: center;
        }
        
        .official-photo {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 1.5rem auto;
            border: 3px solid rgba(255, 255, 255, 0.6);
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }

        .section-title {
            text-align: center;
            margin-bottom: 3rem;
        }

        .section-title h2 {
            font-size: 2.5rem;
            color: var(--text-main);
            margin-bottom: 0.5rem;
        }

        .section-title p {
            color: var(--text-light);
            font-size: 1.125rem;
        }
    </style>
    @yield('styles')
</head>
<body>
    <nav class="navbar @yield('navbar_class')">
        <div class="nav-container">
            <a href="{{ route('home') }}" class="logo">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg>
                Sirindu
            </a>
            <ul class="nav-links">
                <li><a href="{{ route('home') }}" class="btn btn-glass">Beranda</a></li>
                <li class="dropdown">
                    <a class="btn btn-glass" style="cursor: pointer;">Profil Kelurahan <i class="dropdown-icon">▼</i></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('profil') }}">Sejarah & Visi Misi</a></li>
                        <li><a href="{{ route('sotk') }}">Struktur Organisasi (SOTK)</a></li>
                        <li><a href="{{ route('lingkungan') }}">Data Wilayah & Lingkungan</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="btn btn-glass" style="cursor: pointer;">Informasi Publik <i class="dropdown-icon">▼</i></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('potensi') }}">Potensi & UMKM</a></li>
                        <li><a href="{{ route('berita') }}">Berita & Kegiatan</a></li>
                        <li><a href="{{ route('kkn') }}">Mahasiswa KKN</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer" style="background-color: #0f172a; color: white; padding: 4rem 2rem 2rem; margin-top: auto;">
        <div class="container" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 3rem; margin-bottom: 3rem;">
            <div>
                <h3 style="margin-bottom: 1.5rem; font-family: 'Outfit', sans-serif; color: white; font-size: 1.5rem;">Peta Lokasi</h3>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126917.47285145742!2d106.7588339178972!3d-6.229746498059005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e945e34b9d%3A0x100c5e82dd4b820!2sJakarta%2C%20Daerah%20Khusus%20Ibukota%20Jakarta!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" width="100%" height="200" style="border:0; border-radius: 8px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            
            <div>
                <h3 style="margin-bottom: 1.5rem; font-family: 'Outfit', sans-serif; color: white; font-size: 1.5rem;">Kontak & Sosial Media</h3>
                <div style="display: flex; flex-direction: column; gap: 1rem; color: #cbd5e1;">
                    <p style="margin: 0; display: flex; align-items: center; gap: 0.75rem;">
                        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        Jl. Merdeka No. 123, Kelurahan Sirindu, 12345
                    </p>
                    <p style="margin: 0; display: flex; align-items: center; gap: 0.75rem;">
                        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                        (021) 1234-5678
                    </p>
                    <p style="margin: 0; display: flex; align-items: center; gap: 0.75rem;">
                        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                        kontak@sirindu.desa.id
                    </p>
                </div>
                
                <div style="display: flex; gap: 1rem; margin-top: 1.5rem;">
                    <a href="#" style="color: white; text-decoration: none; padding: 0.5rem 1rem; background: rgba(255,255,255,0.1); border-radius: 4px; transition: background 0.3s;" onmouseover="this.style.background='var(--primary)'" onmouseout="this.style.background='rgba(255,255,255,0.1)'">FB</a>
                    <a href="#" style="color: white; text-decoration: none; padding: 0.5rem 1rem; background: rgba(255,255,255,0.1); border-radius: 4px; transition: background 0.3s;" onmouseover="this.style.background='var(--primary)'" onmouseout="this.style.background='rgba(255,255,255,0.1)'">IG</a>
                    <a href="#" style="color: white; text-decoration: none; padding: 0.5rem 1rem; background: rgba(255,255,255,0.1); border-radius: 4px; transition: background 0.3s;" onmouseover="this.style.background='var(--primary)'" onmouseout="this.style.background='rgba(255,255,255,0.1)'">TW</a>
                </div>
            </div>

            <div>
                <h3 style="margin-bottom: 1.5rem; font-family: 'Outfit', sans-serif; color: white; font-size: 1.5rem;">Statistik Pengunjung</h3>
                @php
                    $todayVisitors = \App\Models\Visitor::whereDate('visit_date', today())->count();
                    $totalVisitors = \App\Models\Visitor::count();
                @endphp
                <div style="background: rgba(255,255,255,0.1); padding: 1.5rem; border-radius: 8px;">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 1rem; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 0.5rem;">
                        <span style="color: #cbd5e1;">Hari Ini:</span>
                        <span style="font-weight: bold; color: white; font-size: 1.2rem;">{{ number_format($todayVisitors) }}</span>
                    </div>
                    <div style="display: flex; justify-content: space-between;">
                        <span style="color: #cbd5e1;">Total:</span>
                        <span style="font-weight: bold; color: white; font-size: 1.2rem;">{{ number_format($totalVisitors) }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" style="text-align: center; padding-top: 2rem; border-top: 1px solid rgba(255,255,255,0.1); color: #cbd5e1; font-size: 0.9rem;">
            <p>&copy; {{ date('Y') }} Kelurahan Sirindu. Hak Cipta Dilindungi.</p>
        </div>
    </footer>

    <!-- AOS Animation Script -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 800,
                easing: 'ease-out-cubic',
                once: true,
                offset: 50
            });
        });

        window.addEventListener('scroll', function() {
            var navbar = document.querySelector('.navbar');
            if (!navbar.classList.contains('always-solid')) {
                if (window.scrollY > 50) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            }
        });
    </script>
    @yield('scripts')
</body>
</html>
