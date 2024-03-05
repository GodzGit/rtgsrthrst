<?php
    session_start(); // Mulai sesi jika belum dimulai
    error_reporting(0);
    include 'db.php';

    // Pastikan admin sudah login sebelum mengakses halaman ini
    if (!isset($_SESSION['admin_id'])) {
        // Redirect ke halaman login jika belum login
        header("Location: login.php");
        exit();
    }

    // Ambil ID admin dari sesi
    $userId = $_SESSION['admin_id'];

    // Lanjutkan dengan query untuk mengambil foto yang disukai oleh admin
    $foto = mysqli_query($conn, "SELECT tb_image.image_id, tb_image.image_name, tb_image.image, tb_image.admin_name, tb_image.date_created
                                  FROM tb_image
                                  INNER JOIN likefoto ON tb_image.image_id = likefoto.image_id
                                  WHERE likefoto.admin_id = '$userId'
                                  ORDER BY tb_image.image_id DESC");

    // Periksa apakah ada baris yang dikembalikan oleh query
    $foto_count = mysqli_num_rows($foto);
?>


<!DOCTYPE html>
<html lang="en">
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
        <ul>
            <li><a href="galeri-dashboard.php">Galeri</a></li>
           <li><a href="data-image.php">data foto</a></li>
           <li><a href="keluar.php">Logout</a></li>
        </ul>
        </div>
    </header>
    
    <!-- new product -->
    <div class="section">
    <div class="container">
       <h3>Galeri Foto Disukai</h3>
       <div class="box">
          <?php
              // Periksa apakah ada foto yang disukai oleh admin
              if($foto_count > 0){
                  while($p = mysqli_fetch_array($foto)){
                    
          ?>
          <a href="detail-image-dashboard.php?id=<?php echo $p['image_id'] ?>">
          <div class="col-4">
              <img src="foto/<?php echo $p['image'] ?>" height="150px" />
              <p class="nama"><?php echo substr($p['image_name'], 0, 30) ?></p>
              <p class="admin">Nama User : <?php echo $p['admin_name'] ?></p>
              <p class="nama"><?php echo $p['date_created']  ?></p>
          </div>
          </a>
          <?php }}else{ ?>
              <p>Foto tidak ada</p>
          <?php } ?>
       </div>
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
