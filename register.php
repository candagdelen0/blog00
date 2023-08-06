<?php
require "functions/connection.php";
require "functions/function.php";
include ("partial/_header.php");
include ("partial/_navbar.php");

$usernameErr = $passwordErr = $repasswordErr = "";
$username = $password = $repassword = "";

if ($_SERVER["REQUEST_METHOD"]=="POST") {
    if(empty($_POST["username"])) {
        $usernameErr = "Kullanıcı adı boş bırakılamaz";
    } else {
        $username = safety($_POST["username"]);
    }

    if(empty($_POST["password"])) {
        $passwordErr = "Parola boş bırakılamaz";
    } else {
        $password = safety($_POST["password"]);
    }

    if(empty($_POST["password"])) {
        $repasswordErr = "Parola tekrarı boş bırakılamaz";
    } else {
        $repassword = safety($_POST["repassword"]);
    }

    $query = $db->prepare("INSERT INTO users SET username = ?, parola = ?");
    $query->execute([$username, $password]);
    //echo 'Kaydetme başarılı';
    header("refresh: 2, url=login.php");
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
<?php include ("partial/_footer.php"); ?>


