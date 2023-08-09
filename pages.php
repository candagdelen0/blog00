<?php
    session_start();
    require_once "functions/connection.php"; 
    require_once "functions/function.php"; 
    include "partial/_header.php"; 
    include "partial/_navbar.php"; 

    $sistem = new Blog();
    $id = $sistem->safety($_GET["id"]);
    $sql = "SELECT * FROM sehirler WHERE id=$id";

    foreach ($sistem->genelsorgu($sql) as $item) {
        echo '<div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto p-2 bg-light mt-3 mb-3">
                    <div class="row">
                        <div class="col-md-4">
                            <img src=" '.$item->sehirResmi.'" class="mt-5 ms-2" style="width: 320px; height: 420px;">
                        </div>
                        <div class="col-md-8 text-center">
                            <div class="col-md-6 fs-2">
                                <b>'.$item->sehirAdi.'</b> - '.$item->ulkeAdi.'
                            </div>
                            <div class="col-md-12">
                                '.$item->metin.'
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
    }
    

?>

<?php include "partial/_footer.php"; ?>


