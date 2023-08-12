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
<style>
    .dropbtn {
        background-color: #0B5ED7;
        color: white;
        padding: 12px;
        font-size: 16px;
        border: #0B5ED7;
        cursor: pointer;
        border-radius: 10px;
    }

    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }

    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }

    .dropdown-content a:hover {background-color: #f1f1f1}

    .dropdown:hover .dropdown-content {
      display: block;
    }

    .dropdown:hover .dropbtn {
      background-color: #0DCAF0;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <?php foreach ($sistem->genelsorgu($sql) as $user) {
                echo '<div class="card mt-3 bg-light">
                    <div class="row text-center">
                        <div class="col-md-12 mt-2"><img src="'.$user->resim.'" class="rounded-circle" style="width: 200px; height: 250px;"></div>
                        <div class="col-md-12">
                            <h5 class="card-title mt-2"><a href="usersettings.php?id='.$user->id.'" class="text-secondary"><i class="fa-solid fa-sliders me-3"></i></a>'.$username.'</h5>
                            <div class="card-text dropdown mt-2 mb-3">
                                <button class="dropbtn">Yeni Yazı Ekle</button>
                                <div class="dropdown-content">
                                    <a href="create-text.php?userid='.$user->id.'">Seyahat Yazısı</a>
                                    <a href="create-advise.php?userid='.$user->id.'">Seyahat Önerisi</a>
                                </div>
                            </div> 
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
                        <td><a href="pages.php?id='.$item->id.'" style="text-decoration: none; color: black;">'.$item->sehirAdi.'</a></td>
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





                    

