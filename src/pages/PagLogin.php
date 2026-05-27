<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Login — Surubins Code</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <!-- LineIcons -->
    <link rel="stylesheet" href="https://cdn.lineicons.com/5.0/lineicons.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #071424 0%, #0e2238 40%, #1a3a5c 70%, #0e2238 100%);
            position: relative;
            overflow: hidden;
        }

        /* Animated background blobs */
        body::before,
        body::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.15;
            animation: float 8s ease-in-out infinite;
        }

        body::before {
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, #3b82f6, #1d4ed8);
            top: -100px;
            left: -100px;
            animation-delay: 0s;
        }

        body::after {
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, #06b6d4, #0891b2);
            bottom: -80px;
            right: -80px;
            animation-delay: 4s;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0) scale(1); }
            50% { transform: translate(20px, -20px) scale(1.05); }
        }

        /* Login wrapper */
        .login-wrapper {
            width: 100%;
            max-width: 440px;
            padding: 1rem;
            position: relative;
            z-index: 10;
        }

        /* Glass card */
        .login-card {
            background: rgba(255, 255, 255, 0.06);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 24px;
            padding: 2.5rem 2rem;
            box-shadow:
                0 25px 50px rgba(0, 0, 0, 0.4),
                0 0 0 1px rgba(255,255,255,0.05) inset;
            animation: slideUp 0.6s cubic-bezier(0.34, 1.56, 0.64, 1) both;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(40px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* Logo area */
        .login-logo {
            text-align: center;
            margin-bottom: 2rem;
        }

        .login-logo img {
            width: 80px;
            height: 80px;
            object-fit: contain;
            filter: drop-shadow(0 4px 16px rgba(59, 130, 246, 0.4));
            margin-bottom: 0.75rem;
        }

        .login-logo h1 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #ffffff;
            letter-spacing: -0.02em;
            margin: 0;
        }

        .login-logo p {
            font-size: 0.875rem;
            color: rgba(255,255,255,0.5);
            margin: 0.25rem 0 0;
        }

        /* Divider */
        .login-divider {
            border: none;
            border-top: 1px solid rgba(255,255,255,0.1);
            margin: 1.5rem 0;
        }

        /* Section title */
        .login-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #fff;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        /* Form labels */
        .form-label-custom {
            display: block;
            font-size: 0.825rem;
            font-weight: 600;
            color: rgba(255,255,255,0.7);
            margin-bottom: 0.4rem;
            letter-spacing: 0.02em;
        }

        /* Input fields */
        .input-group-custom {
            position: relative;
            margin-bottom: 1.25rem;
        }

        .input-group-custom .input-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255,255,255,0.4);
            font-size: 1rem;
            pointer-events: none;
            transition: color 0.2s;
        }

        .input-group-custom input {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 2.75rem;
            background: rgba(255,255,255,0.08);
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 12px;
            color: #ffffff;
            font-size: 0.9rem;
            font-family: 'Plus Jakarta Sans', sans-serif;
            transition: all 0.25s ease;
            outline: none;
        }

        .input-group-custom input::placeholder {
            color: rgba(255,255,255,0.3);
        }

        .input-group-custom input:focus {
            background: rgba(255,255,255,0.12);
            border-color: rgba(59, 130, 246, 0.6);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
            color: #ffffff;
        }

        .input-group-custom input:focus + .input-icon,
        .input-group-custom:focus-within .input-icon {
            color: #60a5fa;
        }

        /* Show/hide password toggle */
        .toggle-password {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: rgba(255,255,255,0.4);
            cursor: pointer;
            padding: 0;
            font-size: 0.95rem;
            transition: color 0.2s;
        }

        .toggle-password:hover {
            color: rgba(255,255,255,0.8);
        }

        /* Submit button */
        .btn-login {
            width: 100%;
            padding: 0.85rem;
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            border: none;
            border-radius: 12px;
            color: #ffffff;
            font-size: 1rem;
            font-weight: 600;
            font-family: 'Plus Jakarta Sans', sans-serif;
            cursor: pointer;
            transition: all 0.25s ease;
            box-shadow: 0 4px 16px rgba(37, 99, 235, 0.4);
            margin-top: 0.5rem;
            letter-spacing: 0.02em;
        }

        .btn-login:hover {
            background: linear-gradient(135deg, #1d4ed8, #1e40af);
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(37, 99, 235, 0.5);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        /* Error message */
        .login-error {
            background: rgba(239, 68, 68, 0.15);
            border: 1px solid rgba(239, 68, 68, 0.3);
            border-radius: 10px;
            color: #fca5a5;
            padding: 0.75rem 1rem;
            font-size: 0.875rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-top: 1rem;
            animation: shake 0.4s ease;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-6px); }
            75% { transform: translateX(6px); }
        }

        /* Footer */
        .login-footer {
            text-align: center;
            margin-top: 1.75rem;
            font-size: 0.78rem;
            color: rgba(255,255,255,0.25);
        }

        /* Responsive adjustments */
        @media (max-width: 480px) {
            .login-card {
                padding: 2rem 1.25rem;
                border-radius: 20px;
            }
            .login-logo img {
                width: 64px;
                height: 64px;
            }
        }
    </style>
