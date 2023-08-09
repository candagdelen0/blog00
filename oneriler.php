<?php
    session_start();
    ob_start();
    require "functions/connection.php";
    require "functions/function.php";
    include ("partial/_header.php");
    include ("partial/_navbar.php");
?>
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto text-center">
            <h3 class="mt-4">SEYAHAT ÖNERİLERİ</h3>
        </div>
    </div>
    <div class="row"><?php
        $sistem = new Blog();
        $sql = "SELECT * FROM oneri";
        foreach ($sistem->genelsorgu($sql) as $oneri):
            ?><div class="col-md-4 mt-2 mb-2">
                <div class="card text-center">
                    <div class="row">
                        <img src="<?php echo  $oneri->gorsel; ?>" class="mx-auto mt-2" style="width: 300px; height: 200px;">
                    </div>
                    <div class="row">
                        <h5 class="card-title text-center mt-1 mb-2"><a href="adviser.php?id=<?php echo  $oneri->id; ?>" style="text-decoration:none;" class="text-dark"><?php echo  $oneri->baslik; ?></a></h5>
                    </div>
                    <div class="row">
                        <p class="card-text ms-2 me-2 mb-3"><?php echo  $oneri->aciklama; ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include ("partial/_footer.php"); ?>