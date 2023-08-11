<?php
if (isset($_POST["submit"])) {
    $baslik = $_POST["title"];
    $aciklama = $_POST["description"];
    $metin = $_POST["metin"];
    $gorsel = $_POST["picture"];

    if($sistem->editAdvise($oneriId, $gorsel, $baslik, $aciklama, $metin)) {
        echo '<div class="alert alert-success">Bilgiler Güncellendi</div>';
        header('refresh:2, url=userpage.php');
    }
} 

foreach ($sistem->genelsorgu($sql2) as $item):
    ?><div class="container my-3">
        <div class="row">
            <form method="post">
                <div class="col-md-10 mx-auto">
                    <div class="bg-primary mt-3 p-3 fs-3 text-center">Öneri Yazısı Düzenleme</div>
                    <div class="p-4" style="background-color: #F0F8FF;">
                        <div class="mb-3">
                            <label for="title">Başlık</label>
                            <input type="text" name="title" class="form-control" value="<?php echo $item->baslik; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="description">Tanıtım Yazısı</label>
                            <textarea name="description" class="form-control" required><?php echo $item->aciklama; ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="metin">Metin</label>
                            <textarea name="metin" class="form-control" required><?php echo $item->metin; ?></textarea>
                        </div>
                        <div class="mb-2">
                            <label for="picture">Resim Yükleme Alanı</label>
                            <input type="text" name="picture" class="form-control" value="<?php echo $item->gorsel; ?>">
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