@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Karyawan</title>
    <style>
        :root {
            --primary-color: #5b31b5;
            --secondary-color: #ff7f27;
            --dark-color: #2d2d2d;
            --light-color: #f8f9fa;
            --border-color: #e0e0e0;
            --success-color: #28a745;
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
            padding: 20px 25px;
            font-size: 20px;
            font-weight: 600;
            border-bottom: none;
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

        .col-md-8 {
            width: 100%;
            max-width: 800px;
            padding-right: 15px;
            padding-left: 15px;
        }

        @media (min-width: 768px) {
            .col-md-8 {
                flex: 0 0 66.666667%;
                max-width: 66.666667%;
            }
        }

        h5 {
            font-size: 22px;
            color: var(--primary-color);
            margin-top: 10px;
            margin-bottom: 25px;
            font-weight: 600;
            position: relative;
            padding-bottom: 12px;
        }

        h5:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 3px;
            background-color: var(--secondary-color);
        }

        .table {
            width: 100%;
            margin-bottom: 30px;
            color: var(--dark-color);
            border-collapse: separate;
            border-spacing: 0;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }

        .table th,
        .table td {
            padding: 15px 20px;
            vertical-align: top;
            border-top: 1px solid var(--border-color);
        }

        .table th {
            background-color: #f8f9fa;
            font-weight: 600;
            width: 30%;
            color: var(--primary-color);
            border-right: 1px solid var(--border-color);
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
            display: inline-block;
            font-weight: 500;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            user-select: none;
            border: 1px solid transparent;
            padding: 12px 24px;
            font-size: 16px;
            line-height: 1.5;
            border-radius: 8px;
            transition: all 0.3s ease;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-primary {
            color: #fff;
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        .btn-primary:hover {
            background-color: #e06b1f;
            border-color: #e06b1f;
            box-shadow: 0 4px 10px rgba(255, 127, 39, 0.3);
            transform: translateY(-2px);
        }

        .alert {
            position: relative;
            padding: 15px 20px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 8px;
            font-size: 15px;
            animation: fadeIn 0.5s ease-out;
        }

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }

        .dashboard-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .dashboard-header h1 {
            color: var(--primary-color);
            margin-bottom: 10px;
            font-size: 28px;
        }

        .dashboard-header p {
            color: #6c757d;
            font-size: 16px;
            margin-bottom: 0;
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
            animation: fadeIn 0.5s ease-out;
        }
        
        .profile-info {
            background-color: #f9f9fd;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 25px;
            border-left: 4px solid var(--primary-color);
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard Karyawan</div>

                    <div class="card-body">
                        <div class="dashboard-header">
                            <h1>Selamat Datang, {{ $user->name }}</h1>
                            <p>Informasi lengkap profil Anda dapat dilihat di bawah ini</p>
                        </div>

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="profile-info">
                            <h5>Data Saya</h5>
                            <table class="table">
                                <tr>
                                    <th>Nama</th>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>{{ $user->alamat }}</td>
                                </tr>
                                <tr>
                                    <th>Jabatan</th>
                                    <td>{{ $user->jabatan }}</td>
                                </tr>
                            </table>

                            <a href="{{ route('karyawan.edit') }}" class="btn btn-primary">Edit Data</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
@endsection