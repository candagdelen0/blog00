<?php
require "functions/connection.php";
include "partial/_header.php";
session_start();
session_destroy();
header("Location:index.php");
?>