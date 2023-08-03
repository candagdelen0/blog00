<?php
session_start();
ob_start();
require "functions/connection.php";
include("partial/_header.php");
include("partial/_navbar.php");
?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <?php include ("partial/_content.php"); ?>  
        </div>
        <div class="col-md-4">
            <?php include ("partial/_about.php"); ?>
        </div>
    </div>
</div>

<?php include("partial/_footer.php"); ?>