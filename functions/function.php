<?php
require "functions/connection.php";

function safety($data) {
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function getAbout($db) {
    $query = $db->prepare("SELECT * FROM about", PDO::FETCH_ASSOC);
    if ($query != false && !empty($query)) {
        return $query;
    }
}

?>