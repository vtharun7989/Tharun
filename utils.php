<?php
if (session_status() === PHP_SESSION_NONE) session_start();
include_once "db.php";

function generate_csrf_token() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function validate_csrf_token($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

function require_login() {
    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit;
    }
}

function require_admin() {
    if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
        die("Access denied. Admins only.");
    }
}
?>