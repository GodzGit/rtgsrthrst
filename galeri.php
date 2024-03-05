<?php
    error_reporting(0);
    include 'db.php';
	$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 2");
	$a = mysqli_fetch_object($kontak);

    // Definisikan variabel $where
    $where = "";

    // Periksa apakah ada input pencarian atau kategori
    if($_GET['search'] != '' || $_GET['kat'] != ''){
        // Gunakan mysqli_real_escape_string untuk menyaring input
        $search = mysqli_real_escape_string($conn, $_GET['search']);
        $kat = mysqli_real_escape_string($conn, $_GET['kat']);
        $where = "AND image_name LIKE '%$search%' AND category_id LIKE '%$kat%' ";
    }

    // Query untuk mendapatkan data foto
    $foto = mysqli_query($conn, "SELECT * FROM tb_image WHERE image_status = 1 $where ORDER BY image_id DESC");

    // Periksa apakah ada baris yang dikembalikan oleh query
    $foto_count = mysqli_num_rows($foto);
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
        <h1><a href="index.php">WEB GALERI FOTO</a></h1>
        <ul>
            <li><a href="galeri.php">Galeri</a></li>
           <li><a href="registrasi.php">Registrasi</a></li>
           <li><a href="login.php">Login</a></li>
        </ul>
        </div>
    </header>
    
    <!-- search -->
    <div class="search">
        <div class="container">
            <form action="galeri.php">
                <input type="text" name="search" placeholder="Cari Foto" value="<?php echo $_GET['search'] ?>" />
                <input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>" />
                <input type="submit" name="cari" value="Cari Foto" />
            </form>
        </div>
    </div>

    <!-- new product -->
    <div class="section">
    <div class="container">
       <h3>Galeri Foto</h3>
       <div class="box">
          <?php
              // Periksa apakah ada foto yang ditemukan
              if($foto_count > 0){
                  while($p = mysqli_fetch_array($foto)){
          ?>
          <a href="detail-image.php?id=<?php echo $p['image_id'] ?>">
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
