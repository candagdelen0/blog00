<?php 
    require_once "functions/connection.php"; 
    require_once "functions/function.php"; 
    
    $reklam = new Blog();
    $sql = "SELECT * FROM reklam";
    foreach ($reklam->genelsorgu($sql) as $item):
        ?><div class="card mt-3">
        <div class="row text-center">
            <div class="col-md-12 mt-2"><img src="<?php echo $item->picture; ?>" class="rounded" style="width: 200px; height: 250px;"></div>
            <div class="col-md-12">
                <h5 class="card-title mt-2"><?php echo $item->title; ?></h5>
                <p class="card-text me-2 ms-2"><?php echo $item->aciklama; ?></p>
            </div>
        </div>
    </div>
    <?php endforeach; ?>