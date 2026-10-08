<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Mini-Perpus — Sistem Manajemen Inventaris Buku Digital">
    <title>@yield('title', 'Mini-Perpus') | Sistem Manajemen Inventaris</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --secondary: #06b6d4;
            --success: #10b981;
            --danger: #ef4444;
            --warning: #f59e0b;
            --dark-bg: #0f172a;
            --card-bg: #1e293b;
            --sidebar-bg: #1e1b4b;
            --text-muted-custom: #94a3b8;
            --border-color: #334155;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f1f5f9;
            color: #1e293b;
        }

        /* ── Navbar ── */
        .navbar-brand-logo {
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 700;
            font-size: 1rem;
        }

        .main-navbar {
            background: linear-gradient(135deg, #1e1b4b 0%, #312e81 100%);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }

        .main-navbar .navbar-brand {
            font-weight: 700;
            color: #fff !important;
            font-size: 1.15rem;
            letter-spacing: 0.3px;
        }

        .main-navbar .nav-link {
            color: rgba(255, 255, 255, 0.75) !important;
            font-weight: 500;
            font-size: 0.9rem;
            padding: 0.5rem 1rem !important;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .main-navbar .nav-link:hover,
        .main-navbar .nav-link.active {
            color: #fff !important;
            background: rgba(255, 255, 255, 0.12);
        }

        .main-navbar .nav-link i {
            margin-right: 6px;
        }

        /* ── Page Header ── */
        .page-header {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 50%, #06b6d4 100%);
            color: #fff;
            padding: 2rem 0;
            margin-bottom: 2rem;
            box-shadow: 0 4px 20px rgba(79, 70, 229, 0.3);
        }

        .page-header h1 {
            font-size: 1.6rem;
            font-weight: 700;
            margin-bottom: 0.25rem;
        }

        .page-header p {
            opacity: 0.85;
            font-size: 0.9rem;
            margin-bottom: 0;
        }

        /* ── Cards ── */
        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.07);
            overflow: hidden;
        }

        .card-header {
            background: #fff;
            border-bottom: 1px solid #e2e8f0;
            padding: 1.2rem 1.5rem;
            font-weight: 600;
            color: #1e293b;
        }

        /* ── Buttons ── */
        .btn-primary {
            background: linear-gradient(135deg, var(--primary), #7c3aed);
            border: none;
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.35);
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--primary-hover), #6d28d9);
            transform: translateY(-1px);
            box-shadow: 0 6px 18px rgba(79, 70, 229, 0.45);
        }

        .btn-success {
            background: linear-gradient(135deg, #10b981, #059669);
            border: none;
            box-shadow: 0 4px 10px rgba(16, 185, 129, 0.3);
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .btn-success:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(16, 185, 129, 0.4);
        }

        .btn-warning {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            border: none;
            color: #fff !important;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .btn-warning:hover {
            transform: translateY(-1px);
        }

        .btn-danger {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            border: none;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .btn-danger:hover {
            transform: translateY(-1px);
        }

        /* ── Table ── */
        .table-hover > tbody > tr:hover {
            background-color: #f0f4ff;
            transition: background-color 0.15s ease;
        }

        .table th {
            background: #f8fafc;
            color: #475569;
            font-weight: 600;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border-bottom: 2px solid #e2e8f0;
        }

        /* ── Badges ── */
        .badge-category {
            background: linear-gradient(135deg, #818cf8, #6366f1);
            color: #fff;
            padding: 0.4em 0.8em;
            border-radius: 20px;
            font-size: 0.78rem;
            font-weight: 500;
        }

        .badge-stock-ok {
            background: linear-gradient(135deg, #34d399, #10b981);
            color: #fff;
            padding: 0.35em 0.75em;
            border-radius: 20px;
            font-size: 0.78rem;
            font-weight: 600;
        }

        .badge-stock-low {
            background: linear-gradient(135deg, #fbbf24, #f59e0b);
            color: #fff;
            padding: 0.35em 0.75em;
            border-radius: 20px;
            font-size: 0.78rem;
            font-weight: 600;
        }

        .badge-stock-zero {
            background: linear-gradient(135deg, #f87171, #ef4444);
            color: #fff;
            padding: 0.35em 0.75em;
            border-radius: 20px;
            font-size: 0.78rem;
            font-weight: 600;
        }

        /* ── Form ── */
        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(79, 70, 229, 0.2);
        }

        .form-label {
            font-weight: 500;
            color: #374151;
            font-size: 0.9rem;
        }

        /* ── Stats Card ── */
        .stat-card {
            border-radius: 16px;
            padding: 1.5rem;
            color: #fff;
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: -20px;
            right: -20px;
            width: 100px;
            height: 100px;
            background: rgba(255, 255, 255, 0.12);
            border-radius: 50%;
        }

        .stat-card::after {
            content: '';
            position: absolute;
            bottom: -30px;
            right: 20px;
            width: 70px;
            height: 70px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 50%;
        }

        .stat-card .stat-icon {
            font-size: 2.2rem;
            opacity: 0.85;
        }

        .stat-card .stat-value {
            font-size: 2.2rem;
            font-weight: 700;
            line-height: 1;
        }

        .stat-card .stat-label {
            font-size: 0.88rem;
            opacity: 0.88;
            font-weight: 500;
        }

        /* ── Alerts ── */
        .alert {
            border: none;
            border-radius: 12px;
            font-weight: 500;
        }

        .alert-success {
            background: linear-gradient(135deg, #d1fae5, #a7f3d0);
            color: #065f46;
        }

        .alert-danger {
            background: linear-gradient(135deg, #fee2e2, #fecaca);
            color: #7f1d1d;
        }

        /* ── Empty state ── */
        .empty-state {
            padding: 4rem 2rem;
            text-align: center;
            color: #94a3b8;
        }

        .empty-state i {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.4;
        }

        /* ── Footer ── */
        footer {
            background: #1e1b4b;
            color: rgba(255, 255, 255, 0.55);
            font-size: 0.85rem;
            padding: 1.2rem 0;
        }

        /* ── Animations ── */
        .fade-in {
            animation: fadeIn 0.35s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(8px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* ── Action buttons wrapper ── */
        .action-btns .btn {
            padding: 0.3rem 0.65rem;
            font-size: 0.82rem;
        }
    </style>

    @stack('styles')
</head>
<body>

    {{-- ── Navbar ── --}}
    <nav class="navbar navbar-expand-lg main-navbar sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('books.index') }}" id="navbar-brand-link">
                <div class="navbar-brand-logo">
                    <i class="bi bi-book-fill"></i>
                </div>
                Mini-Perpus
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" id="navbar-toggler-btn">
                <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ms-auto gap-1">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('books.*') ? 'active' : '' }}" href="{{ route('books.index') }}" id="nav-books-link">
                            <i class="bi bi-book"></i> Daftar Buku
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}" href="{{ route('categories.index') }}" id="nav-categories-link">
                            <i class="bi bi-tags"></i> Kategori
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- ── Flash Messages ── --}}
    @if (session('success'))
        <div class="container mt-3 fade-in">
            <div class="alert alert-success d-flex align-items-center gap-2 shadow-sm" role="alert" id="flash-success">
                <i class="bi bi-check-circle-fill flex-shrink-0"></i>
                <div>{{ session('success') }}</div>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    @if (session('error'))
        <div class="container mt-3 fade-in">
            <div class="alert alert-danger d-flex align-items-center gap-2 shadow-sm" role="alert" id="flash-error">
                <i class="bi bi-exclamation-triangle-fill flex-shrink-0"></i>
                <div>{{ session('error') }}</div>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    {{-- ── Page Content ── --}}
    <main>
        @yield('content')
    </main>

    {{-- ── Footer ── --}}
    <footer class="mt-5">
        <div class="container text-center">
            &copy; {{ date('Y') }} Mini-Perpus &mdash; Sistem Manajemen Inventaris Buku
        </div>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>
</html>
