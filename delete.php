<?php
    require "functions/connection.php";
    require "functions/function.php";

    $sistem = new Blog();
    @$yaziId = $_GET["yazid"];
    @$oneriId = $_GET["onerid"];
    $table = "oneri";
    $table2 = "sehirler";
    if (isset($yaziId)) {
        $sistem->deleteText($yaziId, $table2);
        header("Location: userpage.php");
    } 

    if (isset($oneriId)) {
        $sistem->deleteText($oneriId, $table);
        header("Location: userpage.php");
    } 
        

