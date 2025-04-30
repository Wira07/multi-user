@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card login-card fade-in">
                <div class="card-header">
                    <i class="fas fa-user-circle me-2"></i>{{ __('Login') }}
                </div>

                <div class="card-body login-card-body">
                    <div class="login-welcome mb-4">
                        <div class="login-icon-container mb-3">
                            <i class="fas fa-lock"></i>
                        </div>
                        <h4 class="text-center">Welcome Back!</h4>
                        <p class="text-center text-muted">Please enter your credentials to continue</p>
                    </div>
                    
                    <form method="POST" action="{{ route('login') }}" class="login-form">
                        @csrf

                        <div class="row mb-4">
                            <div class="col-md-12">
                                <div class="input-group form-floating">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">
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
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
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
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-12 d-flex justify-content-between align-items-center">
                                <div class="form-check remember-me">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                @if (Route::has('password.request'))
                                    <a class="forgot-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-login w-100">
                                    <i class="fas fa-sign-in-alt me-2"></i>{{ __('Login') }}
                                </button>
                            </div>
                        </div>
                        
                        <div class="row mt-4">
                            <div class="col-md-12 text-center">
                                <div class="login-divider">
                                    <span>or</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="social-login">
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
                                    Don't have an account? 
                                    <a href="{{ route('register') }}" class="register-link">Register</a>
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
    // Toggle password visibility
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
    
    // Add animation to login button
    const loginBtn = document.querySelector('.btn-login');
    if (loginBtn) {
        loginBtn.addEventListener('mousedown', function() {
            this.classList.add('btn-pressed');
        });
        
        loginBtn.addEventListener('mouseup', function() {
            this.classList.remove('btn-pressed');
        });
    }
});
</script>

<style>
/* Enhanced Login Page Styles */
.login-card {
    border-radius: 16px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
    overflow: hidden;
    transition: all 0.4s ease;
    margin-top: 2rem;
}

.login-card:hover {
    box-shadow: 0 15px 30px rgba(91, 49, 181, 0.1);
    transform: translateY(-5px);
}

.login-card::before {
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

.login-card-body {
    padding: 2rem;
}

.login-welcome {
    text-align: center;
}

.login-icon-container {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, var(--primary-color) 0%, #4a2795 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    box-shadow: 0 10px 15px rgba(91, 49, 181, 0.2);
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0% {
        box-shadow: 0 0 0 0 rgba(91, 49, 181, 0.4);
    }
    70% {
        box-shadow: 0 0 0 15px rgba(91, 49, 181, 0);
    }
    100% {
        box-shadow: 0 0 0 0 rgba(91, 49, 181, 0);
    }
}

.login-icon-container i {
    font-size: 2.5rem;
    color: white;
}

.login-form {
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

.form-floating .form-control:focus ~ .form-label,
.form-floating .form-control:not(:placeholder-shown) ~ .form-label {
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

.toggle-password {
    cursor: pointer;
}

.toggle-password:hover {
    color: var(--primary-color);
}

/* Remember me & forgot password */
.remember-me {
    display: flex;
    align-items: center;
}

.form-check-input {
    width: 1.1em;
    height: 1.1em;
    margin-top: 0;
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

.forgot-link {
    font-size: 0.9rem;
    color: var(--primary-color);
    text-decoration: none;
    transition: all 0.3s ease;
}

.forgot-link:hover {
    color: #4a2795;
    text-decoration: underline;
}

/* Login button */
.btn-login {
    background: linear-gradient(135deg, var(--primary-color) 0%, #4a2795 100%);
    border: none;
    border-radius: 10px;
    padding: 0.8rem 1.5rem;
    font-weight: 600;
    transition: all 0.3s ease;
    box-shadow: 0 4px 10px rgba(91, 49, 181, 0.3);
    position: relative;
    overflow: hidden;
}

.btn-login:hover {
    background: linear-gradient(135deg, #4a2795 0%, var(--primary-color) 100%);
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(91, 49, 181, 0.4);
}

.btn-login:active, .btn-pressed {
    transform: translateY(1px);
    box-shadow: 0 2px 5px rgba(91, 49, 181, 0.4);
}

.btn-login::after {
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

.btn-login:focus::after {
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
.login-divider {
    display: flex;
    align-items: center;
    text-align: center;
    margin: 1rem 0;
    color: #6c757d;
}

.login-divider::before,
.login-divider::after {
    content: '';
    flex: 1;
    border-bottom: 1px solid #e0e0e0;
}

.login-divider span {
    padding: 0 1rem;
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 1px;
}

/* Social login */
.social-login {
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

/* Register link */
.register-link {
    color: var(--primary-color);
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
}

.register-link:hover {
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

/* For smaller screens */
@media (max-width: 767.98px) {
    .login-card {
        margin-top: 1rem;
        border-radius: 12px;
    }
    
    .login-card-body {
        padding: 1.5rem;
    }
    
    .login-icon-container {
        width: 70px;
        height: 70px;
    }
    
    .login-icon-container i {
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