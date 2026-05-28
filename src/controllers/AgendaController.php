<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    http_response_code(401);
    echo json_encode(['erro' => 'Não autenticado']);
    exit;
}

require_once __DIR__ . '/../../config/conexao.php';

header('Content-Type: application/json; charset=utf-8');

$acao = $_GET['acao'] ?? $_POST['acao'] ?? '';

switch ($acao) {

    // ── LISTAR agendamentos ────────────────────────────────────────────
    case 'listar':
        $inicio = $_GET['inicio'] ?? date('Y-m-01');
        $fim    = $_GET['fim']    ?? date('Y-m-t');

        $stmt = $pdo->prepare("
            SELECT id, titulo, cliente, descricao,
                   data_inicio, data_fim, cor, status
            FROM agendamentos
            WHERE data_inicio BETWEEN :ini AND :fim
            ORDER BY data_inicio
        ");
        $stmt->execute([':ini' => $inicio . ' 00:00:00', ':fim' => $fim . ' 23:59:59']);
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        break;

    // ── SALVAR (inserir ou atualizar) ──────────────────────────────────
    case 'salvar':
        $id          = intval($_POST['id'] ?? 0);
        $titulo      = trim($_POST['titulo']      ?? '');
        $cliente     = trim($_POST['cliente']     ?? '');
        $descricao   = trim($_POST['descricao']   ?? '');
        $data_inicio = $_POST['data_inicio']      ?? '';
        $data_fim    = $_POST['data_fim']          ?? '';
        $cor         = $_POST['cor']               ?? '#2563eb';
        $status      = $_POST['status']            ?? 'agendado';

        if (!$titulo || !$data_inicio || !$data_fim) {
            echo json_encode(['erro' => 'Campos obrigatórios faltando']);
            exit;
        }

        if ($id > 0) {
            $stmt = $pdo->prepare("
                UPDATE agendamentos
                SET titulo=:t, cliente=:c, descricao=:d,
                    data_inicio=:di, data_fim=:df, cor=:cor, status=:s
                WHERE id=:id
            ");
            $stmt->execute([
                ':t' => $titulo, ':c' => $cliente, ':d' => $descricao,
                ':di' => $data_inicio, ':df' => $data_fim,
                ':cor' => $cor, ':s' => $status, ':id' => $id
            ]);
            echo json_encode(['ok' => true, 'id' => $id]);
        } else {
            $stmt = $pdo->prepare("
                INSERT INTO agendamentos
                    (titulo, cliente, descricao, data_inicio, data_fim, cor, status, usuario_id)
                VALUES
                    (:t, :c, :d, :di, :df, :cor, :s, :uid)
            ");
            $stmt->execute([
                ':t' => $titulo, ':c' => $cliente, ':d' => $descricao,
                ':di' => $data_inicio, ':df' => $data_fim,
                ':cor' => $cor, ':s' => $status,
                ':uid' => $_SESSION['usuario_id']
            ]);
            echo json_encode(['ok' => true, 'id' => $pdo->lastInsertId()]);
        }
        break;

    // ── EXCLUIR ────────────────────────────────────────────────────────
    case 'excluir':
        $id = intval($_POST['id'] ?? 0);
        if ($id > 0) {
            $stmt = $pdo->prepare("DELETE FROM agendamentos WHERE id = :id");
            $stmt->execute([':id' => $id]);
            echo json_encode(['ok' => true]);
        } else {
            echo json_encode(['erro' => 'ID inválido']);
        }
        break;

    default:
        echo json_encode(['erro' => 'Ação desconhecida']);
}
