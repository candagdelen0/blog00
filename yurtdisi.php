<?php
session_start();
ob_start();
require "functions/connection.php";
include ("partial/_header.php");
include ("partial/_navbar.php");
?>
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <?php include ("partial/_yurtdisicerik.php"); ?>
        </div>
    </div>
</div>

<?php include ("partial/_footer.php"); ?>