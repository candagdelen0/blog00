<?php 
    require_once "functions/connection.php"; 
    require_once "functions/function.php"; 
    
    $about = new Blog();
    foreach ($about->getAbout() as $item):
        ?><div class="card mt-3">
        <div class="row text-center">
            <div class="col-md-12 mt-2"><img src="<?php echo $item->picture; ?>" class="rounded-circle"></div>
            <div class="col-md-12">
                <h5 class="card-title mt-2"><?php echo $item->title; ?></h5>
                <p class="card-text me-2 ms-2"><?php echo $item->aboutText; ?></p>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