</head>
<body>

    <div class="login-wrapper">
        <div class="login-card">

            <!-- Logo & Brand -->
            <div class="login-logo">
                <img src="../../img/logo.png" alt="Surubins Code Logo">
                <h1>Surubins Code</h1>
                <p>Sistema de Gestão</p>
            </div>

            <hr class="login-divider">

            <p class="login-title">Acesse sua conta</p>

            <!-- Login Form -->
            <form action="../classes/login.php" method="POST" id="loginForm">

                <!-- Usuário -->
                <label class="form-label-custom" for="usuario">Usuário</label>
                <div class="input-group-custom">
                    <i class="fa fa-user input-icon"></i>
                    <input
                        type="text"
                        id="usuario"
                        name="usuario"
                        placeholder="Digite seu usuário"
                        required
                        autocomplete="username"
                    >
                </div>

                <!-- Senha -->
                <label class="form-label-custom" for="senha">Senha</label>
                <div class="input-group-custom">
                    <i class="fa fa-lock input-icon"></i>
                    <input
                        type="password"
                        id="senha"
                        name="senha"
                        placeholder="Digite sua senha"
                        required
                        autocomplete="current-password"
                    >
                    <button type="button" class="toggle-password" onclick="toggleSenha()" id="toggleBtn">
                        <i class="fa fa-eye" id="eyeIcon"></i>
                    </button>
                </div>

                <!-- Submit -->
                <button type="submit" name="login" class="btn-login" id="loginBtn">
                    <i class="fa fa-sign-in" style="margin-right: 6px;"></i> Entrar
                </button>
            </form>

            <!-- Erro de login -->
            <?php if (isset($_SESSION['erro_login'])): ?>
                <div class="login-error">
                    <i class="fa fa-exclamation-circle"></i>
                    <?= htmlspecialchars($_SESSION['erro_login']) ?>
                </div>
                <?php unset($_SESSION['erro_login']); ?>
            <?php endif; ?>

        </div>

        <div class="login-footer">
            &copy; <?= date('Y') ?> Surubins Code. Todos os direitos reservados.
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle visibilidade da senha
        function toggleSenha() {
            const input = document.getElementById('senha');
            const icon  = document.getElementById('eyeIcon');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }

        // Loading state no botão ao submeter
        document.getElementById('loginForm').addEventListener('submit', function() {
            const btn = document.getElementById('loginBtn');
            btn.innerHTML = '<i class="fa fa-spinner fa-spin" style="margin-right:6px;"></i> Entrando...';
            btn.disabled = true;
        });
    </script>
</html>