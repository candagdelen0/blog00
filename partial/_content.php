<?php
require "functions/connection.php";
require "functions/function.php";

$cities = getCities($db);
foreach ($cities as $city) {
    echo '<div class="card mb-3 mt-3">
    <div class="row">
        <div class="col-md-4 text-center mt-3"><img src=" '.$city["sehirResmi"].' "></div>
        <div class="col-md-8 p-2">
            <h5 class="card-title"><a href="#" style="text-decoration: none;" class="text-dark">'.$city["sehirAdi"].' / <em>'.$city["ulkeAdi"].'</em></a></h5>
            <p class="card-text me-2">'.$city["sehirAciklama"].'</p>
        </div>
    </div>
</div>';
}


