<?php // veri tabanı bağlantısı

error_reporting(0);

$dsn = "mysql:host=localhost;dbname=hasta-list;charset=utf8mb4";
$user = "root";
$passwd = "";

try {
    $db = new PDO($dsn, $user, $passwd);
    $db-> setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Bağlantı hatası: " . $e->getMessage();
}
?>