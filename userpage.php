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
        
        </div>
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





                    

