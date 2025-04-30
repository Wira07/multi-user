<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        :root {
            --primary-color: #5b31b5;
            --secondary-color: #ff7f27;
            --dark-color: #2d2d2d;
            --light-color: #f8f9fa;
            --border-color: #e0e0e0;
            --success-color: #28a745;
            --info-color: #17a2b8;
            --warning-color: #ffc107;
            --danger-color: #dc3545;
        }

        body {
            font-family: 'Poppins', 'Nunito', sans-serif;
            background-color: #f0f2f5;
            color: var(--dark-color);
            min-height: 100vh;
            position: relative;
        }

        #app {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Navbar improvements */
        .navbar {
            background: linear-gradient(135deg, var(--primary-color) 0%, #4a2795 100%);
            padding: 0.5rem 1rem;
            /* Reduced padding */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            min-height: 60px;
            /* Control the height */
        }

        .container {
            max-width: 1140px;
            /* More compact container */
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }

        .navbar .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .navbar-brand {
            color: white !important;
            font-weight: 600;
            font-size: 1.3rem;
            /* Slightly smaller font */
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
            padding: 0;
            margin-right: 1rem;
        }

        .navbar-brand:before {
            content: "";
            display: inline-block;
            width: 24px;
            /* Smaller icon */
            height: 24px;
            background-color: white;
            border-radius: 50%;
            margin-right: 8px;
            /* Less margin */
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 640 512'%3E%3Cpath fill='%235b31b5' d='M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: center;
            background-size: 60%;
        }

        .navbar-brand:hover {
            transform: scale(1.03);
            /* Less scale effect */
        }

        .navbar-toggler {
            border: none;
            color: white;
            font-size: 1.2rem;
            /* Smaller toggler */
            transition: all 0.3s ease;
            padding: 0.25rem 0.5rem;
            /* Smaller padding */
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.85) !important;
            font-weight: 500;
            padding: 0.4rem 0.8rem;
            /* Smaller padding */
            border-radius: 4px;
            transition: all 0.3s ease;
            margin: 0 2px;
            /* Less margin */
            font-size: 0.9rem;
            /* Smaller font */
        }

        .nav-link:hover {
            color: white !important;
            background-color: rgba(255, 255, 255, 0.1);
        }

        .dropdown-menu {
            border: none;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            animation: dropdown-animation 0.3s ease;
            min-width: 10rem;
            /* Smaller dropdown width */
            padding: 0.3rem 0;
            /* Less padding */
        }

        @keyframes dropdown-animation {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .dropdown-item {
            padding: 0.5rem 1.2rem;
            /* Smaller padding */
            font-weight: 500;
            transition: all 0.2s ease;
            font-size: 0.9rem;
            /* Smaller font */
        }

        .dropdown-item:hover {
            background-color: rgba(91, 49, 181, 0.1);
            color: var(--primary-color);
        }

        .dropdown-item i {
            margin-right: 8px;
            /* Less margin */
            color: var(--primary-color);
        }

        /* Media queries to handle different screen sizes */
        @media (min-width: 576px) {
            .container {
                max-width: 540px;
            }
        }

        @media (min-width: 768px) {
            .container {
                max-width: 720px;
            }
        }

        @media (min-width: 992px) {
            .container {
                max-width: 960px;
            }
        }

        @media (min-width: 1200px) {
            .container {
                max-width: 1140px;
            }
        }

        /* Rest of existing CSS */
        main {
            flex: 1;
            padding: 2rem 0;
        }

        @media (min-width: 992px) {
            main {
                padding: 3rem 0;
            }
        }

        /* Cards */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            transition: all 0.3s ease;
            margin-bottom: 30px;
            position: relative;
        }

        .card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            height: 4px;
            width: 100%;
            background: linear-gradient(90deg, var(--secondary-color), var(--primary-color));
        }

        .card-header {
            background-color: white;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            padding: 1.25rem 1.5rem;
            font-weight: 600;
            color: var(--primary-color);
        }

        .card-body {
            padding: 1.5rem;
        }

        /* Form elements */
        .form-control {
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            padding: 0.6rem 1rem;
            transition: all 0.3s ease;
            font-size: 0.95rem;
        }

        .form-control:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 0.2rem rgba(255, 127, 39, 0.25);
        }

        .form-label {
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: var(--dark-color);
        }

        .btn {
            padding: 0.6rem 1.5rem;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: #4a2795;
            border-color: #4a2795;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(74, 39, 149, 0.3);
        }

        .btn-secondary {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        .btn-secondary:hover {
            background-color: #e06b1f;
            border-color: #e06b1f;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(224, 107, 31, 0.3);
        }

        /* Animation */
        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }

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

        /* Responsive improvements */
        @media (max-width: 767px) {
            .navbar-brand {
                font-size: 1.1rem;
            }

            .navbar-brand:before {
                width: 20px;
                height: 20px;
            }

            .card {
                margin-bottom: 20px;
            }

            .card-header {
                padding: 1rem 1.25rem;
            }

            .card-body {
                padding: 1.25rem;
            }
        }

        /* Footer */
        footer {
            background-color: #fff;
            padding: 1.5rem 0;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
            color: #6c757d;
            font-size: 0.9rem;
            margin-top: auto;
        }

        /* Alerts */
        .alert {
            border: none;
            border-radius: 8px;
            padding: 1rem 1.25rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
        }

        .alert-success {
            background-color: rgba(40, 167, 69, 0.15);
            color: var(--success-color);
        }

        .alert-info {
            background-color: rgba(23, 162, 184, 0.15);
            color: var(--info-color);
        }

        .alert-warning {
            background-color: rgba(255, 193, 7, 0.15);
            color: var(--warning-color);
        }

        .alert-danger {
            background-color: rgba(220, 53, 69, 0.15);
            color: var(--danger-color);
        }

        /* Badges */
        .badge {
            font-weight: 500;
            padding: 0.4em 0.8em;
            border-radius: 30px;
        }

        /* Hover effects */
        .hover-shadow:hover {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            transform: translateY(-5px);
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #ccc;
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #aaa;
        }

        /* Loader */
        .loader {
            border: 4px solid rgba(0, 0, 0, 0.1);
            border-top: 4px solid var(--primary-color);
            border-radius: 50%;
            width: 30px;
            height: 30px;
            animation: spin 1s linear infinite;
            margin: 0 auto;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Preloader */
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.5s ease, visibility 0.5s ease;
        }

        .preloader.fade-out {
            opacity: 0;
            visibility: hidden;
        }
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>