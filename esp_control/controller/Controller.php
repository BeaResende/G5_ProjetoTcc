<?php
session_start();
require_once __DIR__ . '/../config.php';

// Proteção de login
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit;
}

// Nome do usuário
$nomeUsuario = $_SESSION['usuario_nome'] ?? "Usuário";

// IPs dos dispositivos - CONFIG.PHP

// $esp_ip_andar1 = $esp_ip_andar1 ?? null;
// $esp_ip_andar2 = $esp_ip_andar2 ?? null;
// $esp_ip_portao = $esp_ip_portao ?? null;

// Função simples para status
function getStatus($ip) {
    if (!$ip) return ["Indefinido", "status-off"];
    // $status = @file_get_contents("http://{$ip}/status", false, stream_context_create(['http' => ['timeout' => 2]]));
    // if ($status && strpos($status, 'on') !== false) {
        return ["Ligado", "status-on"];
    }
    return ["Desligado", "status-off"];
// }


if (isset($_GET['action'])) {
    $action = $_GET['action'];
    $ip = null;

    if (strpos($action, 'andar1_') !== false) $ip = $esp_ip_andar1;
    if (strpos($action, 'andar2_') !== false) $ip = $esp_ip_andar2;
    if (strpos($action, 'portao_') !== false) $ip = $esp_ip_portao;

    if ($ip) {
        $cmd = str_replace(["andar1_", "andar2_", "portao_"], '', $action);
        @file_get_contents("http://{$ip}/{$cmd}", false, stream_context_create(['http' => ['timeout' => 2]]));
    }

    header("Location: " . strtok($_SERVER['REQUEST_URI'], '?'));
    exit;
    
}
