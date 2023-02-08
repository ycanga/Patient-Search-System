<?php // veri tabanı bağlantısı

error_reporting(0);

$dsn = "mysql:host=localhost;dbname=k4lphasof_help;charset=utf8mb4";
$user = "k4lphasof_help";
$passwd = "12345";

try {
    $db = new PDO($dsn, $user, $passwd);
    $db-> setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Bağlantı hatası: " . $e->getMessage();
}
?>