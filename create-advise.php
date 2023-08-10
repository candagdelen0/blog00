<?php
    session_start();
    require "functions/connection.php";
    require "functions/function.php";
    include "partial/_header.php";
    include "partial/_navbar.php";

    $sistem = new Blog();
    $userid = $_GET["userid"];

    if(isset($_POST["submit"])) {
        $title = $sistem->safety($_POST["title"]);
        $description = $sistem->safety($_POST["description"]);
        $metin = $sistem->safety($_POST["metin"]);
        $picture = $sistem->safety($_POST["picture"]);

        $sql = "INSERT INTO oneri SET userid=?, gorsel=?, baslik=?, aciklama=?, metin=?";
        $query = $sistem->sorgu($sql);
        $query->execute([$userid, $picture, $title, $description, $metin]);
        echo '<div class="alert alert-success">Kayıt Başarıyla Tamamlandı</div>';
        header('refresh:2, url=userpage.php');
    }

?>


<div class="container my-3">
    <div class="row">
        <form action="" method="post">
            <div class="col-md-8 mx-auto">
                <div class="bg-primary mt-3 p-3 fs-3 text-center">Yeni Öneri Yazısı</div>
                <div class="p-4" style="background-color: #F0F8FF;">
                    <div class="mb-3">
                        <label for="title">Başlık</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="description">Tanıtım Yazısı</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="metin">Metin</label>
                        <textarea name="metin" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="picture">Resim Yükleme Alanı</label>
                        <input type="text" name="picture" class="form-control">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Kaydet</button>
                </div>
            </div>
        </form>
    </div>
</div>
