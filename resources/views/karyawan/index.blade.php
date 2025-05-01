@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Karyawan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* KaryawanPanel CSS - Modern Employee Dashboard */

        /* Global Styles & Reset */
        :root {
            --primary-color: #4e73df;
            --primary-dark: #3a63d2;
            --primary-light: #6582e0;
            --secondary-color: #f8f9fc;
            --text-dark: #5a5c69;
            --text-light: #f8f9fc;
            --border-color: #e3e6f0;
            --danger-color: #e74a3b;
            --success-color: #1cc88a;
            --warning-color: #f6c23e;
            --info-color: #36b9cc;
            --shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
            --transition: all 0.3s ease;
            --sidebar-width: 250px;
            --sidebar-collapsed: 80px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Nunito', 'Segoe UI', sans-serif;
        }

        body {
            background-color: #f8f9fc;
            color: var(--text-dark);
            min-height: 100vh;
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* Dashboard Container */
        .dashboard-container {
            display: flex;
            position: relative;
            min-height: 100vh;
            width: 100%;
        }

        /* Sidebar Styles */
        .sidebar {
            width: var(--sidebar-width);
            background: linear-gradient(180deg, #4e73df 10%, #3a63d2 100%);
            color: var(--text-light);
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            z-index: 999;
            box-shadow: var(--shadow);
            transition: var(--transition);
            left: 0;
            top: 0;
        }

        .sidebar.active {
            width: var(--sidebar-collapsed);
        }

        .sidebar::-webkit-scrollbar {
            width: 5px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 5px;
        }

        .sidebar-header {
            padding: 25px 20px;
            display: flex;
            align-items: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .company-logo {
            font-size: 1.5rem;
            font-weight: 800;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .company-logo i {
            margin-right: 10px;
        }

        .sidebar.active .company-logo span {
            display: none;
        }

        /* Sidebar User Profile */
        .sidebar-user {
            padding: 25px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background-color: var(--primary-dark);
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            border: 3px solid rgba(255, 255, 255, 0.2);
        }

        .sidebar-user-name {
            font-weight: 600;
            font-size: 1.1rem;
            margin-bottom: 5px;
            text-align: center;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            width: 100%;
        }

        .sidebar-user-role {
            font-size: 0.85rem;
            opacity: 0.8;
            text-align: center;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            width: 100%;
        }

        .sidebar.active .sidebar-user-name,
        .sidebar.active .sidebar-user-role {
            display: none;
        }

        /* Sidebar Menu */
        .sidebar-menu {
            padding: 10px 0;
        }

        .menu-header {
            padding: 15px 20px 10px;
            font-size: 0.75rem;
            opacity: 0.7;
            font-weight: 700;
            letter-spacing: 1.2px;
            text-transform: uppercase;
        }

        .sidebar.active .menu-header {
            text-align: center;
            font-size: 0.6rem;
            padding: 15px 5px 10px;
        }

        .menu-item {
            padding: 12px 20px;
            display: flex;
            align-items: center;
            color: rgba(255, 255, 255, 0.8);
            transition: var(--transition);
            position: relative;
            margin: 2px 0;
        }

        .menu-item:hover,
        .menu-item.active {
            color: #fff;
            background-color: rgba(255, 255, 255, 0.1);
            box-shadow: inset 4px 0 0 white;
        }

        .menu-icon {
            margin-right: 15px;
            display: inline-flex;
            width: 20px;
            justify-content: center;
        }

        .sidebar.active .menu-item {
            padding: 15px 0;
            justify-content: center;
        }

        .sidebar.active .menu-item span:not(.menu-icon) {
            display: none;
        }

        .sidebar.active .menu-icon {
            margin-right: 0;
            font-size: 1.1rem;
        }

        /* Sidebar Footer */
        .sidebar-footer {
            padding: 15px 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            position: sticky;
            bottom: 0;
            background: linear-gradient(180deg, rgba(78, 115, 223, 0.95) 0%, rgba(58, 99, 210, 0.95) 100%);
            backdrop-filter: blur(5px);
        }

        .logout-btn {
            display: flex;
            align-items: center;
            color: rgba(255, 255, 255, 0.8);
            background: none;
            font-size: 0.95rem;
            padding: 12px;
            border-radius: 6px;
            transition: var(--transition);
        }

        .logout-btn:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: #fff;
        }

        .logout-icon {
            margin-right: 10px;
        }

        .sidebar.active .logout-btn {
            justify-content: center;
        }

        .sidebar.active .logout-btn span:not(.logout-icon) {
            display: none;
        }

        .sidebar.active .logout-icon {
            margin-right: 0;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            transition: var(--transition);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .main-content.sidebar-active {
            margin-left: var(--sidebar-collapsed);
        }

        /* Top Header */
        .top-header {
            background-color: #fff;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 25px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 0;
            z-index: 99;
        }

        .left-part {
            display: flex;
            align-items: center;
        }

        .toggle-sidebar {
            font-size: 1.2rem;
            cursor: pointer;
            margin-right: 20px;
            color: var(--text-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            transition: var(--transition);
        }

        .toggle-sidebar:hover {
            background-color: rgba(78, 115, 223, 0.1);
            color: var(--primary-color);
        }

        .page-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--text-dark);
        }

        .header-actions {
            display: flex;
            align-items: center;
        }

        .search-bar {
            display: flex;
            align-items: center;
            background-color: #f8f9fc;
            padding: 8px 15px;
            border-radius: 30px;
            margin-right: 20px;
            border: 1px solid var(--border-color);
            transition: var(--transition);
        }

        .search-bar i {
            color: #d1d3e2;
            margin-right: 10px;
        }

        .search-bar input {
            background-color: transparent;
            border: none;
            outline: none;
            color: var(--text-dark);
            font-size: 0.9rem;
            width: 200px;
        }

        .search-bar:focus-within {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 2px rgba(78, 115, 223, 0.25);
        }

        .search-bar:focus-within i {
            color: var(--primary-color);
        }

        .notification-bell {
            position: relative;
            cursor: pointer;
            margin-right: 25px;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: var(--transition);
        }

        .notification-bell:hover {
            background-color: rgba(78, 115, 223, 0.1);
        }

        .notification-bell i {
            font-size: 1.1rem;
            color: #d1d3e2;
        }

        .notification-dot {
            position: absolute;
            top: 8px;
            right: 8px;
            width: 8px;
            height: 8px;
            background-color: var(--danger-color);
            border-radius: 50%;
            border: 2px solid #fff;
        }

        .user-profile {
            display: flex;
            align-items: center;
            cursor: pointer;
            padding: 5px;
            border-radius: 10px;
            transition: var(--transition);
        }

        .user-profile:hover {
            background-color: rgba(78, 115, 223, 0.1);
        }

        .user-info {
            margin-right: 15px;
            text-align: right;
        }

        .user-name {
            font-weight: 600;
            font-size: 0.9rem;
            color: var(--text-dark);
        }

        .user-role {
            font-size: 0.8rem;
            color: #858796;
        }

        .avatar-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--primary-color);
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            font-weight: 600;
            font-size: 1.1rem;
        }

        /* Dashboard Content */
        .card {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: var(--shadow);
            margin: 25px;
            flex: 1;
            border: none;
        }

        .card-body {
            padding: 30px;
        }

        .dashboard-header {
            margin-bottom: 30px;
        }

        .dashboard-header h1 {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 10px;
        }

        .user-welcome {
            color: var(--primary-color);
        }

        .dashboard-header p {
            color: #858796;
            font-size: 0.95rem;
        }

        /* Stats Cards */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            margin-bottom: 35px;
        }

        .stat-card {
            background-color: #fff;
            border-radius: 12px;
            padding: 25px;
            display: flex;
            flex-direction: column;
            border-left: 5px solid;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: var(--transition);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        }

        .stat-card:nth-child(1) {
            border-left-color: var(--primary-color);
        }

        .stat-card:nth-child(2) {
            border-left-color: var(--success-color);
        }

        .stat-card:nth-child(3) {
            border-left-color: var(--warning-color);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        .attendance-icon {
            background-color: rgba(78, 115, 223, 0.15);
            color: var(--primary-color);
        }

        .tasks-icon {
            background-color: rgba(28, 200, 138, 0.15);
            color: var(--success-color);
        }

        .leaves-icon {
            background-color: rgba(246, 194, 62, 0.15);
            color: var(--warning-color);
        }

        .stat-title {
            font-size: 0.9rem;
            color: #858796;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-dark);
        }

        /* Profile Info */
        .profile-info {
            background-color: #fff;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .profile-info h5 {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--border-color);
        }

        .profile-info h5 i {
            color: var(--primary-color);
            margin-right: 12px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
        }

        .table th,
        .table td {
            padding: 15px;
            border-bottom: 1px solid var(--border-color);
        }

        .table th {
            text-align: left;
            font-weight: 600;
            color: var(--text-dark);
            width: 30%;
        }

        .table th i {
            color: var(--primary-color);
            margin-right: 12px;
            width: 18px;
            text-align: center;
        }

        .table td {
            color: #6e707e;
        }

        /* Actions */
        .actions {
            display: flex;
            justify-content: flex-start;
            margin-top: 25px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 24px;
            border-radius: 6px;
            font-weight: 600;
            transition: var(--transition);
            cursor: pointer;
            border: none;
            font-size: 0.95rem;
            letter-spacing: 0.5px;
        }

        .btn i {
            margin-right: 10px;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            box-shadow: 0 5px 15px rgba(78, 115, 223, 0.3);
        }

        /* Alert */
        .alert {
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 25px;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
        }

        .alert-success {
            background-color: rgba(28, 200, 138, 0.1);
            color: var(--success-color);
            border-left: 4px solid var(--success-color);
        }

        .alert-success:before {
            content: "\f058";
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            margin-right: 10px;
            font-size: 1.1rem;
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .stats-row {
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            }
        }

        @media (max-width: 992px) {
            .sidebar {
                width: var(--sidebar-collapsed);
                transform: translateX(0);
            }

            .sidebar .company-logo span,
            .sidebar .sidebar-user-name,
            .sidebar .sidebar-user-role,
            .sidebar .menu-item span:not(.menu-icon),
            .sidebar .logout-btn span:not(.logout-icon) {
                display: none;
            }

            .sidebar .menu-item {
                padding: 15px 0;
                justify-content: center;
            }

            .sidebar .menu-icon,
            .sidebar .logout-icon {
                margin-right: 0;
            }

            .sidebar .menu-header {
                text-align: center;
                font-size: 0.6rem;
            }

            .main-content {
                margin-left: var(--sidebar-collapsed);
            }

            .sidebar.active {
                width: var(--sidebar-width);
                z-index: 1000;
            }

            .sidebar.active .company-logo span,
            .sidebar.active .sidebar-user-name,
            .sidebar.active .sidebar-user-role,
            .sidebar.active .menu-item span:not(.menu-icon),
            .sidebar.active .logout-btn span:not(.logout-icon) {
                display: block;
            }

            .sidebar.active .menu-item {
                padding: 12px 20px;
                justify-content: flex-start;
            }

            .sidebar.active .menu-icon,
            .sidebar.active .logout-icon {
                margin-right: 15px;
            }

            .sidebar.active .menu-header {
                text-align: left;
                font-size: 0.75rem;
            }

            .main-content.sidebar-active {
                margin-left: 0;
            }

            .sidebar.active::after {
                content: '';
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(0, 0, 0, 0.5);
                z-index: -1;
                pointer-events: auto;
            }
        }

        @media (max-width: 768px) {
            .stats-row {
                grid-template-columns: 1fr;
            }

            .header-actions .search-bar {
                display: none;
            }

            .user-info {
                display: none;
            }

            .card {
                margin: 15px;
            }

            .top-header {
                padding: 0 15px;
            }

            .card-body {
                padding: 20px;
            }

            .main-content {
                margin-left: 0;
            }

            .sidebar {
                width: 0;
                transform: translateX(-100%);
            }

            .sidebar.active {
                width: var(--sidebar-width);
                transform: translateX(0);
            }
        }

        @media (max-width: 576px) {
            .page-title {
                font-size: 1rem;
            }

            .dashboard-header h1 {
                font-size: 1.5rem;
            }

            .stat-card {
                padding: 20px;
            }

            .stat-value {
                font-size: 1.8rem;
            }

            .profile-info {
                padding: 20px;
            }

            .table th,
            .table td {
                padding: 12px;
            }

            .actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                margin-bottom: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-header">
                <div class="company-logo"><i class="fas fa-chart-line"></i> <span>KaryawanPanel</span></div>
            </div>

            <div class="sidebar-user">
                <div class="sidebar-avatar">
                    {{ substr($user->name, 0, 1) }}
                </div>
                <div class="sidebar-user-name">{{ $user->name }}</div>
                <div class="sidebar-user-role">{{ $user->jabatan }}</div>
            </div>

            <div class="sidebar-menu">
                <div class="menu-header">DASHBOARD</div>
                <a href="#" class="menu-item active">
                    <span class="menu-icon"><i class="fas fa-home"></i></span>
                    <span>Beranda</span>
                </a>
                <a href="#" class="menu-item">
                    <span class="menu-icon"><i class="fas fa-chart-pie"></i></span>
                    <span>Statistik</span>
                </a>
                <a href="#" class="menu-item">
                    <span class="menu-icon"><i class="fas fa-calendar-alt"></i></span>
                    <span>Jadwal</span>
                </a>

                <div class="menu-header">MANAJEMEN</div>
                <a href="#" class="menu-item">
                    <span class="menu-icon"><i class="fas fa-user-circle"></i></span>
                    <span>Profil Saya</span>
                </a>
                <a href="#" class="menu-item">
                    <span class="menu-icon"><i class="fas fa-calendar-check"></i></span>
                    <span>Absensi</span>
                </a>
                <a href="#" class="menu-item">
                    <span class="menu-icon"><i class="fas fa-file-invoice"></i></span>
                    <span>Slip Gaji</span>
                </a>
                <a href="#" class="menu-item">
                    <span class="menu-icon"><i class="fas fa-umbrella-beach"></i></span>
                    <span>Pengajuan Cuti</span>
                </a>

                <div class="menu-header">PENGATURAN</div>
                <a href="#" class="menu-item">
                    <span class="menu-icon"><i class="fas fa-user"></i></span>
                    <span>Profil</span>
                </a>
                <a href="#" class="menu-item">
                    <span class="menu-icon"><i class="fas fa-cog"></i></span>
                    <span>Pengaturan</span>
                </a>
            </div>

            <div class="sidebar-footer">
                <form method="POST" action="{{ route('logout') }}" style="margin: 0; width: 100%;">
                    @csrf
                    <button type="submit" class="logout-btn" style="width: 100%; border: none; cursor: pointer;">
                        <span class="logout-icon"><i class="fas fa-sign-out-alt"></i></span>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Top Header -->
            <div class="top-header">
                <div class="left-part">
                    <span class="toggle-sidebar"><i class="fas fa-bars"></i></span>
                    <span class="page-title">Dashboard Karyawan</span>
                </div>

                <div class="header-actions">
                    <div class="search-bar">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Cari...">
                    </div>

                    <div class="notification-bell">
                        <i class="fas fa-bell"></i>
                        <span class="notification-dot"></span>
                    </div>

                    <div class="user-profile">
                        <div class="user-info">
                            <div class="user-name">{{ $user->name }}</div>
                            <div class="user-role">{{ $user->jabatan }}</div>
                        </div>
                        <div class="avatar-circle">
                            {{ substr($user->name, 0, 1) }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Dashboard Content -->
            <div class="card">
                <div class="card-body">
                    <div class="dashboard-header">
                        <h1>Selamat Datang, <span class="user-welcome">{{ $user->name }}</span></h1>
                        <p>Informasi lengkap profil Anda dapat dilihat di bawah ini</p>
                    </div>

                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    <!-- Stats Row -->
                    <div class="stats-row">
                        <div class="stat-card">
                            <div class="stat-icon attendance-icon">
                                <i class="fas fa-calendar-check"></i>
                            </div>
                            <div class="stat-title">Kehadiran Bulan Ini</div>
                            <div class="stat-value">98%</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-icon tasks-icon">
                                <i class="fas fa-tasks"></i>
                            </div>
                            <div class="stat-title">Tugas Selesai</div>
                            <div class="stat-value">24</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-icon leaves-icon">
                                <i class="fas fa-umbrella-beach"></i>
                            </div>
                            <div class="stat-title">Sisa Cuti</div>
                            <div class="stat-value">12 hari</div>
                        </div>
                    </div>

                    <div class="profile-info">
                        <h5><i class="fas fa-user-circle"></i> Data Saya</h5>
                        <table class="table">
                            <tr>
                                <th><i class="fas fa-user"></i> Nama</th>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th><i class="fas fa-envelope"></i> Email</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th><i class="fas fa-map-marker-alt"></i> Alamat</th>
                                <td>{{ $user->alamat }}</td>
                            </tr>
                            <tr>
                                <th><i class="fas fa-briefcase"></i> Jabatan</th>
                                <td>{{ $user->jabatan }}</td>
                            </tr>
                        </table>

                        <div class="actions">
                            <a href="{{ route('karyawan.edit') }}" class="btn btn-primary">
                                <i class="fas fa-edit"></i> Edit Data
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Toggle Sidebar Function
        document.addEventListener('DOMContentLoaded', function() {
            const toggleBtn = document.querySelector('.toggle-sidebar');
            const sidebar = document.querySelector('.sidebar');
            const mainContent = document.querySelector('.main-content');

            toggleBtn.addEventListener('click', function() {
                sidebar.classList.toggle('active');
                mainContent.classList.toggle('sidebar-active');
            });
        });
    </script>
</body>

</html>
@endsection