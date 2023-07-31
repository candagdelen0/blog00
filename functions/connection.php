<?php
try {
    $host = 'localhost';
    $dbname = 'blog';
    $username = 'root';
    $password = '';
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->query("SET @@lc_time_names = 'tr_TR'");
} catch (PDOException $e) {
    die("Veritabanı bağlantısı başarısız: " . $e->getMessage());
}

?>