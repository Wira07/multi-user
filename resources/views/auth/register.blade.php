@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card register-card fade-in">
                <div class="card-header">
                    <i class="fas fa-user-plus me-2"></i>{{ __('Register') }}
                </div>

                <div class="card-body register-card-body">
                    <div class="register-welcome mb-4">
                        <div class="register-icon-container mb-3">
                            <i class="fas fa-user-edit"></i>
                        </div>
                        <h4 class="text-center">Create Account</h4>
                        <p class="text-center text-muted">Join our community today</p>
                    </div>

                    <form method="POST" action="{{ route('register') }}" class="register-form">
                        @csrf

                        <div class="row mb-4">
                            <div class="col-md-12">
                                <div class="input-group form-floating">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">
                                    <label for="name" class="form-label">{{ __('Name') }}</label>
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-12">
                                <div class="input-group form-floating">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address">
                                    <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-12">
                                <div class="input-group form-floating">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                                    <label for="password" class="form-label">{{ __('Password') }}</label>
                                    <div class="input-group-append">
                                        <span class="input-group-text toggle-password" role="button">
                                            <i class="fas fa-eye-slash"></i>
                                        </span>
                                    </div>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="password-strength mt-2 d-none">
                                    <div class="progress" style="height: 5px;">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 0%"></div>
                                    </div>
                                    <small class="text-muted password-feedback mt-1 d-block"></small>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-12">
                                <div class="input-group form-floating">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                    <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                                    <div class="input-group-append">
                                        <span class="input-group-text toggle-confirm-password" role="button">
                                            <i class="fas fa-eye-slash"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-12">
                                <div class="form-check terms-check">
                                    <input class="form-check-input" type="checkbox" name="terms" id="terms" required>
                                    <label class="form-check-label" for="terms">
                                        I agree to the <a href="#" class="terms-link">Terms of Service</a> and <a href="#" class="terms-link">Privacy Policy</a>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-register w-100">
                                    <i class="fas fa-user-plus me-2"></i>{{ __('Create Account') }}
                                </button>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12 text-center">
                                <div class="register-divider">
                                    <span>or</span>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="social-register">
                                    <a href="#" class="btn btn-outline-secondary btn-social">
                                        <i class="fab fa-google"></i>
                                    </a>
                                    <a href="#" class="btn btn-outline-secondary btn-social">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="#" class="btn btn-outline-secondary btn-social">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12 text-center">
                                <p class="mb-0">
                                    Already have an account?
                                    <a href="{{ route('login') }}" class="login-link">Login</a>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Toggle password visibility for password field
        const togglePassword = document.querySelector('.toggle-password');
        const passwordInput = document.querySelector('#password');

        if (togglePassword) {
            togglePassword.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);

                // Toggle eye icon
                this.querySelector('i').classList.toggle('fa-eye');
                this.querySelector('i').classList.toggle('fa-eye-slash');
            });
        }

        // Toggle password visibility for confirm password field
        const toggleConfirmPassword = document.querySelector('.toggle-confirm-password');
        const confirmPasswordInput = document.querySelector('#password-confirm');

        if (toggleConfirmPassword) {
            toggleConfirmPassword.addEventListener('click', function() {
                const type = confirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                confirmPasswordInput.setAttribute('type', type);

                // Toggle eye icon
                this.querySelector('i').classList.toggle('fa-eye');
                this.querySelector('i').classList.toggle('fa-eye-slash');
            });
        }

        // Password strength meter
        const passwordStrength = document.querySelector('.password-strength');
        const passwordBar = document.querySelector('.progress-bar');
        const passwordFeedback = document.querySelector('.password-feedback');

        if (passwordInput && passwordStrength) {
            passwordInput.addEventListener('input', function() {
                const value = this.value;

                if (value.length > 0) {
                    passwordStrength.classList.remove('d-none');

                    // Calculate strength
                    let strength = 0;

                    // Length check
                    if (value.length >= 8) strength += 25;

                    // Lowercase and uppercase check
                    if (/[a-z]/.test(value) && /[A-Z]/.test(value)) strength += 25;

                    // Number check
                    if (/[0-9]/.test(value)) strength += 25;

                    // Special character check
                    if (/[^A-Za-z0-9]/.test(value)) strength += 25;

                    // Update progress bar
                    passwordBar.style.width = strength + '%';

                    // Update color based on strength
                    if (strength <= 25) {
                        passwordBar.className = 'progress-bar bg-danger';
                        passwordFeedback.textContent = 'Weak password';
                    } else if (strength <= 50) {
                        passwordBar.className = 'progress-bar bg-warning';
                        passwordFeedback.textContent = 'Medium password';
                    } else if (strength <= 75) {
                        passwordBar.className = 'progress-bar bg-info';
                        passwordFeedback.textContent = 'Good password';
                    } else {
                        passwordBar.className = 'progress-bar bg-success';
                        passwordFeedback.textContent = 'Strong password';
                    }
                } else {
                    passwordStrength.classList.add('d-none');
                }
            });
        }

        // Add floating label effect
        const inputs = document.querySelectorAll('.form-control');
        inputs.forEach(input => {
            input.addEventListener('focus', () => {
                input.parentElement.classList.add('focused');
            });

            input.addEventListener('blur', () => {
                if (input.value === '') {
                    input.parentElement.classList.remove('focused');
                }
            });

            // Check if input already has value on page load
            if (input.value !== '') {
                input.parentElement.classList.add('focused');
            }
        });

        // Add animation to register button
        const registerBtn = document.querySelector('.btn-register');
        if (registerBtn) {
            registerBtn.addEventListener('mousedown', function() {
                this.classList.add('btn-pressed');
            });

            registerBtn.addEventListener('mouseup', function() {
                this.classList.remove('btn-pressed');
            });
        }

        // Password match validation
        if (passwordInput && confirmPasswordInput) {
            confirmPasswordInput.addEventListener('input', function() {
                if (passwordInput.value !== this.value) {
                    this.classList.add('is-invalid');
                    if (!this.nextElementSibling || !this.nextElementSibling.classList.contains('invalid-feedback')) {
                        const feedback = document.createElement('div');
                        feedback.className = 'invalid-feedback';
                        feedback.innerHTML = '<strong>Passwords do not match</strong>';
                        this.parentElement.appendChild(feedback);
                    }
                } else {
                    this.classList.remove('is-invalid');
                    if (this.nextElementSibling && this.nextElementSibling.classList.contains('invalid-feedback')) {
                        this.nextElementSibling.remove();
                    }
                }
            });
        }
    });
