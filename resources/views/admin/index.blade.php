<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --primary-dark: #3a56d4;
            --primary-light: #ebefff;
            --secondary-color: #ff7c43;
            --secondary-dark: #e86a30;
            --dark-color: #2b2d42;
            --grey-color: #8d99ae;
            --light-grey: #edf2f4;
            --success-color: #06d6a0;
            --warning-color: #ffd166;
            --danger-color: #ef476f;
            --white-color: #ffffff;
            --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.1);
            --shadow-md: 0 5px 15px rgba(0, 0, 0, 0.07);
            --shadow-lg: 0 10px 25px rgba(0, 0, 0, 0.1);
            --radius-sm: 6px;
            --radius-md: 12px;
            --radius-lg: 20px;
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f7fb;
            color: var(--dark-color);
            min-height: 100vh;
            display: flex;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 280px;
            background: var(--white-color);
            box-shadow: var(--shadow-md);
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 100;
            transition: var(--transition);
            display: flex;
            flex-direction: column;
        }

        .sidebar-header {
            padding: 25px 20px;
            display: flex;
            align-items: center;
            border-bottom: 1px solid var(--light-grey);
        }

        .logo {
            font-size: 24px;
            font-weight: 700;
            color: var(--primary-color);
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }

        .logo i {
            background: var(--primary-light);
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-color);
        }

        .sidebar-menu {
            padding: 20px 0;
            flex: 1;
            overflow-y: auto;
        }

        .menu-category {
            font-size: 11px;
            text-transform: uppercase;
            color: var(--grey-color);
            font-weight: 600;
            letter-spacing: 1px;
            padding: 15px 25px 5px;
        }

        .menu-item {
            padding: 10px 25px;
            display: flex;
            align-items: center;
            gap: 12px;
            color: var(--dark-color);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            margin: 2px 0;
            border-radius: 0 100px 100px 0;
            transition: var(--transition);
        }

        .menu-item:hover {
            background-color: var(--primary-light);
            color: var(--primary-color);
        }

        .menu-item.active {
            background-color: var(--primary-color);
            color: var(--white-color);
        }

        .menu-item i {
            font-size: 18px;
            width: 24px;
            text-align: center;
        }

        .sidebar-footer {
            border-top: 1px solid var(--light-grey);
            padding: 20px;
        }

        /* Main Content Area */
        .main-content {
            flex: 1;
            margin-left: 280px;
            padding: 20px 30px;
            max-width: 100%;
            transition: var(--transition);
        }

        /* Top Navigation */
        .top-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            background: var(--white-color);
            border-radius: var(--radius-md);
            padding: 15px 25px;
            box-shadow: var(--shadow-sm);
        }

        .page-title {
            font-size: 24px;
            font-weight: 600;
            color: var(--dark-color);
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .search-box {
            position: relative;
        }

        .search-input {
            padding: 10px 15px 10px 40px;
            border-radius: var(--radius-sm);
            border: 1px solid var(--light-grey);
            background-color: var(--light-grey);
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            width: 250px;
            transition: var(--transition);
        }

        .search-input:focus {
            outline: none;
            border-color: var(--primary-color);
            background-color: var(--white-color);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.1);
            width: 300px;
        }

        .search-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--grey-color);
            font-size: 14px;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            padding: 5px 10px;
            border-radius: var(--radius-sm);
            transition: var(--transition);
        }

        .user-profile:hover {
            background-color: var(--light-grey);
        }

        .avatar {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white-color);
            font-weight: 600;
            font-size: 16px;
        }

        .user-info {
            display: flex;
            flex-direction: column;
        }

        .user-name {
            font-size: 14px;
            font-weight: 600;
        }

        .user-role {
            font-size: 12px;
            color: var(--grey-color);
        }

        .notifications {
            position: relative;
            color: var(--dark-color);
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: var(--transition);
            cursor: pointer;
        }

        .notifications:hover {
            background-color: var(--light-grey);
        }

        .notification-badge {
            position: absolute;
            top: 5px;
            right: 5px;
            background-color: var(--danger-color);
            color: var(--white-color);
            font-size: 10px;
            font-weight: 600;
            min-width: 16px;
            height: 16px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 5px;
        }

        /* Stats Cards */
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: var(--white-color);
            border-radius: var(--radius-md);
            padding: 25px;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
        }

        .stat-card::before {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            height: 100%;
            width: 7px;
            background: linear-gradient(to bottom, var(--primary-color), var(--primary-dark));
            border-radius: 0 var(--radius-md) var(--radius-md) 0;
        }

        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15px;
        }

        .stat-title {
            font-size: 14px;
            color: var(--grey-color);
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .stat-icon {
            background: var(--primary-light);
            width: 50px;
            height: 50px;
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            color: var(--primary-color);
        }

        .stat-value {
            font-size: 32px;
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 5px;
        }

        .stat-description {
            font-size: 13px;
            color: var(--grey-color);
        }

        /* Main Card */
        .card {
            background: var(--white-color);
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-sm);
            overflow: hidden;
            margin-bottom: 30px;
            transition: var(--transition);
        }

        .card:hover {
            box-shadow: var(--shadow-md);
        }

        .card-header {
            background: var(--white-color);
            padding: 20px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid var(--light-grey);
        }

        .card-title {
            font-size: 18px;
            font-weight: 600;
            color: var(--dark-color);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card-title i {
            color: var(--primary-color);
        }

        .card-body {
            padding: 25px;
        }

        /* Alert Styles */
        .alert {
            padding: 15px 20px;
            border-radius: var(--radius-sm);
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .alert-success {
            background-color: rgba(6, 214, 160, 0.1);
            border-left: 4px solid var(--success-color);
            color: #06805f;
        }

        .alert-success i {
            color: var(--success-color);
            font-size: 20px;
        }

        /* Table Styles */
        .table-container {
            overflow-x: auto;
            border-radius: var(--radius-sm);
            background-color: var(--white-color);
            box-shadow: var(--shadow-sm);
        }

        .table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            font-size: 14px;
        }

        .table th {
            background-color: var(--light-grey);
            font-weight: 600;
            padding: 15px 20px;
            text-align: left;
            color: var(--dark-color);
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 2px solid #e0e6ed;
        }

        .table tr:nth-child(even) {
            background-color: rgba(245, 247, 251, 0.5);
        }

        .table td {
            padding: 15px 20px;
            border-bottom: 1px solid #e0e6ed;
            vertical-align: middle;
        }

        .table tr:last-child td {
            border-bottom: none;
        }

        .table tr {
            transition: var(--transition);
        }

        .table tbody tr:hover {
            background-color: rgba(67, 97, 238, 0.04);
        }

        /* Badge styles */
        .badge {
            display: inline-block;
            padding: 5px 12px;
            font-size: 12px;
            font-weight: 600;
            border-radius: 100px;
        }

        .badge-primary {
            background-color: var(--primary-light);
            color: var(--primary-color);
        }

        .badge-success {
            background-color: rgba(6, 214, 160, 0.1);
            color: var(--success-color);
        }

        .badge-warning {
            background-color: rgba(255, 209, 102, 0.1);
            color: #e6b800;
        }

        .badge-danger {
            background-color: rgba(239, 71, 111, 0.1);
            color: var(--danger-color);
        }

        /* Button Styles */
        .btn {
            display: inline-block;
            font-weight: 500;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            user-select: none;
            border: 1px solid transparent;
            padding: 10px 18px;
            font-size: 14px;
            line-height: 1.5;
            border-radius: var(--radius-sm);
            transition: var(--transition);
            cursor: pointer;
            text-decoration: none;
            font-family: 'Poppins', sans-serif;
        }

        .btn-sm {
            padding: 6px 14px;
            font-size: 13px;
        }

        .btn-primary {
            color: var(--white-color);
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.2);
        }

        .btn-secondary {
            color: var(--white-color);
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        .btn-secondary:hover {
            background-color: var(--secondary-dark);
            border-color: var(--secondary-dark);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 124, 67, 0.2);
        }

        .btn-warning {
            color: var(--dark-color);
            background-color: var(--warning-color);
            border-color: var(--warning-color);
        }

        .btn-warning:hover {
            background-color: #e6b800;
            border-color: #e6b800;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 209, 102, 0.3);
        }

        .btn-danger {
            color: var(--white-color);
            background-color: var(--danger-color);
            border-color: var(--danger-color);
        }

        .btn-danger:hover {
            background-color: #e63e64;
            border-color: #e63e64;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(239, 71, 111, 0.3);
        }

        .btn-outline-primary {
            color: var(--primary-color);
            background-color: transparent;
            border-color: var(--primary-color);
        }

        .btn-outline-primary:hover {
            color: var(--white-color);
            background-color: var(--primary-color);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.2);
        }

        .btn-icon {
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        /* Action buttons group */
        .action-buttons {
            display: flex;
            gap: 8px;
        }

        /* Empty State */
        .empty-state {
            padding: 30px;
            text-align: center;
            color: var(--grey-color);
        }

        .empty-state i {
            font-size: 50px;
            margin-bottom: 15px;
            color: #d1dbe8;
        }

        .empty-state-text {
            font-size: 16px;
            font-weight: 500;
            margin-bottom: 20px;
        }

        /* Modal for logout confirmation */
        .modal-backdrop {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(4px);
        }

        .modal {
            background-color: var(--white-color);
            border-radius: var(--radius-md);
            max-width: 400px;
            width: 100%;
            box-shadow: var(--shadow-lg);
            overflow: hidden;
            animation: modalFadeIn 0.3s ease-out;
        }

        .modal-header {
            padding: 20px 25px;
            background-color: var(--primary-color);
            color: var(--white-color);
        }

        .modal-title {
            font-size: 18px;
            font-weight: 600;
        }

        .modal-body {
            padding: 25px;
        }

        .modal-message {
            font-size: 15px;
            margin-bottom: 20px;
            color: var(--dark-color);
            text-align: center;
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            padding: 15px 25px;
            background-color: var(--light-grey);
        }

        @keyframes modalFadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Hamburger menu for mobile */
        .menu-toggle {
            display: none;
            flex-direction: column;
            justify-content: space-between;
            width: 30px;
            height: 21px;
            cursor: pointer;
        }

        .menu-toggle span {
            display: block;
            height: 3px;
            width: 100%;
            background-color: var(--dark-color);
            border-radius: 3px;
            transition: var(--transition);
        }

        /* Responsive design */
        @media (max-width: 1024px) {
            .sidebar {
                width: 80px;
                overflow: visible;
            }

            .logo span,
            .menu-item span,
            .menu-category {
                display: none;
            }

            .menu-item {
                justify-content: center;
                padding: 15px 0;
            }

            .menu-item i {
                font-size: 22px;
            }

            .main-content {
                margin-left: 80px;
            }

            .sidebar-footer {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .menu-toggle {
                display: flex;
            }

            .sidebar {
                transform: translateX(-100%);
                z-index: 1001;
            }

            .sidebar.open {
                transform: translateX(0);
                width: 250px;
            }

            .sidebar.open .logo span,
            .sidebar.open .menu-item span,
            .sidebar.open .menu-category {
                display: block;
            }

            .sidebar.open .menu-item {
                justify-content: flex-start;
                padding: 10px 25px;
            }

            .main-content {
                margin-left: 0;
                padding: 15px;
            }

            .top-nav {
                padding: 15px;
            }

            .search-box {
                display: none;
            }

            .stats-container {
                grid-template-columns: 1fr;
            }

            .action-buttons {
                flex-direction: column;
            }

            .card-header {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }
        }

        @media (max-width: 480px) {
            .user-info {
                display: none;
            }

            .page-title {
                font-size: 20px;
            }
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <a href="#" class="logo">
                <i class="fas fa-chart-line"></i>
                <span>AdminPanel</span>
            </a>
        </div>
        <div class="sidebar-menu">
            <p class="menu-category">Dashboard</p>
            <a href="#" class="menu-item active">
                <i class="fas fa-home"></i>
                <span>Beranda</span>
            </a>
            <a href="#" class="menu-item">
                <i class="fas fa-chart-pie"></i>
                <span>Statistik</span>
            </a>
            <a href="#" class="menu-item">
                <i class="fas fa-calendar-alt"></i>
                <span>Jadwal</span>
            </a>

            <p class="menu-category">Manajemen</p>
            <a href="#" class="menu-item">
                <i class="fas fa-users"></i>
                <span>Karyawan</span>
            </a>
            <a href="#" class="menu-item">
                <i class="fas fa-briefcase"></i>
                <span>Jabatan</span>
            </a>
            <a href="#" class="menu-item">
                <i class="fas fa-file-invoice-dollar"></i>
                <span>Penggajian</span>
            </a>

            <p class="menu-category">Pengaturan</p>
            <a href="#" class="menu-item">
                <i class="fas fa-user-circle"></i>
                <span>Profil</span>
            </a>
            <a href="#" class="menu-item">
                <i class="fas fa-cog"></i>
                <span>Pengaturan</span>
            </a>
        </div>
        <div class="sidebar-footer">
            <a href="#" class="btn btn-outline-primary btn-icon" style="width: 100%;" onclick="confirmLogout(); return false;">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Top Navigation -->
        <nav class="top-nav">
            <div class="menu-toggle" id="menu-toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <h1 class="page-title">Dashboard Admin</h1>
            <div class="nav-actions">
                <div class="search-box">
                    <i class="fas fa-search search-icon"></i>
                    <input type="text" class="search-input" placeholder="Cari...">
                </div>
                <div class="notifications">
                    <i class="far fa-bell"></i>
                    <span class="notification-badge">3</span>
                </div>
                <div class="user-profile">
                    <div class="avatar">A</div>
                    <div class="user-info">
                        <div class="user-name">{{ Auth::user()->name ?? 'Admin' }}</div>
                        <div class="user-role">Administrator</div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Stats Cards -->
        <div class="stats-container">
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-title">Total Karyawan</div>
                    <div class="stat-icon">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
                <div class="stat-value">{{ count($karyawan) }}</div>
                <div class="stat-description">Jumlah seluruh karyawan yang terdaftar</div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-title">Karyawan Aktif</div>
                    <div class="stat-icon">
                        <i class="fas fa-user-check"></i>
                    </div>
                </div>
                <div class="stat-value">{{ count($karyawan) }}</div>
                <div class="stat-description">Karyawan dengan status aktif</div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-title">Jabatan</div>
                    <div class="stat-icon">
                        <i class="fas fa-sitemap"></i>
                    </div>
                </div>
                <div class="stat-value">4</div>
                <div class="stat-description">Jumlah posisi jabatan yang tersedia</div>
            </div>
        </div>

        <!-- Main Card -->
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">
                    <i class="fas fa-list"></i> Data Karyawan
                </h2>
                <a href="{{ route('admin.create') }}" class="btn btn-primary btn-icon">
                    <i class="fas fa-plus"></i> Tambah Karyawan
                </a>
            </div>

            <div class="card-body">
                @if (session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    <div>
                        <strong>Berhasil!</strong> {{ session('success') }}
                    </div>
                </div>
                @endif

                <div class="table-container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="20%">Nama</th>
                                <th width="20%">Email</th>
                                <th width="25%">Alamat</th>
                                <th width="15%">Jabatan</th>
                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($karyawan as $index => $k)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <div style="display: flex; align-items: center; gap: 10px;">
                                        <div style="width: 35px; height: 35px; background-color: var(--primary-light); color: var(--primary-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 600;">
                                            {{ substr($k->name, 0, 1) }}
                                        </div>
                                        {{ $k->name }}
                                    </div>
                                </td>
                                <td>{{ $k->email }}</td>
                                <td>{{ $k->alamat }}</td>
                                <td>
                                    <span class="badge badge-primary">{{ $k->jabatan }}</span>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('admin.edit', $k->id) }}" class="btn btn-sm btn-warning btn-icon">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.destroy', $k->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-sm btn-danger btn-icon" onclick="confirmDelete(this)">
                                                <i class="fas fa-trash-alt"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6">
                                    <div class="empty-state">
                                        <i class="fas fa-users-slash"></i>
                                        <p class="empty-state-text">Tidak ada data karyawan</p>
                                        <a href="{{ route('admin.create') }}" class="btn btn-primary btn-icon">
                                            <i class="fas fa-plus"></i> Tambah Karyawan Baru
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal Konfirmasi Logout -->
    <div id="logoutModal" class="modal-backdrop">
        <div class="modal">
            <div class="modal-header">
                <h3 class="modal-title">Konfirmasi Logout</h3>
            </div>
            <div class="modal-body">
                <div class="modal-message">
                    <i class="fas fa-sign-out-alt" style="font-size: 48px; color: var(--primary-color); margin-bottom: 15px; display: block;"></i>
                    Apakah Anda yakin ingin keluar dari sistem?
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-outline-primary" onclick="closeModal()">
                    <i class="fas fa-times"></i> Batal
                </button>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-primary">
                        <i class="fas fa-sign-out-alt"></i> Ya, Logout
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Hapus -->
    <div id="deleteModal" class="modal-backdrop">
        <div class="modal">
            <div class="modal-header">
                <h3 class="modal-title">Konfirmasi Hapus</h3>
            </div>
            <div class="modal-body">
                <div class="modal-message">
                    <i class="fas fa-exclamation-triangle" style="font-size: 48px; color: var(--danger-color); margin-bottom: 15px; display: block;"></i>
                    Apakah Anda yakin ingin menghapus data ini?
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-outline-primary" onclick="closeDeleteModal()">
                    <i class="fas fa-times"></i> Batal
                </button>
                <button type="button" id="confirmDeleteBtn" class="btn btn-sm btn-danger">
                    <i class="fas fa-trash-alt"></i> Ya, Hapus
                </button>
            </div>
        </div>
    </div>

    <script>
        // Toggle sidebar on mobile
        document.getElementById('menu-toggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('open');
        });

        // Fungsi untuk menampilkan modal konfirmasi logout
        function confirmLogout() {
            document.getElementById('logoutModal').style.display = 'flex';
        }

        // Fungsi untuk menutup modal logout
        function closeModal() {
            document.getElementById('logoutModal').style.display = 'none';
        }

        // Fungsi untuk menampilkan modal konfirmasi hapus
        function confirmDelete(button) {
            const form = button.closest('form');
            document.getElementById('deleteModal').style.display = 'flex';

            // Set form yang akan di-submit
            document.getElementById('confirmDeleteBtn').onclick = function() {
                form.submit();
            };
        }

        // Fungsi untuk menutup modal hapus
        function closeDeleteModal() {
            document.getElementById('deleteModal').style.display = 'none';
        }

        // Tutup modal ketika user mengklik diluar modal
        window.onclick = function(event) {
            const logoutModal = document.getElementById('logoutModal');
            const deleteModal = document.getElementById('deleteModal');

            if (event.target == logoutModal) {
                logoutModal.style.display = 'none';
            }

            if (event.target == deleteModal) {
                deleteModal.style.display = 'none';
            }
        }

        // Animasi untuk card stats
        document.addEventListener('DOMContentLoaded', function() {
            const statCards = document.querySelectorAll('.stat-card');
            statCards.forEach((card, index) => {
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, 100 * index);
            });
        });
    </script>
</body>

</html>