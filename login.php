<?php
session_start();
require "functions/connection.php";
require "functions/function.php";
include "partial/_header.php";
include "partial/_navbar.php";

$sistem = new Blog();

if(isset($_POST["login"])):
    $username = $_POST["username"];
    $password = $_POST["password"];
    if($username == "" || $password == ""):
        echo '<div class="col-md-4 mx-auto mt-2 alert alert-danger">Bilgiler Boş Bırakılamaz</div>';
        header("refresh: 2, url= index.php");
    else:
        $sql = "SELECT * FROM users WHERE username=? AND parola=?";
        $query = $sistem->loginControl($sql);
        $query->execute([$username,$password]);
        
        if ($query->rowCount() != 0):
            $_SESSION['Kullanici'] = $username;
            header("Location: index.php");
        else:
            echo '<div class="col-md-4 mx-auto mt-2 alert alert-danger">Kullanıcı Bulunamadı</div>';
            header("refresh: 2, url= index.php");
        endif;
        
    endif;

        else:
        echo '<div class="container my-3">
            <div class="row">
                <div class="col-md-4 mx-auto">
                    <div class="bg-primary mt-3 p-3 fs-3 text-center">Üye Girişi</div>
                    <div class="p-4" style="background-color: #F0F8FF;">
                        <form action="login.php" method="post">
                            <div class="mb-3">
                                <label for="username">Kullanıcı Adı</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="password">Parola</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary" name="login">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>';
    endif;
?>

