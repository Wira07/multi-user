<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Multi User Data Karyawan</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    <!-- Styles -->
    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #0ea5e9;
            --accent-color: #06b6d4;
            --dark-color: #1e293b;
            --light-color: #f8fafc;
            --border-color: #e2e8f0;
            --card-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            --text-dark: #0f172a;
            --text-muted: #64748b;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Figtree', sans-serif;
            min-height: 100vh;
            background-color: #f0f2f5;
            color: var(--text-dark);
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            position: relative;
            overflow-x: hidden;
        }

        .app-container {
            width: 100%;
            max-width: 1200px;
            padding: 2rem;
            position: relative;
            z-index: 10;
        }

        .auth-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 2rem;
            width: 100%;
            max-width: 520px;
            margin: 0 auto;
            padding: 3rem;
            border-radius: 16px;
            background: rgba(255, 255, 255, 0.95);
            box-shadow: var(--card-shadow);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            transform: translateY(0);
            transition: all 0.3s ease;
            animation: fadeIn 0.5s ease-out;
            position: relative;
            overflow: hidden;
        }

        .auth-container::before {
            content: "";
            position: absolute;
            top: 0;
            left: -50%;
            width: 100%;
            height: 4px;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color), var(--accent-color));
            animation: slidein 2s infinite ease-in-out;
        }

        @keyframes slidein {
            0% {
                left: -50%;
            }

            100% {
                left: 100%;
            }
        }

        .auth-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .logo-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 1.5rem;
            width: 90px;
            height: 90px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 50%;
            padding: 18px;
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.3);
            border: 4px solid rgba(255, 255, 255, 0.3);
            animation: pulse 2s infinite ease-in-out;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 8px 20px rgba(37, 99, 235, 0.3);
            }

            50% {
                box-shadow: 0 8px 25px rgba(37, 99, 235, 0.5);
            }

            100% {
                box-shadow: 0 8px 20px rgba(37, 99, 235, 0.3);
            }
        }

        .logo {
            width: 100%;
            height: auto;
            fill: white;
        }

        .content {
            width: 100%;
            text-align: center;
        }

        h1 {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 0.8rem;
            background: linear-gradient(to right, var(--primary-color), var(--accent-color));
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            text-align: center;
        }

        p {
            color: var(--text-muted);
            margin-bottom: 2rem;
            text-align: center;
            font-size: 1.1rem;
            line-height: 1.6;
        }

        .auth-buttons {
            display: flex;
            gap: 1rem;
            width: 100%;
            margin-top: 1rem;
        }

        .auth-buttons a {
            flex: 1;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            text-decoration: none;
            font-size: 1rem;
            font-weight: 600;
            text-align: center;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-login {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            position: relative;
            z-index: 1;
            overflow: hidden;
        }

        .btn-login::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 0%;
            height: 100%;
            background: linear-gradient(to right, var(--secondary-color), var(--primary-color));
            transition: width 0.4s ease;
            z-index: -1;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(37, 99, 235, 0.25);
        }

        .btn-login:hover::before {
            width: 100%;
        }

        .btn-register {
            background-color: transparent;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .btn-register::before {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 0%;
            background-color: var(--primary-color);
            transition: height 0.4s ease;
            z-index: -1;
        }

        .btn-register:hover {
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(37, 99, 235, 0.15);
        }

        .btn-register:hover::before {
            height: 100%;
        }

        .home-link {
            display: inline-block;
            margin-top: 1.5rem;
            padding: 0.5rem 1rem;
            color: var(--text-muted);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            transition: all 0.2s ease;
        }

        .home-link:hover {
            color: var(--primary-color);
        }

        /* Background shapes */
        .shape {
            position: absolute;
            z-index: 1;
            border-radius: 50%;
            filter: blur(60px);
        }

        .shape-1 {
            top: -150px;
            right: -100px;
            width: 400px;
            height: 400px;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            opacity: 0.1;
        }

        .shape-2 {
            bottom: -200px;
            left: -150px;
            width: 500px;
            height: 500px;
            background: linear-gradient(135deg, var(--secondary-color) 0%, var(--accent-color) 100%);
            opacity: 0.1;
        }

        .shape-3 {
            top: 40%;
            left: 20%;
            width: 300px;
            height: 300px;
            background: linear-gradient(135deg, var(--accent-color) 0%, var(--primary-color) 100%);
            opacity: 0.05;
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

        .system-status {
            position: absolute;
            top: 15px;
            right: 15px;
            display: flex;
            align-items: center;
            font-size: 0.8rem;
            color: var(--text-muted);
        }

        .dot {
            width: 8px;
            height: 8px;
            background-color: #10b981;
            border-radius: 50%;
            margin-right: 6px;
            animation: blink 1.5s infinite;
        }

        @keyframes blink {
            0% {
                opacity: 0.6;
            }

            50% {
                opacity: 1;
            }

            100% {
                opacity: 0.6;
            }
        }

        @media (prefers-color-scheme: dark) {
            body {
                background-color: var(--dark-color);
                color: var(--light-color);
                background-image: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
            }

            .auth-container {
                background: rgba(30, 41, 59, 0.95);
                border-color: rgba(255, 255, 255, 0.05);
            }

            p {
                color: #adb5bd;
            }

            .home-link {
                color: #adb5bd;
            }

            .home-link:hover {
                color: var(--secondary-color);
            }

            .shape-1 {
                opacity: 0.08;
            }

            .shape-2 {
                opacity: 0.08;
            }

            .shape-3 {
                opacity: 0.04;
            }
        }

        @media (max-width: 640px) {
            .auth-container {
                padding: 2rem 1.5rem;
                max-width: 90%;
            }

            .auth-buttons {
                flex-direction: column;
            }

            h1 {
                font-size: 1.75rem;
            }

            p {
                font-size: 1rem;
            }
        }
    </style>
</head>

<body>
    <!-- Background Shapes -->
    <div class="shape shape-1"></div>
    <div class="shape shape-2"></div>
    <div class="shape shape-3"></div>

    <div class="app-container">
        <div class="auth-container">
            <div class="system-status">
                <span class="dot"></span>
                <span>Sistem Aktif</span>
            </div>
            <div class="logo-container">
                <svg class="logo" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM7.07 18.28C7.5 17.38 10.12 16.5 12 16.5C13.88 16.5 16.51 17.38 16.93 18.28C15.57 19.36 13.86 20 12 20C10.14 20 8.43 19.36 7.07 18.28ZM18.36 16.83C16.93 15.09 13.46 14.5 12 14.5C10.54 14.5 7.07 15.09 5.64 16.83C4.62 15.49 4 13.82 4 12C4 7.59 7.59 4 12 4C16.41 4 20 7.59 20 12C20 13.82 19.38 15.49 18.36 16.83ZM12 6C10.06 6 8.5 7.56 8.5 9.5C8.5 11.44 10.06 13 12 13C13.94 13 15.5 11.44 15.5 9.5C15.5 7.56 13.94 6 12 6ZM12 11C11.17 11 10.5 10.33 10.5 9.5C10.5 8.67 11.17 8 12 8C12.83 8 13.5 8.67 13.5 9.5C13.5 10.33 12.83 11 12 11Z" fill="white" />
                </svg>
            </div>

            <div class="content">
                <h1>Multi User Data Karyawan</h1>
                <p>Masuk ke akun Anda atau daftar untuk mulai mengelola data karyawan perusahaan.</p>

                <div class="auth-buttons">
                    @if (Route::has('login'))
                    @auth
                    <a href="{{ url('/home') }}" class="btn-login">Masuk Dashboard</a>
                    @else
                    <a href="{{ route('login') }}" class="btn-login">Masuk</a>

                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn-register">Daftar</a>
                    @endif
                    @endauth
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>

</html>