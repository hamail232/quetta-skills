<?php
declare(strict_types=1);

session_start();

const DB_HOST = '';
const DB_NAME = '';
const DB_USER = '';
const DB_PASS = '';
const UPLOAD_DIR = __DIR__ . '/../uploads/';
const UPLOAD_URL = 'uploads/';

function db(): PDO {
    static $pdo = null;
    if ($pdo instanceof PDO) return $pdo;
    $host = getenv('DB_HOST') ?: DB_HOST;
    $name = getenv('DB_NAME') ?: DB_NAME;
    $user = getenv('DB_USER') ?: DB_USER;
    $pass = getenv('DB_PASS') ?: DB_PASS;
    $pdo = new PDO(
        'mysql:host=' . $host . ';dbname=' . $name . ';charset=utf8mb4',
        $user, $pass,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
    );
    return $pdo;
}

function e(?string $value): string { return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8'); }
function redirect(string $url): never { header('Location: ' . $url); exit; }
function is_admin(): bool { return isset($_SESSION['admin_id']); }
function require_admin(): void { if (!is_admin()) redirect('login.php'); }
function csrf_token(): string { if (empty($_SESSION['csrf'])) $_SESSION['csrf'] = bin2hex(random_bytes(32)); return $_SESSION['csrf']; }
function verify_csrf(): void { if (!hash_equals($_SESSION['csrf'] ?? '', $_POST['csrf'] ?? '')) die('Invalid security token. Please go back and try again.'); }
function flash(?string $message = null, string $type = 'success'): ?array {
    if ($message !== null) { $_SESSION['flash'] = ['message' => $message, 'type' => $type]; return null; }
    $value = $_SESSION['flash'] ?? null; unset($_SESSION['flash']); return $value;
}
function upload_image(string $field, ?string $existing = null): ?string {
    if (empty($_FILES[$field]['name'])) return $existing;
    $file = $_FILES[$field];
    if ($file['error'] !== UPLOAD_ERR_OK || $file['size'] > 3 * 1024 * 1024) return $existing;
    $allowed = ['image/jpeg' => 'jpg', 'image/png' => 'png', 'image/webp' => 'webp'];
    $mime = (new finfo(FILEINFO_MIME_TYPE))->file($file['tmp_name']);
    if (!isset($allowed[$mime])) return $existing;
    if (!is_dir(UPLOAD_DIR)) mkdir(UPLOAD_DIR, 0755, true);
    $name = bin2hex(random_bytes(12)) . '.' . $allowed[$mime];
    move_uploaded_file($file['tmp_name'], UPLOAD_DIR . $name);
    return $name;
}
function image_url(?string $image, string $fallback = 'assets/img-placeholder.svg'): string {
    return $image ? UPLOAD_URL . e($image) : $fallback;
}