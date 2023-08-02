<?php
require "functions/connection.php";
require "functions/function.php";

$yurtici = getSpecialCities($db);
foreach ($yurtici as $tr) {
    if ($tr["ulkeAdi"] == "Türkiye") {
        echo '<div class="card mb-3 mt-3">
            <div class="row">
                <div class="col-md-4 text-center mt-3"><img src=" '.$tr["sehirResmi"].' " class="rounded"></div>
                <div class="col-md-8 p-2">
                    <h5 class="card-title"><a href="#" style="text-decoration: none;" class="text-dark">'.$tr["sehirAdi"].'</a></h5>
                    <p class="card-text me-2">'.$tr["sehirAciklama"].'</p>
                </div>
            </div>
        </div>';
    }
}
?>