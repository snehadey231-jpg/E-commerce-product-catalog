<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Database Connection
require_once __DIR__ . '/database.php';

// Generate CSRF Token
function csrf_token() {

    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    return $_SESSION['csrf_token'];
}

// Verify CSRF Token
function verify_csrf_token($token) {

    return isset($_SESSION['csrf_token']) &&
           is_string($token) &&
           hash_equals($_SESSION['csrf_token'], $token);
}

// Escape HTML Output
function e($value) {

    return htmlspecialchars(
        (string)$value,
        ENT_QUOTES,
        'UTF-8'
    );
}

?>