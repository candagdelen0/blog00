<style>
    #logout {
        border-radius: 8px;
        background-color: #0DCAF0;
        color: black; 
        border: 2px solid #0D6EFD; 
    }
    #logout:hover {
        background-color: #0D6EFD;
        color: white;
    }

</style>

<nav class="navbar navbar-expand-lg bg-info">
    <div class="container">
        <a href="index.php" class="navbar-brand"><b>Seyahatname</b></a>
        <ul class="navbar-nav me-auto">
            <li class="nav-item"><a href="yurtici.php" class="nav-link">Türkiye</a></li>
            <li class="nav-item"><a href="yurtdisi.php" class="nav-link">Yurtdışı</a></li> 
            <li class="nav-item"><a href="oneriler.php" class="nav-link">Seyahat Önerileri</a></li> 
        </ul>
        <ul class="navbar-nav me-2">
            <?php if (isset($_SESSION['Kullanici'])): ?>
                <li class="nav-item"><a href="userpage.php" class="nav-link border border-primary rounded bg-primary text-white ms-2 me-2"><?php echo $_SESSION['Kullanici']; ?></a></li>
                <li class="nav-item"><a href="logout.php" class="nav-link ms-2 me-2" id="logout">Logout</a></li>
            <?php else: ?>
                <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
                <li class="nav-item"><a href="register.php" class="nav-link">Register</a></li>
                <form action="index.php" class="d-flex" method="get">
                    <input type="text" name="ara" class="form-control me-2" placeholder="Arama">
                    <button type="submit" class="btn btn-warning">Ara</button>
                </form>
            <?php endif; ?>
        </ul>
    </div>
</nav>
