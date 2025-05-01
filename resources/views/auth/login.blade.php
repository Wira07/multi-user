<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Multi User Data Karyawan</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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

        .login-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 2rem;
            width: 100%;
            max-width: 480px;
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

        .login-container::before {
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

        .login-container:hover {
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
            font-size: 2rem;
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

        /* Form styling */
        .login-form {
            width: 100%;
            margin-top: 1rem;
        }

        .form-group {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .form-control {
            width: 100%;
            height: 55px;
            padding: 0.75rem 3rem 0.75rem 1rem;
            border: 2px solid var(--border-color);
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background-color: white;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(37, 99, 235, 0.25);
            outline: none;
        }

        .form-label {
            position: absolute;
            left: 1rem;
            top: 1.1rem;
            color: var(--text-muted);
            transition: all 0.3s ease;
            pointer-events: none;
            font-size: 1rem;
        }

        .form-control:focus~.form-label,
        .form-control:not(:placeholder-shown)~.form-label {
            top: -0.5rem;
            left: 0.8rem;
            font-size: 0.75rem;
            padding: 0 0.25rem;
            background-color: white;
            color: var(--primary-color);
            font-weight: 600;
        }

        .input-icon {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            transition: all 0.3s ease;
        }

        .form-control:focus~.input-icon {
            color: var(--primary-color);
        }

        .toggle-password {
            cursor: pointer;
        }

        .checkbox-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .remember-me {
            display: flex;
            align-items: center;
        }

        .checkbox-input {
            position: relative;
            width: 18px;
            height: 18px;
            margin-right: 8px;
            accent-color: var(--primary-color);
            cursor: pointer;
        }

        .checkbox-label {
            color: var(--text-muted);
            font-size: 0.9rem;
            cursor: pointer;
        }

        .forgot-link {
            color: var(--primary-color);
            font-size: 0.9rem;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .forgot-link:hover {
            color: var(--secondary-color);
            text-decoration: underline;
        }

        .btn-login {
            width: 100%;
            padding: 0.9rem;
            border-radius: 10px;
            border: none;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            color: white;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
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
            z-index: 0;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.3);
        }

        .btn-login:hover::before {
            width: 100%;
        }

        .btn-login span,
        .btn-login i {
            position: relative;
            z-index: 1;
        }

        .divider {
            display: flex;
            align-items: center;
            margin: 1.5rem 0;
            color: var(--text-muted);
        }

        .divider::before,
        .divider::after {
            content: "";
            flex: 1;
            height: 1px;
            background-color: var(--border-color);
        }

        .divider span {
            padding: 0 10px;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .social-login {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .btn-social {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            border: 2px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-muted);
            font-size: 1.2rem;
            transition: all 0.3s ease;
            background-color: white;
        }

        .btn-social:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .btn-social.google:hover {
            color: #DB4437;
            border-color: #DB4437;
        }

        .btn-social.facebook:hover {
            color: #4267B2;
            border-color: #4267B2;
        }

        .btn-social.twitter:hover {
            color: #1DA1F2;
            border-color: #1DA1F2;
        }

        .register-link-container {
            margin-top: 1.5rem;
            text-align: center;
        }

        .register-link-text {
            color: var(--text-muted);
            font-size: 0.95rem;
        }

        .register-link {
            color: var(--primary-color);
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .register-link:hover {
            color: var(--secondary-color);
            text-decoration: underline;
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

        @media (prefers-color-scheme: dark) {
            body {
                background-color: var(--dark-color);
                color: var(--light-color);
                background-image: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
            }

            .login-container {
                background: rgba(30, 41, 59, 0.95);
                border-color: rgba(255, 255, 255, 0.05);
            }

            .form-control {
                background-color: rgba(30, 41, 59, 0.8);
                border-color: rgba(255, 255, 255, 0.1);
                color: white;
            }

            .form-control:focus~.form-label,
            .form-control:not(:placeholder-shown)~.form-label {
                background-color: var(--dark-color);
            }

            p,
            .checkbox-label,
            .register-link-text {
                color: #adb5bd;
            }

            .form-label {
                color: #adb5bd;
            }

            .divider::before,
            .divider::after {
                background-color: rgba(255, 255, 255, 0.1);
            }

            .divider {
                color: #adb5bd;
            }

            .btn-social {
                background-color: rgba(30, 41, 59, 0.8);
                border-color: rgba(255, 255, 255, 0.1);
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
            .login-container {
                padding: 2rem 1.5rem;
                max-width: 90%;
            }

            h1 {
                font-size: 1.75rem;
            }

            p {
                font-size: 1rem;
            }

            .checkbox-container {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
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
        <div class="login-container">
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
                <p>Silakan masuk untuk akses sistem kelola data karyawan</p>

                <form class="login-form" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="email" id="email" name="email" class="form-control" placeholder=" " required>
                        <label for="email" class="form-label">Email Address</label>
                        <i class="fas fa-envelope input-icon"></i>
                    </div>

                    <div class="form-group">
                        <input type="password" id="password" name="password" class="form-control" placeholder=" " required>
                        <label for="password" class="form-label">Password</label>
                        <i class="fas fa-eye-slash input-icon toggle-password"></i>
                    </div>

                    <div class="checkbox-container">
                        <div class="remember-me">
                            <input type="checkbox" id="remember" name="remember" class="checkbox-input">
                            <label for="remember" class="checkbox-label">Remember Me</label>
                        </div>
                        <a href="{{ route('password.request') }}" class="forgot-link">Lupa Password?</a>
                    </div>

                    <button type="submit" class="btn-login">
                        <i class="fas fa-sign-in-alt"></i>
                        <span>Masuk</span>
                    </button>
                </form>

                <div class="divider">
                    <span>atau</span>
                </div>

                <div class="social-login">
                    <a href="#" class="btn-social google">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="#" class="btn-social facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="btn-social twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                </div>

                <div class="register-link-container">
                    <span class="register-link-text">Belum memiliki akun? </span>
                    <a href="{{ route('register') }}" class="register-link">Daftar</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle password visibility
            const togglePassword = document.querySelector('.toggle-password');
            const passwordInput = document.querySelector('#password');

            if (togglePassword) {
                togglePassword.addEventListener('click', function() {
                    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput.setAttribute('type', type);

                    // Toggle eye icon
                    this.classList.toggle('fa-eye');
                    this.classList.toggle('fa-eye-slash');
                });
            }

            // Focus effect for inputs 
            const inputs = document.querySelectorAll('.form-control');
            inputs.forEach(input => {
                if (input.value !== '') {
                    input.classList.add('not-empty');
                }

                input.addEventListener('input', function() {
                    if (this.value !== '') {
                        this.classList.add('not-empty');
                    } else {
                        this.classList.remove('not-empty');
                    }
                });
            });

            // Animation for login button
            const loginBtn = document.querySelector('.btn-login');
            if (loginBtn) {
                loginBtn.addEventListener('mousedown', function() {
                    this.style.transform = 'scale(0.98)';
                });

                loginBtn.addEventListener('mouseup', function() {
                    this.style.transform = '';
                });

                loginBtn.addEventListener('mouseleave', function() {
                    this.style.transform = '';
                });
            }
        });
    </script>
</body>

</html>