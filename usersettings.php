<?php
    session_start();
    require "functions/connection.php";
    require "functions/function.php";
    include "partial/_header.php";
    include "partial/_navbar.php";

    $sistem = new Blog();
    $username = $_SESSION['Kullanici'];
    $sql = "SELECT * FROM users WHERE username = '$username'";
 
    if (isset($_POST["btnFileUpload"]) && $_POST["btnFileUpload"]=="Güncelle") {
        $id = $_GET["id"];
        $username = $_POST["username"];
        $parola = $_POST["password"];

        if(isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == 0) {
            $uploadOk = true;
            $dest_path = "resimler/";
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
                    $sistem->updateSettings($id, $username, $parola, $fileDestPath);
                    $_SESSION['Kullanici'] = $username;
                echo '<div class="alert alert-success">Bilgiler Güncellendi</div>';
                header('refresh:2, url=userpage.php');
                } 
            }
        }
    }

    foreach ($sistem->genelsorgu($sql) as $item):
        ?><div class="container my-3">
            <div class="row">
                <div class="col-md-4 mx-auto">
                    <div class="bg-primary mt-3 p-3 fs-3 text-center">Üye İşlemleri</div>
                    <div class="p-4" style="background-color: #F0F8FF;">
                        <form method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="username">Kullanıcı Adı</label>
                                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="password">Parola</label>
                                <input type="text" name="password" class="form-control" value="<?php echo $item->parola; ?>" required>
                            </div>
                            <div class="mb-2">
                                <label for="fileToUpload">Resim</label>
                                <input type="file" name="fileToUpload" class="form-control">
                                <input type="submit" class="btn btn-primary mt-3 form-control" value="Güncelle" name="btnFileUpload">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><?php
    endforeach;   

?>
