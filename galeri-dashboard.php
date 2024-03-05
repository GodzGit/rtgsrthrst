<?php
    error_reporting(0);
    include 'db.php';
    // Ambil id kategori dari parameter URL
    $kategori_id = $_GET['kat'] ?? null;

    // Jika id kategori ada, ambil informasi kategori dari database
    $kategori_info = [];
    if (!empty($kategori_id)) {
        $kategori_query = mysqli_query($conn, "SELECT * FROM tb_category WHERE category_id = '$kategori_id'");
        if ($kategori_query) {
            $kategori_info = mysqli_fetch_assoc($kategori_query);
        }
    }

    // Definisikan variabel $where
    $where = "";

    // Periksa apakah ada input pencarian
    if(isset($_GET['search']) && !empty($_GET['search'])) {
        // Gunakan mysqli_real_escape_string untuk menyaring input
        $search = mysqli_real_escape_string($conn, $_GET['search']);
        $where = "AND image_name LIKE '%$search%'";
    }

    // Query untuk mendapatkan data foto
    $foto = mysqli_query($conn, "SELECT * FROM tb_image WHERE image_status = 1 AND category_id = '$kategori_id' $where ORDER BY image_id DESC");

    // Periksa apakah ada baris yang dikembalikan oleh query
    $foto_count = mysqli_num_rows($foto);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WEB Galeri Foto</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="gallery-style.css"> <!-- CSS Eksternal untuk galeri -->
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
                <li><a href="data-image.php">Data Foto</a></li>
                <li><a href="keluar.php">Logout</a></li>
            </ul>
        </div>
    </header>
    
    <!-- Informasi Kategori -->
    <div class="section">
        <div class="container">
            <?php if (!empty($kategori_info)): ?>
                <h3>Kategori: <?php echo $kategori_info['category_name']; ?></h3>
                <p>Deskripsi: <?php echo $kategori_info['deskripsi']; ?></p>
                <p>Tanggal Dibuat: <?php echo $kategori_info['tanggaldibuat']; ?></p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Galeri Foto -->
    <div class="section sec2">
    <div class="container">
    <h3>Galeri Foto</h3>
    <div class="gallery">
        <?php
        // Periksa apakah ada foto yang ditemukan
        if ($foto_count > 0) {
            while ($p = mysqli_fetch_array($foto)) {
        ?>
                <a href="detail-image-dashboard.php?id=<?php echo $p['image_id'] ?>">
                    <div class="image-container">
                        <img src="foto/<?php echo $p['image'] ?>" alt="<?php echo $p['image_name']; ?>">
                        <div class="overlay">
                            <p><?php echo substr($p['image_name'], 0, 30) ?></p>
                            <p class="admin">Nama User : <?php echo $p['admin_name'] ?></p>
                            <p class="nama"><?php echo $p['date_created']  ?></p>
                        </div>
                    </div>
                </a>
        <?php
            }
        } else {
        ?>
            <p class="no-images">Foto tidak ada</p>
        <?php } ?>
    </div>
</div>

        </div>
    </div>
</body>
</html>
