<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="SustainVerse authentication" />
    <meta name="keywords" content="sustainverse, login, register" />
    <meta name="author" content="sustainverse" />

    <link rel="icon" href="{{ asset('assets/images/fav-icon.png') }}" type="image/png" />
    <link rel="shortcut icon" href="{{ asset('assets/images/fav-icon.png') }}" type="image/png" />
    <title>SustainVerse - Sign In</title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,500,700" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />

    <style>
        :root {
            --sv-primary: #1d8f2c;
            --sv-secondary: #18a8d8;
            --sv-accent: #ff7029;
            --sv-dark: #1e2c24;
            --sv-muted: #7f8883;
            --sv-white: #ffffff;
            --sv-soft: #eef3ef;
        }

        body {
            min-height: 100vh;
            margin: 0;
            font-family: "Rubik", sans-serif;
            background:
                radial-gradient(circle at 14% 20%, rgba(24, 168, 216, 0.15), transparent 38%),
                radial-gradient(circle at 85% 82%, rgba(29, 143, 44, 0.16), transparent 34%),
                #e9ebea;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .auth-stage {
            width: min(980px, 100%);
        }

        .auth-alert {
            margin-bottom: 14px;
        }

        .auth-fixed-alerts {
            position: fixed;
            top: 16px;
            left: 16px;
            z-index: 9999;
            width: min(360px, calc(100vw - 32px));
        }

        .auth-fixed-alerts .alert {
            margin-bottom: 10px;
            box-shadow: 0 10px 24px rgba(0, 0, 0, 0.14);
            border-radius: 10px;
        }

        .auth-card {
            border-radius: 18px;
            overflow: hidden;
            background: var(--sv-white);
            box-shadow: 0 18px 44px rgba(17, 29, 22, 0.12);
            display: flex;
            min-height: 560px;
        }

        .auth-visual {
            width: 42%;
            position: relative;
            background:
                linear-gradient(160deg, rgba(24, 168, 216, 0.95), rgba(29, 143, 44, 0.93));
            color: #ecfff2;
            padding: 36px 28px 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .auth-visual h2 {
            color: #fff;
            font-size: 32px;
            line-height: 1.2;
            margin-bottom: 10px;
        }

        .auth-visual p {
            color: rgba(255, 255, 255, 0.88);
            font-size: 14px;
            line-height: 1.6;
            max-width: 290px;
        }

        .visual-image {
            width: 100%;
            margin-top: 14px;
            border-radius: 10px;
            max-height: 280px;
            object-fit: contain;
            background: transparent;
            mix-blend-mode: normal;
            filter: none;
        }

        .visual-image img{
            object-fit: cover;
            width: 100%;
            height: 100%;
            border-radius: 10px;
        }

        .visual-chip {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.18);
            color: #fff;
            padding: 7px 12px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }

        .auth-panel {
            width: 58%;
            position: relative;
            overflow: hidden;
            background: #fff;
        }

        .forms-track {
            width: 200%;
            height: 100%;
            display: flex;
            transition: transform 0.45s ease;
        }

        .auth-panel.is-register .forms-track {
            transform: translateX(-50%);
        }

        .auth-form {
            width: 50%;
            padding: 56px 52px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .auth-title {
            color: var(--sv-dark);
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .auth-subtitle {
            color: var(--sv-muted);
            font-size: 14px;
            margin-bottom: 24px;
        }

        .auth-input {
            margin-bottom: 13px;
        }

        .auth-input .input-group {
            border: 1px solid #e3e8e4;
            border-radius: 12px;
            overflow: hidden;
            background: var(--sv-soft);
        }

        .auth-input .input-group:focus-within {
            border-color: rgba(29, 143, 44, 0.55);
            box-shadow: 0 0 0 3px rgba(29, 143, 44, 0.12);
            background: #fff;
        }

        .auth-input .input-group-text {
            margin-top: 10px;
            border: none;
            background: transparent;
            color: #5d675f;
        }

        .auth-input .form-control {
            border: none;
            background: transparent;
            color: #2d352f;
            height: 46px;
            font-size: 14px;
        }

        .auth-input .form-control:focus {
            box-shadow: none;
        }

        .auth-meta {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            margin: 6px 0 20px;
            font-size: 13px;
        }

        .auth-meta a {
            color: #1aa1cf;
            text-decoration: none;
            font-weight: 500;
        }

        .auth-meta a:hover {
            color: var(--sv-primary);
        }

        .auth-submit {
            width: 100%;
            border: 0;
            border-radius: 999px;
            height: 44px;
            font-size: 15px;
            font-weight: 600;
            color: #fff;
            background: linear-gradient(92deg, #18a8d8, #1d8f2c);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .auth-submit:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 16px rgba(24, 168, 216, 0.28);
        }

        .switch-row {
            margin-top: 15px;
            font-size: 13px;
            color: var(--sv-muted);
            text-align: center;
        }

        .switch-row button {
            border: none;
            background: transparent;
            color: var(--sv-accent);
            font-weight: 600;
            cursor: pointer;
            padding: 0;
        }

        .switch-row button:hover {
            color: var(--sv-primary);
        }

        .hide-eye {
            cursor: pointer;
        }

        @media (max-width: 991px) {
            .auth-card {
                min-height: 0;
                flex-direction: column;
            }

            .auth-visual,
            .auth-panel {
                width: 100%;
            }

            .auth-visual {
                min-height: 240px;
            }

            .visual-image {
                max-height: 200px;
            }
        }

        @media (max-width: 767px) {
            body {
                padding: 10px;
            }

            .auth-form {
                padding: 30px 20px;
            }

            .auth-title {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>
    <div class="auth-fixed-alerts">
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0 ps-3">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <div class="auth-stage">
        <div class="auth-card">
            <div class="auth-visual">
                <div>
                    <span class="visual-chip">
                        <i class="fa-solid fa-leaf"></i>
                        SustainVerse
                    </span>
                    <h2>Manufacturing Execution Simplified</h2>
                    <p>
                        Sign in to manage your sustainability platform operations with one unified dashboard.
                    </p>
                </div>
                <div class="visual-image">
                    <img src="{{ asset('assets/images/login.png') }}" alt="Sustainable energy" />
                </div>
            </div>

            <div class="auth-panel" id="authPanel">
                <div class="forms-track">
                    <form class="auth-form" action="{{ route('login.index') }}" method="post" autocomplete="off">
                        @csrf
                        <h3 class="auth-title">Sign In</h3>
                        <p class="auth-subtitle">Use your account credentials to continue.</p>

                        <div class="auth-input">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i data-feather="mail"></i></span>
                                </div>
                                <input type="email" name="email" class="form-control" placeholder="Enter Email" value="{{ old('email') }}" required />
                            </div>
                        </div>

                        <div class="auth-input">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i data-feather="lock"></i></span>
                                </div>
                                <input type="password" id="pwd-input" name="password" class="form-control" placeholder="Enter Password" required />
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i id="pwd-icon" class="far fa-eye-slash hide-eye"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="auth-meta">
                            <label class="mb-0">
                                <input class="checkbox_animated color-2" type="checkbox" />
                                Remember me
                            </label>
                            <a href="#">Forgot password?</a>
                        </div>

                        <button type="submit" class="auth-submit">Sign In</button>

                        <div class="switch-row">
                            New here?
                            <button type="button" id="openRegister">Create Account</button>
                        </div>
                    </form>

                    <form class="auth-form" action="{{ route('register.index')}} " method="post" autocomplete="off">
                        @csrf
                        <!-- <input type="hidden" name="role_id" value="3" /> -->

                        <h3 class="auth-title">Create Account</h3>
                        <p class="auth-subtitle">Register and start your sustainability journey.</p>

                        <div class="auth-input">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i data-feather="user"></i></span>
                                </div>
                                <input type="text" name="name" class="form-control" placeholder="Full Name" value="{{ old('name') }}" required />
                            </div>
                        </div>

                        <div class="auth-input">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i data-feather="mail"></i></span>
                                </div>
                                <input type="email" name="email" class="form-control" placeholder="Email Address" value="{{ old('email') }}" required />
                            </div>
                        </div>

                        <div class="auth-input">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i data-feather="phone"></i></span>
                                </div>
                                <input type="text" name="phone" class="form-control" placeholder="Phone Number" value="{{ old('phone') }}" required />
                            </div>
                        </div>

                        <div class="auth-input">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i data-feather="lock"></i></span>
                                </div>
                                <input type="password" id="register-password" name="password" class="form-control" placeholder="Create Password" required />
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i id="register-password-icon" class="far fa-eye-slash hide-eye"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="auth-input">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i data-feather="shield"></i></span>
                                </div>
                                <input type="password" id="register-confirm-password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required />
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i id="register-confirm-password-icon" class="far fa-eye-slash hide-eye"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="auth-submit">Create Account</button>

                        <div class="switch-row">
                            Already have an account?
                            <button type="button" id="openLogin">Log In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/feather-icon/feather-icon.js') }}"></script>
    <script src="{{ asset('assets/js/admin-script.js') }}"></script>
    <script src="{{ asset('assets/js/login.js') }}"></script>

    <script>
        (function () {
            var panel = document.getElementById('authPanel');
            var openRegister = document.getElementById('openRegister');
            var openLogin = document.getElementById('openLogin');
            var shouldOpenRegister = @json(old('name') || old('phone'));

            if (shouldOpenRegister) {
                panel.classList.add('is-register');
            }

            if (openRegister) {
                openRegister.addEventListener('click', function () {
                    panel.classList.add('is-register');
                });
            }

            if (openLogin) {
                openLogin.addEventListener('click', function () {
                    panel.classList.remove('is-register');
                });
            }

            function attachPasswordToggle(iconId, inputId) {
                var icon = document.getElementById(iconId);
                var input = document.getElementById(inputId);

                if (!icon || !input) {
                    return;
                }

                icon.addEventListener('click', function () {
                    var isHidden = input.type === 'password';
                    input.type = isHidden ? 'text' : 'password';
                    icon.classList.toggle('fa-eye', isHidden);
                    icon.classList.toggle('fa-eye-slash', !isHidden);
                });
            }

            attachPasswordToggle('register-password-icon', 'register-password');
            attachPasswordToggle('register-confirm-password-icon', 'register-confirm-password');
        })();
    </script>
</body>

</html>
