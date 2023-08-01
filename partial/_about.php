<?php @$about = getAbout($db); ?>
<div class="card mt-3">
    <div class="row text-center">
        <div class="col-md-12 mt-2"><img src="<?php echo $about["picture"]; ?>" class="rounded-circle"></div>
        <div class="col-md-12">
            <h5 class="card-title mt-2"><?php echo $about["title"]; ?></h5>
            <p class="card-text me-2 ms-2"><?php echo $about["aboutText"]; ?></p>
        </div>
    </div>
</div>