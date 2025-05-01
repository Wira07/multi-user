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
        :root {
            --primary-color: #4361ee;
            --primary-light: #4f71fb;
            --primary-dark: #3a56d4;
            --secondary-color: #ff7f27;
            --secondary-light: #ff9a55;
            --secondary-dark: #e06b1f;
            --dark-color: #2d2d2d;
            --light-color: #f8f9fa;
            --border-color: #e0e0e0;
            --success-color: #28a745;
            --info-color: #17a2b8;
            --danger-color: #dc3545;
            --danger-dark: #bd2130;
            --sidebar-width: 250px;
            --header-height: 60px;
            --sidebar-bg: #ffffff;
            --sidebar-hover: #f5f7ff;
            --sidebar-active: #e8efff;
            --sidebar-text: #6c757d;
            --sidebar-text-active: #4361ee;
            --header-bg: #ffffff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            color: var(--dark-color);
            min-height: 100vh;
            overflow-x: hidden;
        }

        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Styles */
        .sidebar {
            width: var(--sidebar-width);
            background: var(--sidebar-bg);
            color: var(--sidebar-text);
            position: fixed;
            height: 100vh;
            left: 0;
            top: 0;
            transition: all 0.3s ease;
            z-index: 1000;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
            overflow-y: auto;
        }

        .sidebar-header {
            padding: 20px;
            text-align: left;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
        }

        .company-logo {
            font-size: 22px;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 0;
            letter-spacing: 0.5px;
        }

        .company-logo i {
            margin-right: 10px;
            color: var(--primary-color);
        }

        .sidebar-user {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .sidebar-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background-color: var(--primary-light);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            font-weight: 600;
            margin: 0 auto 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .sidebar-user-name {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 5px;
            color: var(--dark-color);
        }

        .sidebar-user-role {
            font-size: 13px;
            opacity: 0.7;
        }

        .sidebar-menu {
            padding: 10px 0;
        }

        .menu-header {
            padding: 10px 25px;
            font-size: 12px;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 1px;
            opacity: 0.6;
            color: #a0a8b3;
        }

        .menu-item {
            padding: 12px 25px;
            display: flex;
            align-items: center;
            color: var(--sidebar-text);
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 15px;
            position: relative;
            border-radius: 0 30px 30px 0;
            margin: 2px 0;
        }

        .menu-item:hover {
            background-color: var(--sidebar-hover);
            color: var(--sidebar-text-active);
        }

        .menu-item.active {
            background-color: var(--sidebar-active);
            color: var(--sidebar-text-active);
            font-weight: 600;
        }

        .menu-icon {
            margin-right: 15px;
            width: 20px;
            text-align: center;
        }

        .sidebar-footer {
            padding: 15px 20px;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
            position: absolute;
            bottom: 0;
            width: 100%;
            background-color: var(--sidebar-bg);
        }

        .logout-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--sidebar-text);
            text-decoration: none;
            font-size: 14px;
            padding: 10px 15px;
            border-radius: 8px;
            background-color: #f5f5f5;
            transition: all 0.3s ease;
            width: 100%;
        }

        .logout-btn:hover {
            background-color: #ebebeb;
            color: var(--danger-color);
        }

        .logout-icon {
            margin-right: 10px;
        }

        /* Main Content Styles */
        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            padding: 30px;
            transition: all 0.3s ease;
        }

        /* Top Header */
        .top-header {
            background: var(--header-bg);
            height: var(--header-height);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            margin-bottom: 30px;
            border-radius: 10px;
        }

        .page-title {
            font-size: 20px;
            font-weight: 600;
            color: var(--dark-color);
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .notification-bell {
            font-size: 18px;
            color: #777;
            position: relative;
            cursor: pointer;
        }

        .notification-dot {
            position: absolute;
            top: -5px;
            right: -5px;
            width: 8px;
            height: 8px;
            background-color: var(--danger-color);
            border-radius: 50%;
        }

        .search-bar {
            display: flex;
            align-items: center;
            background-color: #f5f7fa;
            border-radius: 50px;
            padding: 8px 15px;
            width: 300px;
        }

        .search-bar input {
            border: none;
            background: transparent;
            outline: none;
            padding: 5px 10px;
            font-size: 14px;
            width: 100%;
        }

        .search-bar i {
            color: #a0a8b3;
        }

        .user-profile {
            display: flex;
            align-items: center;
        }

        .avatar-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--primary-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 16px;
            margin-left: 10px;
        }

        .user-info {
            text-align: right;
            margin-right: 10px;
        }

        .user-name {
            font-size: 14px;
            font-weight: 600;
            color: var(--dark-color);
        }

        .user-role {
            font-size: 12px;
            color: #6c757d;
        }

        .card {
            background-color: white;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            margin-bottom: 30px;
            border: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            box-shadow: 0 15px 35px rgba(67, 97, 238, 0.1);
            transform: translateY(-5px);
        }

        .card-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 20px 25px;
            font-size: 20px;
            font-weight: 600;
            border-bottom: none;
            display: flex;
            justify-content: space-between;
            align-items: center;
            letter-spacing: 0.5px;
        }

        .card-body {
            padding: 30px;
        }

        h5 {
            font-size: 24px;
            color: var(--primary-color);
            margin-top: 10px;
            margin-bottom: 30px;
            font-weight: 700;
            position: relative;
            padding-bottom: 15px;
            letter-spacing: 0.5px;
        }

        h5:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 70px;
            height: 4px;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            border-radius: 2px;
        }

        .table {
            width: 100%;
            margin-bottom: 30px;
            color: var(--dark-color);
            border-collapse: separate;
            border-spacing: 0;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.03);
        }

        .table th,
        .table td {
            padding: 18px 24px;
            vertical-align: middle;
            border-top: 1px solid var(--border-color);
            transition: all 0.2s ease;
        }

        .table th {
            background-color: #f8f9fa;
            font-weight: 600;
            width: 30%;
            color: var(--primary-color);
            border-right: 1px solid var(--border-color);
            letter-spacing: 0.5px;
            font-size: 15px;
        }

        .table td {
            font-size: 15px;
            line-height: 1.6;
        }

        .table tr:first-child th,
        .table tr:first-child td {
            border-top: none;
        }

        .table tr:nth-child(odd) td {
            background-color: #fafbfc;
        }

        .table tr:hover td {
            background-color: #f5f7fa;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            user-select: none;
            border: 1px solid transparent;
            padding: 12px 25px;
            font-size: 15px;
            line-height: 1.5;
            border-radius: 10px;
            transition: all 0.3s ease;
            cursor: pointer;
            text-decoration: none;
            letter-spacing: 0.5px;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .btn:before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transition: all 0.4s ease;
            z-index: -1;
        }

        .btn:hover:before {
            left: 0;
        }

        .btn i {
            margin-right: 10px;
        }

        .btn-primary {
            color: #fff;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            border-color: var(--primary-color);
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.2);
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--primary-color) 100%);
            border-color: var(--primary-color);
            box-shadow: 0 7px 20px rgba(67, 97, 238, 0.3);
            transform: translateY(-3px);
        }

        .btn-danger {
            color: #fff;
            background: linear-gradient(135deg, var(--danger-color) 0%, var(--danger-dark) 100%);
            border-color: var(--danger-color);
            box-shadow: 0 4px 10px rgba(220, 53, 69, 0.2);
        }

        .btn-danger:hover {
            box-shadow: 0 6px 15px rgba(220, 53, 69, 0.3);
            transform: translateY(-3px);
        }

        .alert {
            position: relative;
            padding: 18px 25px;
            margin-bottom: 25px;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            animation: fadeIn 0.5s ease-out;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
        }

        .alert-success {
            color: #155724;
            background-color: #e8f6ed;
            border-left: 4px solid var(--success-color);
        }

        .alert-success:before {
            content: '\f058';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            color: var(--success-color);
            margin-right: 12px;
            font-size: 20px;
        }

        .dashboard-header {
            text-align: center;
            margin-bottom: 40px;
            position: relative;
            padding-bottom: 20px;
        }

        .dashboard-header:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            border-radius: 2px;
        }

        .dashboard-header h1 {
            color: var(--primary-color);
            margin-bottom: 15px;
            font-size: 28px;
            font-weight: 700;
        }

        .dashboard-header p {
            color: #6c757d;
            font-size: 16px;
            margin-bottom: 0;
            opacity: 0.9;
        }

        /* Custom animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card {
            animation: fadeIn 0.6s ease-out;
        }

        .profile-info {
            background: linear-gradient(to right bottom, #f9f9fd, #f5f5fc);
            border-radius: 14px;
            padding: 30px;
            margin-bottom: 35px;
            border-left: 5px solid var(--primary-color);
            position: relative;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(67, 97, 238, 0.08);
        }

        .profile-info:before {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 150px;
            height: 150px;
            background: linear-gradient(135deg, rgba(67, 97, 238, 0.1) 0%, rgba(67, 97, 238, 0.05) 100%);
            border-radius: 50%;
            z-index: 0;
        }

        .profile-info:after {
            content: '';
            position: absolute;
            bottom: -30px;
            left: -30px;
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, rgba(255, 127, 39, 0.1) 0%, rgba(255, 127, 39, 0.05) 100%);
            border-radius: 50%;
            z-index: 0;
        }

        .actions {
            display: flex;
            gap: 15px;
            margin-top: 25px;
        }

        .user-welcome {
            display: inline-block;
            position: relative;
            z-index: 1;
        }

        .user-welcome:after {
            content: '';
            position: absolute;
            bottom: 5px;
            left: 0;
            width: 100%;
            height: 8px;
            background-color: rgba(67, 97, 238, 0.2);
            z-index: -1;
        }

        /* Stats cards */
        .stats-row {
            display: flex;
            gap: 20px;
            margin-bottom: 35px;
            flex-wrap: wrap;
        }

        .stat-card {
            flex: 1;
            min-width: 200px;
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            font-size: 24px;
        }

        .stat-title {
            font-size: 14px;
            color: #6c757d;
            margin-bottom: 5px;
        }

        .stat-value {
            font-size: 22px;
            font-weight: 700;
            color: var(--dark-color);
        }

        .attendance-icon {
            background-color: rgba(23, 162, 184, 0.1);
            color: var(--info-color);
        }

        .tasks-icon {
            background-color: rgba(40, 167, 69, 0.1);
            color: var(--success-color);
        }

        .leaves-icon {
            background-color: rgba(67, 97, 238, 0.1);
            color: var(--primary-color);
        }

        /* Responsive Styles */
        .toggle-sidebar {
            display: none;
            font-size: 22px;
            cursor: pointer;
            margin-right: 15px;
        }

        @media (max-width: 991px) {
            .sidebar {
                width: 0;
                opacity: 0;
            }

            .main-content {
                margin-left: 0;
            }

            .sidebar.active {
                width: var(--sidebar-width);
                opacity: 1;
            }

            .main-content.sidebar-active {
                margin-left: var(--sidebar-width);
            }

            .toggle-sidebar {
                display: block;
            }
        }

        @media (max-width: 767px) {
            .stats-row {
                flex-direction: column;
            }

            .stat-card {
                min-width: 100%;
            }

            .top-header {
                padding: 0 15px;
            }

            .page-title {
                font-size: 18px;
            }

            .main-content {
                padding: 20px 15px;
            }

            .search-bar {
                width: 150px;
            }
        }
    </style>
</head>

<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-header">
                <div class="company-logo"><i class="fas fa-chart-line"></i> KaryawanPanel</div>
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