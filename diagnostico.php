<?php
header("Content-Type: text/plain; charset=utf-8");
echo "PHP " . PHP_VERSION . " (se necesita 7.4 o superior)\n";
foreach (["pdo_mysql", "pdo_sqlite", "fileinfo", "mbstring"] as $e) echo "Extensión $e: " . (extension_loaded($e) ? "OK" : "no activa") . "\n";
try {
    require __DIR__ . "/api/lib.php";
    echo "Modo de datos: " . (is_sqlite() ? "SQLite (archivo local)" : "MySQL") . "\n";
    echo "Conexión: OK. Usuarios registrados: " . db()->query("SELECT COUNT(*) FROM users")->fetchColumn() . "\n";
} catch (Throwable $e) {
    echo "ERROR de base de datos: " . $e->getMessage() . "\n";
    echo "- MySQL: enciéndelo en XAMPP e importa database/schema.sql en phpMyAdmin.\n";
    echo "- Sin MySQL: en api/config.php cambia 'driver' => 'mysql' por 'sqlite' (activa extension=pdo_sqlite en php.ini si hace falta).\n";
}
echo "Carpeta uploads escribible: " . (is_writable(__DIR__ . "/uploads") ? "SÍ" : "NO") . "\n";
echo "Carpeta storage escribible: " . (is_writable(__DIR__ . "/storage") ? "SÍ" : "NO") . "\n";
