<?php
    session_start();
    require_once "functions/connection.php"; 
    require_once "functions/function.php"; 
    include "partial/_header.php"; 
    include "partial/_navbar.php"; 

    $sistem = new Blog();
    $id = $sistem->safety($_GET["id"]);
    $sql = "SELECT * FROM oneri WHERE id=$id";

    foreach ($sistem->getAdvise($sql) as $item) {
        echo '<div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto p-2 bg-light mt-3 mb-3">
                    <div class="col-md-12 fs-2 text-center border-bottom"><b>'.$item->baslik.'</b></div>
                    <div class="col-md-12"><img src="'.$item->gorsel.'" class="mt-2 rounded" style="width: 100%; height: 500px;"></div>
                    <div class="col-md-12 text-center p-4">'.$item->metin.'</div>
                </div>
            </div>
        </div>';        
    }
?>

<?php include "partial/_footer.php"; ?>
