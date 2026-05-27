<?php

session_start();

if (!isset($_SESSION['usuario_id'])){
    header('location: src/pages/PagLogin.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Início — Surubins Code</title>

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
    <!-- Shared styles -->
    <link rel="stylesheet" href="Paginas/style.css?v=<?= time() ?>">

    <style>
        /* ── Dashboard-specific overrides ─────────────────────────── */
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f0f4f8;
        }

        /* ── Welcome hero ─────────────────────────────────────────── */
        .welcome-hero {
            background: linear-gradient(135deg, #071424 0%, #0e2238 45%, #1a3a5c 100%);
            border-radius: 20px;
            padding: 2.5rem 2rem;
            color: #fff;
            position: relative;
            overflow: hidden;
            margin-bottom: 1.75rem;
            box-shadow: 0 10px 40px rgba(7, 20, 36, 0.25);
        }

        .welcome-hero::before {
            content: '';
            position: absolute;
            width: 320px;
            height: 320px;
            background: radial-gradient(circle, rgba(59,130,246,0.18), transparent 70%);
            border-radius: 50%;
            top: -80px;
            right: -60px;
            pointer-events: none;
        }

        .welcome-hero::after {
            content: '';
            position: absolute;
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, rgba(6,182,212,0.12), transparent 70%);
            border-radius: 50%;
            bottom: -60px;
            left: 30px;
            pointer-events: none;
        }

        .welcome-hero h1 {
            font-size: clamp(1.4rem, 3vw, 2rem);
            font-weight: 700;
            margin: 0 0 0.35rem;
        }

        .welcome-hero p {
            font-size: 0.9rem;
            color: rgba(255,255,255,0.6);
            margin: 0;
        }

        .welcome-hero .hero-logo {
            width: 56px;
            height: 56px;
            background: rgba(255,255,255,0.1);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: #60a5fa;
            border: 1px solid rgba(255,255,255,0.12);
            flex-shrink: 0;
        }

        .welcome-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            background: rgba(34,197,94,0.15);
            border: 1px solid rgba(34,197,94,0.25);
            color: #86efac;
            font-size: 0.75rem;
            font-weight: 600;
            padding: 0.3rem 0.75rem;
            border-radius: 50px;
            margin-bottom: 0.75rem;
        }

        .welcome-badge span {
            width: 6px;
            height: 6px;
            background: #4ade80;
            border-radius: 50%;
            animation: pulse-dot 1.5s ease-in-out infinite;
        }

        @keyframes pulse-dot {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.5; transform: scale(0.8); }
        }

        /* ── Stat cards ───────────────────────────────────────────── */
        .stat-card {
            background: #ffffff;
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            border: 1px solid #e9f0f8;
            transition: all 0.25s ease;
            height: 100%;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(0,0,0,0.09);
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            margin-bottom: 1rem;
        }

        .stat-icon.blue   { background: #eff6ff; color: #2563eb; }
        .stat-icon.green  { background: #f0fdf4; color: #16a34a; }
        .stat-icon.purple { background: #faf5ff; color: #9333ea; }
        .stat-icon.orange { background: #fff7ed; color: #ea580c; }

        .stat-label {
            font-size: 0.78rem;
            font-weight: 600;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 0.25rem;
        }

        .stat-value {
            font-size: 1.75rem;
            font-weight: 700;
            color: #1e293b;
            line-height: 1;
        }

        .stat-sub {
            font-size: 0.78rem;
            color: #94a3b8;
            margin-top: 0.35rem;
        }

        /* ── Quick-access cards ───────────────────────────────────── */
        .section-title {
            font-size: 1rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 1rem;
        }

        .quick-card {
            background: #ffffff;
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            border: 1px solid #e9f0f8;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 1rem;
            transition: all 0.25s ease;
            color: inherit;
            height: 100%;
        }

        .quick-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(0,0,0,0.09);
            color: inherit;
            border-color: #bfdbfe;
        }

        .quick-icon {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            flex-shrink: 0;
        }

        .quick-icon.blue   { background: #eff6ff; color: #2563eb; }
        .quick-icon.green  { background: #f0fdf4; color: #16a34a; }
        .quick-icon.purple { background: #faf5ff; color: #9333ea; }
        .quick-icon.orange { background: #fff7ed; color: #ea580c; }

        .quick-name {
            font-size: 0.9rem;
            font-weight: 600;
            color: #1e293b;
            margin: 0 0 0.2rem;
        }

        .quick-desc {
            font-size: 0.78rem;
            color: #94a3b8;
            margin: 0;
        }

        /* ── Time display ─────────────────────────────────────────── */
        .hero-time {
            font-size: 0.82rem;
            color: rgba(255,255,255,0.45);
            margin-top: 0.5rem;
        }

        /* ── Responsive ───────────────────────────────────────────── */
        @media (max-width: 576px) {
            .welcome-hero {
                padding: 1.75rem 1.25rem;
            }
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <?php include 'src/Comum/sidebar.php'; ?>

        <div class="main p-3 p-md-4">

            <!-- Welcome Hero -->
            <div class="welcome-hero">
                <div class="d-flex align-items-start justify-content-between flex-wrap gap-3">
                    <div>
                        <div class="welcome-badge">
                            <span></span> Online
                        </div>
                        <h1>Olá, <?= htmlspecialchars($_SESSION['usuario_nome'] ?? 'Usuário') ?>! 👋</h1>
                        <p>Bem-vindo de volta ao painel de gestão.</p>
                        <p class="hero-time" id="heroTime"></p>
                    </div>
                    <div class="hero-logo">
                        <i class="lni lni-dashboard"></i>
                    </div>
                </div>
            </div>

            <!-- Stat Cards -->
            <div class="row g-3 mb-4">
                <div class="col-6 col-lg-3">
                    <div class="stat-card">
                        <div class="stat-icon blue"><i class="fa fa-users"></i></div>
                        <div class="stat-label">Clientes</div>
                        <div class="stat-value">—</div>
                        <div class="stat-sub">Cadastros ativos</div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="stat-card">
                        <div class="stat-icon green"><i class="fa fa-cubes"></i></div>
                        <div class="stat-label">Produtos</div>
                        <div class="stat-value">—</div>
                        <div class="stat-sub">Em estoque</div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="stat-card">
                        <div class="stat-icon purple"><i class="fa fa-truck"></i></div>
                        <div class="stat-label">Fornecedores</div>
                        <div class="stat-value">—</div>
                        <div class="stat-sub">Cadastrados</div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="stat-card">
                        <div class="stat-icon orange"><i class="fa fa-user-circle"></i></div>
                        <div class="stat-label">Usuários</div>
                        <div class="stat-value">—</div>
                        <div class="stat-sub">No sistema</div>
                    </div>
                </div>
            </div>

            <!-- Quick Access -->
            <p class="section-title"><i class="fa fa-th-large" style="margin-right:6px; color:#2563eb;"></i> Acesso Rápido</p>
            <div class="row g-3">
                <div class="col-12 col-sm-6 col-lg-3">
                    <a href="./src/pages/cadcli/CadCliteste.php" class="quick-card">
                        <div class="quick-icon blue"><i class="fa fa-users"></i></div>
                        <div>
                            <p class="quick-name">Clientes</p>
                            <p class="quick-desc">Cadastro e manutenção</p>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <a href="./src/pages/cadprod/cadProd.php" class="quick-card">
                        <div class="quick-icon green"><i class="fa fa-cubes"></i></div>
                        <div>
                            <p class="quick-name">Produtos</p>
                            <p class="quick-desc">Estoque e valores</p>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <a href="./src/pages/cadforn/CadForn.php" class="quick-card">
                        <div class="quick-icon purple"><i class="fa fa-truck"></i></div>
                        <div>
                            <p class="quick-name">Fornecedores</p>
                            <p class="quick-desc">Fornecedores cadastrados</p>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <a href="./src/pages/cadusu/CadUsu.php" class="quick-card">
                        <div class="quick-icon orange"><i class="fa fa-user-circle"></i></div>
                        <div>
                            <p class="quick-name">Usuários</p>
                            <p class="quick-desc">Gestão de acesso</p>
                        </div>
                    </a>
                </div>
            </div>

        </div><!-- /.main -->
    </div><!-- /.wrapper -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="Paginas/Script.js"></script>
    <script>
        // Live clock in the hero
        function updateTime() {
            const now = new Date();
            const options = {
                weekday: 'long', day: '2-digit',
                month: 'long', year: 'numeric',
                hour: '2-digit', minute: '2-digit'
            };
            document.getElementById('heroTime').textContent =
                now.toLocaleDateString('pt-BR', options);
        }
        updateTime();
        setInterval(updateTime, 60000);
    </script>
</html>