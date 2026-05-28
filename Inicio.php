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

        /* ════════════════════════════════════════════════════════════
           CALENDÁRIO / AGENDA
        ════════════════════════════════════════════════════════════ */

        .agenda-wrapper {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.06);
            border: 1px solid #e9f0f8;
            overflow: hidden;
            margin-top: 2rem;
        }

        /* ── Header do calendário ─────────────────────────────────── */
        .cal-header {
            background: linear-gradient(135deg, #071424 0%, #0e2238 50%, #1a3a5c 100%);
            padding: 1.25rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 0.75rem;
        }

        .cal-header h2 {
            color: #fff;
            font-size: 1rem;
            font-weight: 700;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .cal-nav {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .cal-nav-btn {
            width: 34px;
            height: 34px;
            border-radius: 8px;
            border: 1px solid rgba(255,255,255,0.15);
            background: rgba(255,255,255,0.08);
            color: #fff;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
            font-size: 0.85rem;
        }

        .cal-nav-btn:hover { background: rgba(255,255,255,0.18); }

        .cal-month-label {
            color: #fff;
            font-weight: 600;
            font-size: 0.95rem;
            min-width: 160px;
            text-align: center;
        }

        .btn-novo-agend {
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            border: none;
            color: #fff;
            font-size: 0.82rem;
            font-weight: 600;
            padding: 0.45rem 1rem;
            border-radius: 8px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.4rem;
            transition: all 0.2s;
            box-shadow: 0 4px 12px rgba(37,99,235,0.35);
        }

        .btn-novo-agend:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(37,99,235,0.45);
        }

        /* ── Dias da semana ───────────────────────────────────────── */
        .cal-weekdays {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            background: #f8fafd;
            border-bottom: 1px solid #e9f0f8;
        }

        .cal-weekday {
            padding: 0.6rem 0.25rem;
            text-align: center;
            font-size: 0.72rem;
            font-weight: 700;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        /* ── Grade do calendário ──────────────────────────────────── */
        .cal-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            border-left: 1px solid #e9f0f8;
        }

        .cal-cell {
            min-height: 110px;
            border-right: 1px solid #e9f0f8;
            border-bottom: 1px solid #e9f0f8;
            padding: 0.4rem;
            position: relative;
            cursor: default;
            transition: background 0.15s;
        }

        .cal-cell:hover { background: #f8fafd; }

        .cal-cell.other-month .day-num { color: #cbd5e1; }
        .cal-cell.other-month { background: #fafbfd; }

        .cal-cell.today { background: #eff6ff; }
        .cal-cell.today .day-num {
            background: #2563eb;
            color: #fff;
            border-radius: 50%;
            width: 26px;
            height: 26px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        .day-num {
            font-size: 0.8rem;
            font-weight: 600;
            color: #475569;
            margin-bottom: 0.25rem;
            width: 26px;
            height: 26px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .cal-cell.clickable { cursor: pointer; }

        /* ── Eventos no calendário ────────────────────────────────── */
        .cal-event {
            font-size: 0.7rem;
            font-weight: 600;
            padding: 0.15rem 0.4rem;
            border-radius: 5px;
            margin-bottom: 2px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            cursor: pointer;
            transition: opacity 0.15s;
            color: #fff;
        }

        .cal-event:hover { opacity: 0.82; }

        .cal-more {
            font-size: 0.67rem;
            color: #94a3b8;
            font-weight: 600;
            cursor: pointer;
            padding: 0 0.2rem;
        }

        /* ── Mini agenda lateral ──────────────────────────────────── */
        .agenda-side {
            border-top: 1px solid #e9f0f8;
            padding: 1.25rem 1.5rem;
            background: #f8fafd;
        }

        .agenda-side h3 {
            font-size: 0.85rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 0.75rem;
        }

        .ag-item {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            padding: 0.65rem 0.75rem;
            border-radius: 10px;
            margin-bottom: 0.5rem;
            background: #fff;
            border: 1px solid #e9f0f8;
            cursor: pointer;
            transition: all 0.2s;
        }

        .ag-item:hover {
            box-shadow: 0 4px 12px rgba(0,0,0,0.07);
            transform: translateX(3px);
        }

        .ag-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            flex-shrink: 0;
            margin-top: 3px;
        }

        .ag-info { flex: 1; min-width: 0; }

        .ag-title {
            font-size: 0.82rem;
            font-weight: 600;
            color: #1e293b;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .ag-meta {
            font-size: 0.72rem;
            color: #94a3b8;
            margin-top: 2px;
        }

        .ag-status {
            font-size: 0.67rem;
            font-weight: 700;
            padding: 0.15rem 0.5rem;
            border-radius: 50px;
            flex-shrink: 0;
        }

        .ag-status.agendado   { background: #eff6ff; color: #2563eb; }
        .ag-status.confirmado { background: #f0fdf4; color: #16a34a; }
        .ag-status.concluido  { background: #f5f3ff; color: #7c3aed; }
        .ag-status.cancelado  { background: #fef2f2; color: #dc2626; }

        /* ── Modal de agendamento ─────────────────────────────────── */
        .modal-agenda .modal-content {
            border-radius: 18px;
            border: none;
            box-shadow: 0 20px 60px rgba(0,0,0,0.18);
        }

        .modal-agenda .modal-header {
            background: linear-gradient(135deg, #071424 0%, #1a3a5c 100%);
            border-radius: 18px 18px 0 0;
            border-bottom: none;
            padding: 1.25rem 1.5rem;
        }

        .modal-agenda .modal-title {
            color: #fff;
            font-weight: 700;
            font-size: 1rem;
        }

        .modal-agenda .btn-close { filter: invert(1); opacity: 0.7; }

        .modal-agenda .modal-body { padding: 1.5rem; }

        .modal-agenda .form-label {
            font-size: 0.8rem;
            font-weight: 600;
            color: #475569;
            margin-bottom: 0.3rem;
        }

        .modal-agenda .form-control,
        .modal-agenda .form-select {
            border-radius: 10px;
            border: 1px solid #e2e8f0;
            font-size: 0.85rem;
            padding: 0.55rem 0.85rem;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .modal-agenda .form-control:focus,
        .modal-agenda .form-select:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59,130,246,0.12);
        }

        .cor-picker {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .cor-opt {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            cursor: pointer;
            border: 3px solid transparent;
            transition: all 0.15s;
        }

        .cor-opt.selected,
        .cor-opt:hover { border-color: #1e293b; transform: scale(1.15); }

        .modal-agenda .modal-footer {
            border-top: 1px solid #f1f5f9;
            padding: 1rem 1.5rem;
            gap: 0.5rem;
        }

        .btn-salvar-ag {
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            border: none;
            color: #fff;
            font-weight: 600;
            font-size: 0.85rem;
            padding: 0.55rem 1.25rem;
            border-radius: 10px;
            transition: all 0.2s;
        }

        .btn-salvar-ag:hover { opacity: 0.9; transform: translateY(-1px); }

        .btn-excluir-ag {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #dc2626;
            font-weight: 600;
            font-size: 0.85rem;
            padding: 0.55rem 1.25rem;
            border-radius: 10px;
            transition: all 0.2s;
        }

        .btn-excluir-ag:hover { background: #fee2e2; }

        /* ── Toast notificação ────────────────────────────────────── */
        .ag-toast {
            position: fixed;
            bottom: 1.5rem;
            right: 1.5rem;
            background: #1e293b;
            color: #fff;
            padding: 0.75rem 1.25rem;
            border-radius: 12px;
            font-size: 0.85rem;
            font-weight: 600;
            box-shadow: 0 8px 24px rgba(0,0,0,0.2);
            z-index: 9999;
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.35s ease;
            pointer-events: none;
        }

        .ag-toast.show {
            opacity: 1;
            transform: translateY(0);
        }

        /* ── Loading spinner ──────────────────────────────────────── */
        .cal-loading {
            display: none;
            position: absolute;
            inset: 0;
            background: rgba(255,255,255,0.7);
            z-index: 10;
            align-items: center;
            justify-content: center;
            border-radius: 0 0 20px 20px;
        }

        .cal-loading.show { display: flex; }

        /* ── Botão de logout ──────────────────────────────────────── */
        .btn-logout {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            background: rgba(239, 68, 68, 0.12);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: #fca5a5;
            font-size: 0.8rem;
            font-weight: 600;
            padding: 0.45rem 1rem;
            border-radius: 10px;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.25s ease;
        }

        .btn-logout:hover {
            background: rgba(239, 68, 68, 0.28);
            border-color: rgba(239, 68, 68, 0.6);
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(239, 68, 68, 0.3);
        }

        /* ── Responsive ───────────────────────────────────────────── */
        @media (max-width: 576px) {
            .welcome-hero {
                padding: 1.75rem 1.25rem;
            }
            .cal-cell { min-height: 70px; }
            .cal-event { font-size: 0.62rem; }
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <?php //include 'src/Comum/sidebar.php'; ?>

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
                    <div class="d-flex flex-column align-items-center gap-2">
                        <div class="hero-logo">
                            <i class="lni lni-dashboard"></i>
                        </div>
                        <a href="src/pages/logout.php" class="btn-logout" id="btnLogout" title="Sair do sistema">
                            <i class="fa fa-sign-out"></i> Sair
                        </a>
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
            <div class="row g-3 mb-2">
                <div class="col-12 col-sm-6 col-lg-3">
                    <a href="./src/pages/agenda/AGENDA.php" class="quick-card">
                        <div class="quick-icon blue"><i class="fa fa-calendar"></i></div>
                        <div>
                            <p class="quick-name">Agendamento</p>
                            <p class="quick-desc">Agenda e compromissos</p>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <a href="./src/pages/os/OS.php" class="quick-card">
                        <div class="quick-icon green"><i class="fa fa-file-text-o"></i></div>
                        <div>
                            <p class="quick-name">Ordem de Serviço</p>
                            <p class="quick-desc">Serviços abertos</p>
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
                    <a href="./src/pages/config/configurador.php" class="quick-card">
                        <div class="quick-icon orange"><i class="fa fa-cogs"></i></div>
                        <div>
                            <p class="quick-name">Configurador</p>
                            <p class="quick-desc">Configurador do sistema</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row g-3 mb-2">
                <div class="col-12 col-sm-6 col-lg-3">
                    <a href="./src/pages/fin/fin.php" class="quick-card">
                        <div class="quick-icon blue"><i class="fa fa-dollar"></i></div>
                        <div>
                            <p class="quick-name">Fluxo de Caixa</p>
                            <p class="quick-desc">Contas a pagar e receber</p>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <a href="./src/pages/vendas/Vendas.php" class="quick-card">
                        <div class="quick-icon green"><i class="fa fa-check"></i></div>
                        <div>
                            <p class="quick-name">Vendas</p>
                            <p class="quick-desc">Vendas realizadas</p>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <a href="./src/pages/cadcli/CadCliteste.php" class="quick-card">
                        <div class="quick-icon purple"><i class="fa fa-users"></i></div>
                        <div>
                            <p class="quick-name">Clientes</p>
                            <p class="quick-desc">Cadastro e manutenção</p>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <a href="./src/pages/cadusu/CadUsu.php" class="quick-card">
                        <div class="quick-icon orange"><i class="fa fa-user"></i></div>
                        <div>
                            <p class="quick-name">Usuários</p>
                            <p class="quick-desc">Cadastro de usuários</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row g-3 mb-2">
                <div class="col-12 col-sm-6 col-lg-3">
                    <a href="./src/pages/estoque/Estoque.php" class="quick-card">
                        <div class="quick-icon blue"><i class="fa fa-cubes"></i></div>
                        <div>
                            <p class="quick-name">Estoque</p>
                            <p class="quick-desc">Estoque e valores</p>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <a href="./src/pages/cadcom/compras.php" class="quick-card">
                        <div class="quick-icon green"><i class="fa fa-shopping-cart"></i></div>
                        <div>
                            <p class="quick-name">Compras</p>
                            <p class="quick-desc">Compras realizadas</p>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <a href="./src/pages/cadprod/cadProd.php" class="quick-card">
                        <div class="quick-icon purple"><i class="fa fa-cubes"></i></div>
                        <div>
                            <p class="quick-name">Produtos</p>
                            <p class="quick-desc">Cadastro de produtos</p>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <a href="./src/pages/perfil/perfil.php" class="quick-card">
                        <div class="quick-icon orange"><i class="fa fa-user-o"></i></div>
                        <div>
                            <p class="quick-name">Perfil</p>
                            <p class="quick-desc">Perfil de usuário</p>
                        </div>
                    </a>
                </div>
            </div>
            <!-- ══════════════════════════════════════════════════════
                 AGENDA DE ATENDIMENTOS
            ══════════════════════════════════════════════════════ -->
            <div class="agenda-wrapper position-relative mt-4">

                <!-- Loading overlay -->
                <div class="cal-loading" id="calLoading">
                    <div class="spinner-border text-primary" role="status" style="width:2rem;height:2rem;"></div>
                </div>

                <!-- Header -->
                <div class="cal-header">
                    <h2><i class="fa fa-calendar" style="color:#60a5fa;"></i> Agenda de Atendimentos</h2>
                    <div class="cal-nav">
                        <button class="cal-nav-btn" id="btnPrevMonth" title="Mês anterior">
                            <i class="fa fa-chevron-left"></i>
                        </button>
                        <div class="cal-month-label" id="calMonthLabel">—</div>
                        <button class="cal-nav-btn" id="btnNextMonth" title="Próximo mês">
                            <i class="fa fa-chevron-right"></i>
                        </button>
                    </div>
                    <button class="btn-novo-agend" id="btnNovoAgend">
                        <i class="fa fa-plus"></i> Novo Agendamento
                    </button>
                </div>

                <!-- Dias da semana -->
                <div class="cal-weekdays">
                    <div class="cal-weekday">Dom</div>
                    <div class="cal-weekday">Seg</div>
                    <div class="cal-weekday">Ter</div>
                    <div class="cal-weekday">Qua</div>
                    <div class="cal-weekday">Qui</div>
                    <div class="cal-weekday">Sex</div>
                    <div class="cal-weekday">Sáb</div>
                </div>

                <!-- Grade dos dias -->
                <div class="cal-grid" id="calGrid"></div>

                <!-- Mini-lista do mês -->
                <div class="agenda-side">
                    <h3><i class="fa fa-list-ul" style="color:#2563eb; margin-right:6px;"></i> Agendamentos do mês</h3>
                    <div id="agendaList">
                        <p class="text-muted" style="font-size:0.82rem;">Nenhum agendamento encontrado.</p>
                    </div>
                </div>
            </div>

        </div><!-- /.main -->
    </div><!-- /.wrapper -->

    <!-- Toast -->
    <div class="ag-toast" id="agToast"></div>

    <!-- ══════════════════════════════════════════════════════════════
         MODAL — NOVO / EDITAR AGENDAMENTO
    ══════════════════════════════════════════════════════════════ -->
    <div class="modal fade modal-agenda" id="modalAgenda" tabindex="-1" aria-labelledby="modalAgendaLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAgendaLabel">
                        <i class="fa fa-calendar-plus-o" style="margin-right:6px;"></i> Novo Agendamento
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="agId">

                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label" for="agTitulo">Título / Serviço *</label>
                            <input type="text" class="form-control" id="agTitulo" placeholder="Ex: Consulta de rotina">
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="agCliente">Cliente *</label>
                            <input type="text" class="form-control" id="agCliente" placeholder="Nome do cliente">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="agInicio">Data / Hora início *</label>
                            <input type="datetime-local" class="form-control" id="agInicio">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="agFim">Data / Hora fim *</label>
                            <input type="datetime-local" class="form-control" id="agFim">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="agStatus">Status</label>
                            <select class="form-select" id="agStatus">
                                <option value="agendado">Agendado</option>
                                <option value="confirmado">Confirmado</option>
                                <option value="concluido">Concluído</option>
                                <option value="cancelado">Cancelado</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Cor</label>
                            <div class="cor-picker" id="corPicker">
                                <div class="cor-opt selected" data-cor="#2563eb" style="background:#2563eb;" title="Azul"></div>
                                <div class="cor-opt" data-cor="#16a34a" style="background:#16a34a;" title="Verde"></div>
                                <div class="cor-opt" data-cor="#9333ea" style="background:#9333ea;" title="Roxo"></div>
                                <div class="cor-opt" data-cor="#ea580c" style="background:#ea580c;" title="Laranja"></div>
                                <div class="cor-opt" data-cor="#dc2626" style="background:#dc2626;" title="Vermelho"></div>
                                <div class="cor-opt" data-cor="#0891b2" style="background:#0891b2;" title="Ciano"></div>
                                <div class="cor-opt" data-cor="#b45309" style="background:#b45309;" title="Âmbar"></div>
                                <div class="cor-opt" data-cor="#475569" style="background:#475569;" title="Cinza"></div>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="agDescricao">Observações</label>
                            <textarea class="form-control" id="agDescricao" rows="3" placeholder="Detalhes adicionais..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-excluir-ag d-none" id="btnExcluirAg">
                        <i class="fa fa-trash"></i> Excluir
                    </button>
                    <button type="button" class="btn btn-light" style="border-radius:10px;" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn-salvar-ag" id="btnSalvarAg">
                        <i class="fa fa-check"></i> Salvar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="Paginas/Script.js"></script>
    <script>
        // ── Live clock in the hero ─────────────────────────────────────
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