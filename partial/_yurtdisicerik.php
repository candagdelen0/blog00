<?php
require "functions/function.php";

$sistem = new Blog();
$sql = "SELECT * FROM sehirler";
foreach ($sistem->getCities($sql) as $item):
    if ($item->ulkeAdi != "Türkiye"):
        ?><div class="card mb-3 mt-3">
            <div class="row">
                <div class="col-md-4 text-center mt-3"><img src="<?php echo $item->sehirResmi; ?>" class="rounded"></div>
                <div class="col-md-8 p-2">
                    <h5 class="card-title"><a href="#" style="text-decoration: none;" class="text-dark"><?php echo $item->sehirAdi; ?> / <em><?php echo $item->ulkeAdi; ?></em></a></h5>
                    <p class="card-text me-2"><?php echo $item->sehirAciklama; ?></p>
                </div>
            </div>
        </div>
<?php 
endif;
endforeach; 
?>
