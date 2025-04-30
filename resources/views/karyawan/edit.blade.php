@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Saya</title>
    <style>
        :root {
            --primary-color: #5b31b5;
            --secondary-color: #ff7f27;
            --dark-color: #2d2d2d;
            --light-color: #f8f9fa;
            --border-color: #e0e0e0;
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

        .col-md-4,
        .col-md-6 {
            position: relative;
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
        }

        @media (min-width: 768px) {
            .col-md-4 {
                flex: 0 0 33.333333%;
                max-width: 33.333333%;
            }

            .col-md-6 {
                flex: 0 0 50%;
                max-width: 50%;
            }

            .offset-md-4 {
                margin-left: 33.333333%;
            }

            .text-md-end {
                text-align: right;
            }
        }

        .mb-3 {
            margin-bottom: 1.5rem;
        }

        .mb-0 {
            margin-bottom: 0;
        }

        .form-control {
            display: block;
            width: 100%;
            padding: 12px 15px;
            font-size: 15px;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 2px solid var(--border-color);
            border-radius: 8px;
            transition: border-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(91, 49, 181, 0.25);
        }

        .form-control[readonly] {
            background-color: #f8f9fa;
            opacity: 0.8;
        }

        .col-form-label {
            padding-top: calc(0.375rem + 1px);
            padding-bottom: calc(0.375rem + 1px);
            margin-bottom: 0;
            font-size: 15px;
            font-weight: 500;
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
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            cursor: pointer;
        }

        .btn-primary {
            color: #fff;
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        .btn-primary:hover {
            background-color: #e06b1f;
            border-color: #e06b1f;
        }

        .btn-secondary {
            color: #fff;
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            margin-left: 10px;
        }

        .btn-secondary:hover {
            background-color: #4a2795;
            border-color: #4a2795;
        }

        .invalid-feedback {
            display: block;
            width: 100%;
            margin-top: 0.25rem;
            font-size: 80%;
            color: #dc3545;
        }

        .is-invalid {
            border-color: #dc3545;
        }

        .text-muted {
            color: #6c757d;
            font-size: 80%;
            margin-top: 5px;
        }

        .form-header {
            margin-bottom: 25px;
            text-align: center;
        }

        .form-header h1 {
            color: var(--primary-color);
            margin-bottom: 10px;
        }

        .form-header p {
            color: #6c757d;
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
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Data Saya</div>

                    <div class="card-body">
                        <div class="form-header">
                            <h1>Perbarui Profil Anda</h1>
                            <p>Silakan ubah data yang diperlukan pada formulir berikut</p>
                        </div>

                        <form method="POST" action="{{ route('karyawan.update') }}">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Nama</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" value="{{ $user->email }}" readonly>
                                    <small class="text-muted">Email tidak dapat diubah</small>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="alamat" class="col-md-4 col-form-label text-md-end">Alamat</label>
                                <div class="col-md-6">
                                    <textarea id="alamat" class="form-control @error('alamat') is-invalid @enderror" name="alamat" required rows="3">{{ old('alamat', $user->alamat) }}</textarea>
                                    @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="jabatan" class="col-md-4 col-form-label text-md-end">Jabatan</label>
                                <div class="col-md-6">
                                    <input id="jabatan" type="text" class="form-control @error('jabatan') is-invalid @enderror" name="jabatan" value="{{ old('jabatan', $user->jabatan) }}" required>
                                    @error('jabatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ route('karyawan.index') }}" class="btn btn-secondary">Batal</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
@endsection