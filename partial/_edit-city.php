<?php
 if (isset($_POST["submit"])) {
    $ulkeAdi = $_POST["country"];
    $sehirAdi = $_POST["city"];
    $sehirAciklama = $_POST["description"];
    $metin = $_POST["metin"];
    $sehirResmi = $_POST["picture"];

    if($sistem->editText($yaziId, $ulkeAdi, $sehirAdi, $sehirResmi, $sehirAciklama, $metin)) {
        echo '<div class="alert alert-success">Bilgiler Güncellendi</div>';
        header('refresh:2, url=userpage.php');
    }
} 

foreach ($sistem->genelsorgu($sql) as $item):
    ?><div class="container my-3">
        <div class="row">
            <form method="post">
                <div class="col-md-10 mx-auto">
                    <div class="bg-primary mt-3 p-3 fs-3 text-center">Seyahat Yazısı Düzenleme</div>
                    <div class="p-4" style="background-color: #F0F8FF;">
                        <div class="mb-3">
                            <label for="country">Ülke Adı</label>
                            <input type="text" name="country" class="form-control" value="<?php echo $item->ulkeAdi; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="city">Şehir Adı</label>
                            <input type="text" name="city" class="form-control" value="<?php echo $item->sehirAdi; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="description">Tanıtım Yazısı</label>
                            <textarea name="description" class="form-control" required><?php echo $item->sehirAciklama; ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="metin">Metin</label>
                            <textarea name="metin" class="form-control" required><?php echo $item->metin; ?></textarea>
                        </div>
                        <div class="mb-2">
                            <label for="picture">Resim Yükleme Alanı</label>
                            <input type="text" name="picture" class="form-control" value="<?php echo $item->sehirResmi; ?>">
                        </div>
                        <div class="mb-5">
                            <button type="submit" name="submit" class="btn btn-primary float-end" style="width: 20%;">Kaydet</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php endforeach; 