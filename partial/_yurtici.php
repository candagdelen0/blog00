<?php
require "functions/function.php";

$sistem = new Blog();
$sql = "SELECT * FROM sehirler";
foreach ($sistem->genelsorgu($sql) as $item):
    if ($item->ulkeAdi == "Türkiye"):
        ?><div class="card mb-3 mt-3">
            <div class="row">
                <div class="col-md-4 text-center mt-3 pb-3"><img src="<?php echo $item->sehirResmi; ?>" class="rounded" style="width: 200px; height: 250px;"></div>
                <div class="col-md-8 p-2">
                    <h5 class="card-title pt-2"><a href="pages.php?id=<?php echo $item->id; ?>" style="text-decoration: none;" class="text-dark"><?php echo $item->sehirAdi; ?></a></h5>
                    <p class="card-text me-2"><?php echo $item->sehirAciklama; ?></p>
                </div>
            </div>
        </div>
<?php 
endif;
endforeach; 
?>