</script>

<style>
    /* Enhanced Register Page Styles */
    .register-card {
        border-radius: 16px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        transition: all 0.4s ease;
        margin-top: 2rem;
    }

    .register-card:hover {
        box-shadow: 0 15px 30px rgba(91, 49, 181, 0.1);
        transform: translateY(-5px);
    }

    .register-card::before {
        height: 6px;
        background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
    }

    .card-header {
        font-size: 1.25rem;
        font-weight: 600;
        color: var(--primary-color);
        display: flex;
        align-items: center;
        padding: 1.5rem;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }

    .register-card-body {
        padding: 2rem;
    }

    .register-welcome {
        text-align: center;
    }

    .register-icon-container {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, var(--secondary-color) 0%, var(--primary-color) 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        box-shadow: 0 10px 15px rgba(91, 49, 181, 0.2);
        animation: float 3s ease-in-out infinite;
    }

    @keyframes float {
        0% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-10px);
        }

        100% {
            transform: translateY(0px);
        }
    }

    .register-icon-container i {
        font-size: 2.5rem;
        color: white;
    }

    .register-form {
        margin-top: 1.5rem;
    }

    /* Form styling */
    .form-floating {
        position: relative;
        margin-bottom: 0.5rem;
        width: 100%;
    }

    .form-floating .form-control {
        height: calc(3.5rem + 2px);
        padding: 1rem 1rem 0.5rem;
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        transition: all 0.3s ease;
        font-size: 1rem;
    }

    .form-floating .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.25rem rgba(91, 49, 181, 0.25);
    }

    .form-floating .form-label {
        position: absolute;
        top: 0;
        left: 1rem;
        height: 100%;
        padding: 1rem 0;
        pointer-events: none;
        border: 1px solid transparent;
        transform-origin: 0 0;
        transition: opacity .1s ease-in-out, transform .1s ease-in-out;
        color: #6c757d;
    }

    .form-floating .form-control:focus~.form-label,
    .form-floating .form-control:not(:placeholder-shown)~.form-label {
        transform: scale(0.85) translateY(-0.5rem) translateX(0.15rem);
        color: var(--primary-color);
    }

    .input-group {
        display: flex;
        align-items: center;
        position: relative;
    }

    .input-group-text {
        position: absolute;
        right: 16px;
        top: 50%;
        transform: translateY(-50%);
        background: transparent;
        border: none;
        color: #6c757d;
        z-index: 10;
        cursor: pointer;
    }

    .input-group-text i {
        font-size: 1.1rem;
    }

    .toggle-password,
    .toggle-confirm-password {
        cursor: pointer;
    }

    .toggle-password:hover,
    .toggle-confirm-password:hover {
        color: var(--primary-color);
    }

    /* Password strength */
    .password-strength {
        margin-top: 0.5rem;
    }

    .progress {
        border-radius: 30px;
        height: 5px;
        margin-bottom: 0.25rem;
    }

    .password-feedback {
        font-size: 0.8rem;
        color: #6c757d;
    }

    /* Terms checkbox */
    .terms-check {
        margin: 1rem 0;
    }

    .form-check-input {
        width: 1.1em;
        height: 1.1em;
        margin-top: 0.2em;
        vertical-align: top;
        border: 2px solid #e0e0e0;
        border-radius: 4px;
        transition: all 0.3s ease;
    }

    .form-check-input:checked {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
    }

    .form-check-label {
        margin-left: 0.5rem;
        font-size: 0.9rem;
        color: #6c757d;
    }

    .terms-link {
        color: var(--primary-color);
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .terms-link:hover {
        color: #4a2795;
        text-decoration: underline;
    }

    /* Register button */
    .btn-register {
        background: linear-gradient(135deg, var(--secondary-color) 0%, var(--primary-color) 100%);
        border: none;
        border-radius: 10px;
        padding: 0.8rem 1.5rem;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 4px 10px rgba(91, 49, 181, 0.3);
        position: relative;
        overflow: hidden;
    }

    .btn-register:hover {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(91, 49, 181, 0.4);
    }

    .btn-register:active,
    .btn-pressed {
        transform: translateY(1px);
        box-shadow: 0 2px 5px rgba(91, 49, 181, 0.4);
    }

    .btn-register::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 5px;
        height: 5px;
        background: rgba(255, 255, 255, 0.5);
        opacity: 0;
        border-radius: 100%;
        transform: scale(1, 1) translate(-50%);
        transform-origin: 50% 50%;
    }

    .btn-register:focus::after {
        animation: ripple 1s ease-out;
    }

    @keyframes ripple {
        0% {
            transform: scale(0, 0);
            opacity: 0.5;
        }

        100% {
            transform: scale(100, 100);
            opacity: 0;
        }
    }

    /* Divider */
    .register-divider {
        display: flex;
        align-items: center;
        text-align: center;
        margin: 1rem 0;
        color: #6c757d;
    }

    .register-divider::before,
    .register-divider::after {
        content: '';
        flex: 1;
        border-bottom: 1px solid #e0e0e0;
    }

    .register-divider span {
        padding: 0 1rem;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* Social login */
    .social-register {
        display: flex;
        justify-content: center;
        gap: 1rem;
    }

    .btn-social {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        border: 2px solid #e0e0e0;
        color: #6c757d;
    }

    .btn-social:hover {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
        color: white;
        transform: translateY(-3px);
    }

    .btn-social i {
        font-size: 1.2rem;
    }

    /* Login link */
    .login-link {
        color: var(--primary-color);
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .login-link:hover {
        color: #4a2795;
        text-decoration: underline;
    }

    /* Animation classes */
    .fade-in {
        animation: fadeIn 0.6s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Invalid feedback styling */
    .invalid-feedback {
        display: block;
        margin-top: 0.25rem;
        font-size: 0.875em;
        color: var(--danger-color);
    }

    /* For smaller screens */
    @media (max-width: 767.98px) {
        .register-card {
            margin-top: 1rem;
            border-radius: 12px;
        }

        .register-card-body {
            padding: 1.5rem;
        }

        .register-icon-container {
            width: 70px;
            height: 70px;
        }

        .register-icon-container i {
            font-size: 2rem;
        }

        .card-header {
            padding: 1.25rem;
        }

        .row {
            margin-right: 0;
            margin-left: 0;
        }
    }
</style>
@endsection