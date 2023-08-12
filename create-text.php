<?php
    session_start();
    require "functions/connection.php";
    require "functions/function.php";
    include "partial/_header.php";
    include "partial/_navbar.php";

    $sistem = new Blog();
    $userid = $_GET["userid"];


    if (isset($_POST["btnFileUpload"]) && $_POST["btnFileUpload"]=="Yükle") {
        $country = $sistem->safety($_POST["country"]);
        $city = $sistem->safety($_POST["city"]);
        $description = $sistem->safety($_POST["description"]);
        $metin = $sistem->safety($_POST["metin"]);
   
        if(isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == 0) {
            $uploadOk = true;
            $dest_path = "resimler/gezi/";
            $filename = $_FILES["fileToUpload"]["name"];
            $dosya_uzantilari = array('jpg','png','jpeg');

            $dosyaAdi = explode(".", $filename); 
            $dosyaAdi_uzantisiz = $dosyaAdi[0];
            $dosyaAdi_uzantisi = $dosyaAdi[1];

            if(!in_array($dosyaAdi_uzantisi, $dosya_uzantilari)) {
                $uploadOk = false;
                echo '<div class="alert alert-danger">dosya uzantısı kabul edilmiyor</div>';
                echo '<div class="alert alert-danger">kabul edilen dosyalar: </div>'.implode(",", $dosya_uzantilari);
                echo "<br>";
            } 

            $yeni_dosyaAdi = md5(time().$dosyaAdi_uzantisiz).'.'.$dosyaAdi_uzantisi;
            $fileSourcePath = $_FILES["fileToUpload"]["tmp_name"];
            $fileDestPath = $dest_path.$yeni_dosyaAdi;

            if($uploadOk) {
                if(move_uploaded_file($fileSourcePath, $fileDestPath)) {
                    $sql = "INSERT INTO sehirler SET userid=?, ulkeAdi=?, sehirAdi=?, sehirResmi=?, sehirAciklama=?, metin=?";
                    $query = $sistem->sorgu($sql);
                    $query->execute([$userid, $country, $city, $fileDestPath, $description, $metin]);
                    echo '<div class="alert alert-success">Kayıt Başarıyla Tamamlandı</div>';
                    header('refresh:2, url=userpage.php');
                } 
            }
        }
    }


?>

<div class="container my-3">
    <div class="row">
        <form method="post" enctype="multipart/form-data">
            <div class="col-md-8 mx-auto">
                <div class="bg-primary mt-3 p-3 fs-3 text-center">Yeni Seyahat Yazısı</div>
                <div class="p-4" style="background-color: #F0F8FF;">
                    <div class="mb-3">
                        <label for="country">Ülke Adı</label>
                        <input type="text" name="country" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="city">Şehir Adı</label>
                        <input type="text" name="city" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="description">Tanıtım Yazısı</label>
                        <textarea name="description" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="metin">Metin</label>
                        <textarea name="metin" class="form-control" required></textarea>
                    </div>
                    <div class="mb-2">
                        <label for="fileToUpload">Resim Yükleme Alanı</label>
                        <input type="file" name="fileToUpload" class="form-control">
                        <input type="submit" class="btn btn-primary mt-3 form-control" value="Yükle" name="btnFileUpload">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

