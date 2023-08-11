<?php
    session_start();
    require "functions/connection.php";
    require "functions/function.php";
    include "partial/_header.php";
    include "partial/_navbar.php";

    @$yaziId = $_GET["yazid"];
    @$oneriId = $_GET["onerid"];
    $sistem = new Blog();
    $sql = "SELECT * FROM sehirler WHERE id=$yaziId";
    $sql2 = "SELECT * FROM oneri WHERE id=$oneriId";

    if ($oneriId == "") {
       include "partial/_edit-city.php";
    } elseif ($yaziId == "") {
        include "partial/_edit-advise.php";
    }

   
?>