<?php
    session_start();
    require "functions/connection.php";
    require "functions/function.php";
    include "partial/_header.php";
    include "partial/_navbar.php";

    $sistem = new Blog();
    $username = $_SESSION['Kullanici'];
    $sql = "SELECT * FROM users WHERE username='$username'";
    
?>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <?php foreach ($sistem->genelsorgu($sql) as $user) {
                echo '<div class="card mt-3 bg-light">
                    <div class="row text-center">
                        <div class="col-md-12 mt-2"><img src="'.$user->resim.'" class="rounded-circle" style="width: 200px; height: 250px;"></div>
                        <div class="col-md-12">
                            <h5 class="card-title mt-2">'.$username.'</h5>
                            <p class="card-text me-2 ms-2">
                                <a href="create-text.php?userid='.$user->id.'" style="text-decoration: none;" class="btn btn-primary text-white mb-4 mt-2 me-2">Yeni Yazı Ekle</a>
                            </p>
                        </div>
                    </div>
                </div>';
            }
        ?></div>
        <div class="col-md-8">
            <table class="table table-bordered table-striped mt-3">
                <thead>
                    <tr>
                        <th>Seyahat ve Öneri Yazılarım</th>
                        <th>İşlemlerim</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>        

    </div>
</div>





                    

