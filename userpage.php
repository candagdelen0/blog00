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
                <tbody><?php
                    foreach ($sistem->genelsorgu($sql) as $user) {
                        $id = $user->id;
                    }

                    $sql2 = "SELECT * FROM sehirler WHERE userid = $id";
                    $sql3 = "SELECT * FROM oneri WHERE userid = $id";
                    foreach ($sistem->genelsorgu($sql2) as $item) {
                        echo '<tr>
                            <td>'.$item->sehirAdi.'</td>
                            <td class="text-center">
                                <a href="edit-text.php?yazid='.$item->id.'" class="btn btn-warning me-2">Düzenle</a>
                                <a href="delete.php?yazid='.$item->id.'" class="btn btn-danger pe-4 ps-4">Sil</a>
                            </td>
                        </tr>';
                    }
                        
                    foreach ($sistem->genelsorgu($sql3) as $item2) {
                        echo '<tr>
                            <td>'.$item2->baslik.'</td>
                            <td class="text-center">
                                <a href="edit-text.php?onerid='.$item2->id.'" class="btn btn-warning me-2">Düzenle</a>
                                <a href="delete.php?onerid='.$item2->id.'" class="btn btn-danger pe-4 ps-4">Sil</a>
                            </td>
                        </tr>';
                    }
                echo '</tbody>
            </table>
        </div>';         

    ?></div>
</div>





                    

