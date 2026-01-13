<?php
/**
 * Security Configuration
 * Headers e funções de segurança para o portfólio
 */

// Prevenir acesso direto
if (!defined('PORTFOLIO_ROOT')) {
    define('PORTFOLIO_ROOT', true);
}

// ============================================
// HEADERS DE SEGURANÇA
// ============================================

// Previne Clickjacking
header("X-Frame-Options: DENY");

// Previne MIME-type sniffing
header("X-Content-Type-Options: nosniff");

// Ativa proteção XSS do navegador
header("X-XSS-Protection: 1; mode=block");

// Referrer Policy
header("Referrer-Policy: strict-origin-when-cross-origin");

// Content Security Policy
header("Content-Security-Policy: default-src 'self'; script-src 'self' 'unsafe-inline'; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com; font-src 'self' https://fonts.gstatic.com; img-src 'self' data: https:; frame-ancestors 'none';");

// Permissions Policy
header("Permissions-Policy: geolocation=(), microphone=(), camera=()");

// ============================================
// FUNÇÕES DE SEGURANÇA
// ============================================

/**
 * Sanitiza string para output HTML
 * @param string $string
 * @return string
 */
function sanitize_output($string) {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

/**
 * Sanitiza input do usuário
 * @param string $input
 * @return string
 */
function sanitize_input($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    return $input;
}

/**
 * Valida email
 * @param string $email
 * @return bool
 */
function validate_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

/**
 * Gera token CSRF
 * @return string
 */
function generate_csrf_token() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/**
 * Valida token CSRF
 * @param string $token
 * @return bool
 */
function validate_csrf_token($token) {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

/**
 * Retorna input hidden com CSRF token
 * @return string
 */
function csrf_input() {
    return '<input type="hidden" name="csrf_token" value="' . generate_csrf_token() . '">';
}

/**
 * Limita taxa de requisições (rate limiting básico)
 * @param string $key Identificador único
 * @param int $max_requests Máximo de requisições
 * @param int $time_window Janela de tempo em segundos
 * @return bool
 */
function rate_limit($key, $max_requests = 10, $time_window = 60) {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    $current_time = time();
    $rate_key = 'rate_limit_' . $key;
    
    if (!isset($_SESSION[$rate_key])) {
        $_SESSION[$rate_key] = ['count' => 1, 'start' => $current_time];
        return true;
    }
    
    if ($current_time - $_SESSION[$rate_key]['start'] > $time_window) {
        $_SESSION[$rate_key] = ['count' => 1, 'start' => $current_time];
        return true;
    }
    
    if ($_SESSION[$rate_key]['count'] >= $max_requests) {
        return false;
    }
    
    $_SESSION[$rate_key]['count']++;
    return true;
}

/**
 * Inicia sessão de forma segura
 */
function start_secure_session() {
    if (session_status() === PHP_SESSION_NONE) {
        // Configurações seguras de sessão
        ini_set('session.cookie_httponly', 1);
        ini_set('session.cookie_secure', isset($_SERVER['HTTPS']));
        ini_set('session.use_strict_mode', 1);
        ini_set('session.cookie_samesite', 'Strict');
        
        session_start();
        
        // Regenera ID da sessão periodicamente
        if (!isset($_SESSION['created'])) {
            $_SESSION['created'] = time();
        } elseif (time() - $_SESSION['created'] > 1800) {
            session_regenerate_id(true);
            $_SESSION['created'] = time();
        }
    }
}

/**
 * Aplica headers de segurança (já aplicados no topo, mas pode ser chamado novamente)
 */
function apply_security_headers() {
    // Headers já foram aplicados no início do arquivo
    // Esta função existe para compatibilidade
    return true;
}
?>
