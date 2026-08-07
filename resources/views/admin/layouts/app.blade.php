<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel – Kelurahan Sirindu</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@600;700&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --primary:       #2563eb;
            --primary-light: #3b82f6;
            --primary-dark:  #1d4ed8;
            --primary-bg:    #eff6ff;
            --danger:        #ef4444;
            --danger-dark:   #dc2626;
            --warning:       #f59e0b;
            --warning-dark:  #d97706;
            --success:       #10b981;
            --sidebar-bg:    #0f172a;
            --sidebar-item:  #1e293b;
            --sidebar-hover: #334155;
            --sidebar-active:#2563eb;
            --sidebar-text:  #94a3b8;
            --sidebar-text-active: #f1f5f9;
            --bg:            #f1f5f9;
            --surface:       #ffffff;
            --border:        #e2e8f0;
            --text-main:     #1e293b;
            --text-muted:    #64748b;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg);
            color: var(--text-main);
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        /* ─── SIDEBAR ─── */
        .sidebar {
            width: 230px;
            min-width: 230px;
            background-color: var(--sidebar-bg);
            display: flex;
            flex-direction: column;
            overflow: hidden;
            box-shadow: 4px 0 24px rgba(0,0,0,0.15);
        }

        .sidebar-header {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.06);
            flex-shrink: 0;
        }
        .sidebar-header .brand {
            font-family: 'Outfit', sans-serif;
            font-size: 1.1rem;
            font-weight: 700;
            color: #f1f5f9;
        }
        .sidebar-header .brand-sub {
            font-size: 0.72rem;
            color: var(--sidebar-text);
            margin-top: 0.15rem;
        }

        .sidebar-section-label {
            padding: 1rem 1.5rem 0.35rem;
            font-size: 0.68rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #475569;
            flex-shrink: 0;
        }

        .sidebar-nav {
            flex: 1;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0.25rem 0.6rem;
            margin: 0;
        }

        .sidebar-menu li { width: 100%; }

        .sidebar-menu a,
        .sidebar-menu button {
            display: flex;
            align-items: center;
            gap: 0.65rem;
            width: 100%;
            text-align: left;
            padding: 0.55rem 0.85rem;
            color: var(--sidebar-text);
            text-decoration: none;
            border: none;
            background: none;
            font-size: 0.85rem;
            font-weight: 500;
            cursor: pointer;
            border-radius: 7px;
            transition: all 0.2s ease;
            font-family: 'Inter', sans-serif;
        }

        .sidebar-menu a:hover,
        .sidebar-menu button:hover {
            background-color: var(--sidebar-hover);
            color: var(--sidebar-text-active);
        }

        .sidebar-menu a.active {
            background-color: var(--sidebar-active);
            color: #ffffff;
            font-weight: 600;
        }

        .sidebar-menu form { display: block; width: 100%; }

        .menu-icon {
            width: 16px;
            height: 16px;
            flex-shrink: 0;
            opacity: 0.7;
        }
        .sidebar-menu a:hover .menu-icon,
        .sidebar-menu a.active .menu-icon { opacity: 1; }

        .sidebar-footer {
            padding: 0.75rem 0.6rem;
            border-top: 1px solid rgba(255,255,255,0.06);
            flex-shrink: 0;
        }

        /* ─── MAIN CONTENT ─── */
        .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            min-width: 0;
        }

        .header {
            background-color: var(--surface);
            padding: 0 2rem;
            height: 64px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid var(--border);
            flex-shrink: 0;
        }

        .header-title {
            font-size: 1rem;
            font-weight: 600;
            color: var(--text-main);
        }

        .header-actions { display: flex; align-items: center; gap: 0.75rem; }

        .header-link {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            font-size: 0.85rem;
            font-weight: 500;
            color: var(--primary);
            text-decoration: none;
            padding: 0.4rem 0.9rem;
            border: 1px solid var(--primary-light);
            border-radius: 6px;
            transition: all 0.2s;
        }
        .header-link:hover { background: var(--primary-bg); }

        .content { padding: 2rem; overflow-y: auto; flex: 1; }

        /* ─── PAGE TITLE ─── */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        .page-header h1 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-main);
        }

        /* ─── BUTTONS ─── */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.4rem;
            padding: 0.5rem 1.1rem;
            font-size: 0.875rem;
            font-weight: 600;
            font-family: 'Inter', sans-serif;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.2s ease;
            white-space: nowrap;
        }

        /* Primary */
        .btn-primary, .btn:not([class*="btn-"]) {
            background-color: var(--primary);
            color: #fff;
        }
        .btn-primary:hover, .btn:not([class*="btn-"]):hover {
            background-color: var(--primary-dark);
            color: #fff;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(37,99,235,0.3);
        }

        /* Danger */
        .btn-danger {
            background-color: var(--danger);
            color: #fff;
        }
        .btn-danger:hover {
            background-color: var(--danger-dark);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(239,68,68,0.3);
        }

        /* Warning */
        .btn-warning {
            background-color: var(--warning);
            color: #fff;
        }
        .btn-warning:hover {
            background-color: var(--warning-dark);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(245,158,11,0.3);
        }

        /* Secondary / back button */
        .btn-secondary {
            background-color: var(--bg);
            color: var(--text-muted);
            border: 1px solid var(--border);
        }
        .btn-secondary:hover {
            background-color: var(--border);
            color: var(--text-main);
        }

        /* ─── CARD ─── */
        .card {
            background: var(--surface);
            border-radius: 12px;
            padding: 1.75rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.06), 0 1px 2px rgba(0,0,0,0.04);
            margin-bottom: 1.5rem;
            border: 1px solid var(--border);
        }

        /* ─── TABLE ─── */
        .table-wrapper {
            background: var(--surface);
            border-radius: 12px;
            border: 1px solid var(--border);
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0,0,0,0.06);
        }
        table { width: 100%; border-collapse: collapse; }
        table th {
            background-color: #f8fafc;
            padding: 0.85rem 1.25rem;
            text-align: left;
            font-size: 0.78rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--text-muted);
            border-bottom: 1px solid var(--border);
        }
        table td {
            padding: 0.9rem 1.25rem;
            border-bottom: 1px solid var(--border);
            font-size: 0.9rem;
            vertical-align: middle;
        }
        table tbody tr:last-child td { border-bottom: none; }
        table tbody tr:hover { background-color: #f8fafc; }

        /* ─── FORMS ─── */
        .form-group { margin-bottom: 1.25rem; }
        .form-group label {
            display: block;
            margin-bottom: 0.4rem;
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--text-main);
        }
        .form-control {
            width: 100%;
            padding: 0.6rem 0.9rem;
            border: 1px solid var(--border);
            border-radius: 8px;
            font-size: 0.9rem;
            font-family: 'Inter', sans-serif;
            color: var(--text-main);
            background: #fff;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        .form-control:focus {
            outline: none;
            border-color: var(--primary-light);
            box-shadow: 0 0 0 3px rgba(59,130,246,0.15);
        }
        textarea.form-control { resize: vertical; min-height: 120px; }

        /* ─── ALERTS ─── */
        .alert {
            padding: 0.85rem 1.25rem;
            border-radius: 8px;
            margin-bottom: 1.25rem;
            font-size: 0.9rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .alert-success { background-color: #d1fae5; color: #065f46; border: 1px solid #6ee7b7; }
        .alert-danger  { background-color: #fee2e2; color: #991b1b; border: 1px solid #fca5a5; }

        /* ─── ACTION BUTTONS in table ─── */
        .action-group { display: flex; gap: 0.5rem; align-items: center; }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <div class="brand">🏛 Sirindu</div>
            <div class="brand-sub">Panel Administrasi</div>
        </div>

        <div class="sidebar-nav">
            <div class="sidebar-section-label">Menu Utama</div>
            <ul class="sidebar-menu">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <svg class="menu-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                        Dashboard
                    </a>
                </li>
            </ul>

            <div class="sidebar-section-label">Kelola Konten</div>
            <ul class="sidebar-menu">
                <li>
                    <a href="{{ route('admin.profiles.index') }}" class="{{ request()->routeIs('admin.profiles.*') ? 'active' : '' }}">
                        <svg class="menu-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2z"/><path d="M12 8v4l3 3"/></svg>
                        Profil Kelurahan
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.officials.index') }}" class="{{ request()->routeIs('admin.officials.*') ? 'active' : '' }}">
                        <svg class="menu-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>
                        Perangkat Kelurahan
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.lingkungan.index') }}" class="{{ request()->routeIs('admin.lingkungan.*') ? 'active' : '' }}">
                        <svg class="menu-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                        Data Lingkungan
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.potentials.index') }}" class="{{ request()->routeIs('admin.potentials.*') ? 'active' : '' }}">
                        <svg class="menu-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        Potensi & UMKM
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.articles.index') }}" class="{{ request()->routeIs('admin.articles.*') ? 'active' : '' }}">
                        <svg class="menu-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
                        Berita & Kegiatan
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.agendas.index') }}" class="{{ request()->routeIs('admin.agendas.*') ? 'active' : '' }}">
                        <svg class="menu-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                        Agenda Kegiatan
                    </a>
                </li>
            </ul>
        </div>

        <div class="sidebar-footer">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" style="display:flex;align-items:center;gap:0.65rem;width:100%;padding:0.55rem 0.85rem;color:#f87171;background:none;border:none;border-radius:7px;font-size:0.85rem;font-weight:500;cursor:pointer;font-family:'Inter',sans-serif;transition:all 0.2s;" onmouseover="this.style.background='rgba(239,68,68,0.1)'" onmouseout="this.style.background='none'">
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                    Keluar
                </button>
            </form>
        </div>
    </div>

    <div class="main-content">
        <div class="header">
            <div class="header-title">👋 Selamat datang, {{ Auth::user()->name }}</div>
            <div class="header-actions">
                <a href="{{ route('home') }}" target="_blank" class="header-link">
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 13v6a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                    Lihat Website
                </a>
            </div>
        </div>
        <div class="content">
            @yield('content')
        </div>
    </div>
</body>
</html>
