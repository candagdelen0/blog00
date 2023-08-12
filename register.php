<?php
require "functions/connection.php";
require "functions/function.php";
include ("partial/_header.php");
include ("partial/_navbar.php");

$sistem = new Blog();
$usernameErr = $passwordErr = $repasswordErr = "";
$username = $password = $repassword = "";

if ($_SERVER["REQUEST_METHOD"]=="POST") {
    if(empty($_POST["username"])) {
        $usernameErr = "Kullanıcı adı boş bırakılamaz";
    } else {
        $username = $sistem->safety($_POST["username"]);
    }

    if(empty($_POST["password"])) {
        $passwordErr = "Parola boş bırakılamaz";
    } else {
        $password = $sistem->safety($_POST["password"]);
    }

    if(empty($_POST["repassword"])) {
        $repasswordErr = "Parola tekrarı boş bırakılamaz";
    } else {
        $repassword = $sistem->safety($_POST["repassword"]);
    }

    if(isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == 0) {
        $uploadOk = true;
        $dest_path = "resimler/user/";
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
                if($username != "" && $password != "" && $repassword != "") {
                    $sql = "INSERT INTO users SET username = ?, parola = ?, resim = ?";
                    $query = $sistem->sorgu($sql);
                    $query->execute([$username, $password, $fileDestPath]);
                    echo '<div class="col-md-4 mx-auto mt-2 alert alert-success">Kayıt Başarılı</div>';
                    header("refresh: 2, url=login.php");
                }
            } 
        }
    }
    
}

?>
<div class="container my-3">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="bg-primary mt-3 p-3 fs-3 text-center">Üyelik İşlemleri</div>
            <div class="p-4" style="background-color: #F0F8FF;">
                <form action="register.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="username">Kullanıcı Adı</label>
                        <input type="text" name="username" class="form-control">
                        <div class="text-danger"><?php echo $usernameErr; ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="password">Parola</label>
                        <input type="password" name="password" class="form-control">
                        <div class="text-danger"><?php echo $passwordErr; ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="repassword">Parola Tekrar</label>
                        <input type="password" name="repassword" class="form-control">
                        <div class="text-danger"><?php echo $repasswordErr; ?></div>
                    </div>
                    <div class="mb-2">
                        <label for="fileToUpload">Resim Yükleme Alanı</label>
                        <input type="file" name="fileToUpload" class="form-control">
                        <input type="submit" class="btn btn-primary mt-3 form-control" value="Yükle" name="btnFileUpload">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
