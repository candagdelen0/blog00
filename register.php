<?php
require "functions/connection.php";
require "functions/function.php";
include ("partial/_header.php");
include ("partial/_navbar.php");

$sistem = new Blog();
$usernameErr = $passwordErr = $repasswordErr = "";
$username = $password = $repassword = "";

if ($_SERVER["REQUEST_METHOD"]=="POST") {
    if(empty($_POST["username"])) {
        $usernameErr = "Kullanıcı adı boş bırakılamaz";
    } else {
        $username = $sistem->safety($_POST["username"]);
    }

    if(empty($_POST["password"])) {
        $passwordErr = "Parola boş bırakılamaz";
    } else {
        $password = $sistem->safety($_POST["password"]);
    }

    if(empty($_POST["password"])) {
        $repasswordErr = "Parola tekrarı boş bırakılamaz";
    } else {
        $repassword = $sistem->safety($_POST["repassword"]);
    }

    if ($username != "" && $password != "" && $repassword != "") {
        $sql = "INSERT INTO users SET username = ?, parola = ?";
        $query = $sistem->SignUp($sql);
        $query->execute([$username, $password]);
        echo '<div class="col-md-4 mx-auto mt-2 alert alert-success">Kayıt Başarılı</div>';
        header("refresh: 2, url=login.php");
    } 
}

?>
<div class="container my-3">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="bg-primary mt-3 p-3 fs-3 text-center">Üyelik İşlemleri</div>
            <div class="p-4" style="background-color: #F0F8FF;">
                <form action="register.php" method="post">
                    <div class="mb-3">
                        <label for="username">Kullanıcı Adı</label>
                        <input type="text" name="username" class="form-control">
                        <div class="text-danger"><?php echo $usernameErr; ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="password">Parola</label>
                        <input type="password" name="password" class="form-control">
                        <div class="text-danger"><?php echo $passwordErr; ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="repassword">Parola Tekrar</label>
                        <input type="password" name="repassword" class="form-control">
                        <div class="text-danger"><?php echo $repasswordErr; ?></div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="register">Üye Ol</button>
                </form>
            </div>
        </div>
    </div>
</div>
