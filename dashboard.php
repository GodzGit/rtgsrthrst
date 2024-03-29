<?php
session_start();
if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] != true) {
    header("Location: login.php");
    exit();
}
include 'db.php';

$userId = $_SESSION['admin_id'];
$kontak = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '$userId'");
if (mysqli_num_rows($kontak) > 0) {
    $a = mysqli_fetch_object($kontak);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>WEB Galeri Foto</title>
<link rel="stylesheet" type="text/css" href="style.css">

<style>
    body {
        background-image: url(img/bg.jpg);
    }
</style>


</head>

<body>
    <!-- header -->
    <header>
    <div class="container">
        <h1><a href="dashboard.php">WEB GALERI FOTO</a></h1>
        <label for="menu-toggle" class="menu-icon">&#9776;</label>
        <input type="checkbox" id="menu-toggle" class="hidden">
        <ul class="menu">
            <li><a href="saved.php"><img src="img/bookmark-fill.svg" style="width:20px" alt="">Disukai</a></li>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="profil.php">Profil</a></li>
            <li><a href="data-image.php">Data Foto</a></li>
            <li><a href="Keluar.php">Logout</a></li>
        </ul>
        
    </div>
</header>


    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Dashboard</h3>
            <div class="box">
                <h4>Selamat Datang <?php echo $a->admin_name ?> di Website Galeri Foto</h4>
            </div>
        </div>
    </div>

    

    <!-- category -->
    <div class="section">
        <div class="container">
            <h3>Album</h3>
            <div class="box">
                <?php
                $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                if (mysqli_num_rows($kategori) > 0) {
                    while ($k = mysqli_fetch_array($kategori)) {
                ?>
                        <a href="galeri-dashboard.php?kat=<?php echo $k['category_id'] ?>">
                            <div class="col-5">
                                <img src="img/album.png" width="50px" style="margin-bottom:5px;" />
                                <p><?php echo $k['category_name'] ?></p>
                            </div>
                        </a>
                <?php }
                } else { ?>
                    <p>Kategori tidak ada</p>
                <?php } ?>
            </div>
        </div>
    </div>

    <!-- new product -->
    <div class="container">
        <h3>Foto Terbaru</h3>
        <div class="box">
            <?php
            $foto = mysqli_query($conn, "SELECT * FROM tb_image WHERE image_status = 1 ORDER BY image_id DESC LIMIT 8");
            if (mysqli_num_rows($foto) > 0) {
                while ($p = mysqli_fetch_array($foto)) {
            ?>
                    <a href="detail-image-dashboard.php?id=<?php echo $p['image_id'] ?>">
                        <div class="col-4">
                            <img src="foto/<?php echo $p['image'] ?>" height="150px" />
                            <p class="nama"><?php echo substr($p['image_name'], 0, 30)  ?></p>
                            <p class="admin">Nama User : <?php echo $p['admin_name'] ?></p>
                            <p class="nama"><?php echo $p['date_created']  ?></p>
                        </div>
                    </a>
            <?php }
            } else { ?>
                <p>Foto tidak ada</p>
            <?php } ?>
        </div>
    </div>

    <!-- footer -->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2024 - Web Galeri Foto.</small>
        </div>
    </footer>

</body>
</html>
<?php
} else {
    echo "Admin tidak ditemukan.";
}
?>
