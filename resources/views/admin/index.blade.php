<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <style>
        :root {
            --primary-color: #5b31b5;
            --secondary-color: #ff7f27;
            --dark-color: #2d2d2d;
            --light-color: #f8f9fa;
            --border-color: #e0e0e0;
            --success-color: #28a745;
            --warning-color: #ffc107;
            --danger-color: #dc3545;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
            color: var(--dark-color);
        }

        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 15px;
        }

        .card {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 30px;
            border: none;
        }

        .card-header {
            background-color: var(--primary-color);
            color: white;
            padding: 18px 25px;
            font-size: 20px;
            font-weight: 600;
            border-bottom: none;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-body {
            padding: 30px;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin-right: -15px;
            margin-left: -15px;
        }

        .justify-content-center {
            justify-content: center;
        }

        .col-md-12 {
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
        }

        /* Table Styles */
        .table-container {
            overflow-x: auto;
            border-radius: 8px;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.03);
        }

        .table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            color: #333;
            font-size: 15px;
        }

        .table th {
            background-color: rgba(91, 49, 181, 0.1);
            font-weight: 600;
            padding: 15px;
            text-align: left;
            border-bottom: 2px solid var(--primary-color);
            color: var(--primary-color);
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .table td {
            padding: 15px;
            border-bottom: 1px solid #eaeaea;
            vertical-align: middle;
        }

        .table tbody tr {
            transition: all 0.2s ease;
        }

        .table tbody tr:hover {
            background-color: rgba(255, 127, 39, 0.05);
        }

        .table tbody tr:last-child td {
            border-bottom: none;
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
            border-radius: 6px;
            transition: all 0.3s ease;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-sm {
            padding: 6px 12px;
            font-size: 13px;
            border-radius: 4px;
        }

        .btn-primary {
            color: #fff;
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        .btn-primary:hover {
            background-color: #e06b1f;
            border-color: #e06b1f;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(224, 107, 31, 0.2);
        }

        .btn-warning {
            color: #212529;
            background-color: var(--warning-color);
            border-color: var(--warning-color);
        }

        .btn-warning:hover {
            background-color: #e0a800;
            border-color: #e0a800;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(224, 168, 0, 0.2);
        }

        .btn-danger {
            color: #fff;
            background-color: var(--danger-color);
            border-color: var(--danger-color);
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(200, 35, 51, 0.2);
        }

        .float-end {
            float: right;
        }

        .d-inline {
            display: inline-block;
        }

        /* Alert Styles */
        .alert {
            position: relative;
            padding: 15px 20px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 8px;
            font-size: 15px;
        }

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
            border-left: 4px solid var(--success-color);
        }

        /* Dashboard Title */
        .dashboard-title {
            margin-bottom: 20px;
            color: var(--primary-color);
            font-size: 18px;
            font-weight: 600;
            display: flex;
            align-items: center;
        }

        .dashboard-title::before {
            content: "";
            display: inline-block;
            width: 4px;
            height: 20px;
            background-color: var(--secondary-color);
            margin-right: 10px;
            border-radius: 2px;
        }

        /* Empty State */
        .text-center {
            text-align: center;
        }

        /* Navbar */
        .navbar {
            background-color: var(--primary-color);
            padding: 15px 0;
            color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .navbar-brand {
            font-size: 24px;
            font-weight: 600;
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .navbar-brand::before {
            content: "" url('/');
            background-color: white;
            color: var(--primary-color);
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            font-weight: 700;
            font-size: 18px;
        }

        .navbar-links {
            display: flex;
            gap: 20px;
        }

        .navbar-link {
            color: white;
            text-decoration: none;
            font-weight: 500;
            opacity: 0.9;
            transition: opacity 0.2s;
        }

        .navbar-link:hover {
            opacity: 1;
        }

        /* Card Stats */
        .stats-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            flex: 1;
            min-width: 200px;
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
        }

        .stat-title {
            font-size: 14px;
            color: #6c757d;
            margin-bottom: 10px;
        }

        .stat-value {
            font-size: 28px;
            font-weight: bold;
            color: var(--primary-color);
            margin-bottom: 5px;
        }

        .stat-icon {
            align-self: flex-end;
            background: rgba(91, 49, 181, 0.1);
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            margin-top: -50px;
            color: var(--primary-color);
        }

        /* Action buttons group */
        .action-buttons {
            display: flex;
            gap: 6px;
        }

        /* Badge styles */
        .badge {
            display: inline-block;
            padding: 4px 8px;
            font-size: 12px;
            font-weight: 600;
            border-radius: 4px;
        }

        .badge-primary {
            background-color: rgba(91, 49, 181, 0.1);
            color: var(--primary-color);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .stats-container {
                flex-direction: column;
            }

            .card-header {
                flex-direction: column;
                gap: 10px;
                align-items: flex-start;
            }

            .float-end {
                float: none;
                margin-top: 10px;
            }

            .table td,
            .table th {
                padding: 10px;
            }

            .action-buttons {
                flex-direction: column;
                gap: 5px;
            }
        }

        /* Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card {
            animation: fadeIn 0.5s ease-out;
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="navbar-container">
            <a class="navbar-brand" href="#">Admin</a>
            <div class="navbar-links">
                <a href="#" class="navbar-link">Dashboard</a>
                <a href="#" class="navbar-link">Pengaturan</a>
                <a href="#" class="navbar-link">Profil</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <!-- Stats Cards -->
                <div class="stats-container">
                    <div class="stat-card">
                        <div class="stat-title">TOTAL KARYAWAN</div>
                        <div class="stat-value">{{ count($karyawan) }}</div>
                        <div class="stat-icon">👥</div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-title">KARYAWAN AKTIF</div>
                        <div class="stat-value">{{ count($karyawan) }}</div>
                        <div class="stat-icon">✓</div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-title">JABATAN</div>
                        <div class="stat-value">4</div>
                        <div class="stat-icon">💼</div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        Dashboard Admin
                        <a href="{{ route('admin.create') }}" class="btn btn-primary btn-sm float-end">+ Tambah Karyawan</a>
                    </div>

                    <div class="card-body">
                        @if (session('success'))
                        <div class="alert alert-success">
                            <strong>Berhasil!</strong> {{ session('success') }}
                        </div>
                        @endif

                        <h5 class="dashboard-title">Data Karyawan</h5>

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
                                        <td>{{ $k->name }}</td>
                                        <td>{{ $k->email }}</td>
                                        <td>{{ $k->alamat }}</td>
                                        <td>
                                            <span class="badge badge-primary">{{ $k->jabatan }}</span>
                                        </td>
                                        <td>
                                            <div class="action-buttons">
                                                <a href="{{ route('admin.edit', $k->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                <form action="{{ route('admin.destroy', $k->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus data?')">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada data karyawan</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>