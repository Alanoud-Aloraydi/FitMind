<?php
// ============================================================
//  Database connection (shared by every page).
//  Real hosting credentials live in db_config.php, which is
//  git-ignored. Copy db_config.example.php to db_config.php and
//  fill it in for deployment. Locally it falls back to the usual
//  MAMP/XAMPP defaults.
// ============================================================

$dbConfigFile = __DIR__ . '/db_config.php';
$cfg = file_exists($dbConfigFile) ? include $dbConfigFile : [];

$servername = $cfg['host'] ?? (getenv('DB_HOST') ?: 'localhost');
$username   = $cfg['user'] ?? (getenv('DB_USER') ?: 'root');
$password   = $cfg['pass'] ?? (getenv('DB_PASS') ?: 'root');
$dbname     = $cfg['name'] ?? (getenv('DB_NAME') ?: 'quiz');

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
