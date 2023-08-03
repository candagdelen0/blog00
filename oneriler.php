<?php
session_start();
ob_start();
require "functions/connection.php";
require "functions/function.php";
include ("partial/_header.php");
include ("partial/_navbar.php");
?>
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto text-center">
            <h3 class="mt-4">SEYAHAT ÖNERİLERİ</h3>
        </div>
    </div>
    <div class="row"><?php
        $oneri = getAdvise($db);
        foreach ($oneri as $on) {
            echo '<div class="col-md-4 mt-2 mb-2">
                <div class="card">
                    <div class="row">
                        <img src=" '.$on["gorsel"].' ">
                    </div>
                    <div class="row">
                        <h5 class="card-title text-center mt-1 mb-2"><a href="#" style="text-decoration:none;" class="text-dark">'.$on["baslik"].'</a></h5>
                    </div>
                    <div class="row">
                        <p class="card-text ms-2 me-2 mb-3">'.$on["metin"].'</p>
                    </div>
                </div>
            </div>';
        }
    ?></div>
</div>
