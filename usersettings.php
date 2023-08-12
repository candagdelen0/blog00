<?php
    session_start();
    require "functions/connection.php";
    require "functions/function.php";
    include "partial/_header.php";
    include "partial/_navbar.php";

    $sistem = new Blog();
    $username = $_SESSION['Kullanici'];
    $sql = "SELECT * FROM users WHERE username = '$username'";
 
    if (isset($_POST["submit"])):
        $id = $_GET["id"];
        $username = $_POST["username"];
        $parola = $_POST["password"];
        $resim = $_POST["picture"];

        if ($sistem->updateSettings($id, $username, $parola, $resim)):
            $_SESSION['Kullanici'] = $username;
            echo '<div class="alert alert-success">Bilgiler Güncellendi</div>';
            header('refresh:2, url=userpage.php');
        endif;

    endif; 

        foreach ($sistem->genelsorgu($sql) as $item):
            ?><div class="container my-3">
                <div class="row">
                    <div class="col-md-4 mx-auto">
                        <div class="bg-primary mt-3 p-3 fs-3 text-center">Üye İşlemleri</div>
                        <div class="p-4" style="background-color: #F0F8FF;">
                            <form method="post">
                                <div class="mb-3">
                                    <label for="username">Kullanıcı Adı</label>
                                    <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password">Parola</label>
                                    <input type="text" name="password" class="form-control" value="<?php echo $item->parola; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="picture">Resim</label>
                                    <input type="text" name="picture" class="form-control" value="<?php echo $item->resim; ?>">
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary" name="submit">Güncelle</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><?php
        endforeach;

        


        


    

?>
