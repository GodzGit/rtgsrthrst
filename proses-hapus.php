<?php

include 'db.php';

if(isset($_GET['idp']) && !empty($_GET['idp'])){
    $image_id = $_GET['idp'];

    // Hapus data terkait dari tabel 'likefoto' terlebih dahulu
    $delete_likes = mysqli_query($conn, "DELETE FROM likefoto WHERE image_id = '$image_id'");
    if(!$delete_likes) {
        echo "Gagal menghapus data terkait dari tabel 'likefoto'.";
        exit;
    }

    // Hapus data foto dari tabel 'tb_image'
    $delete_photo = mysqli_query($conn, "DELETE FROM tb_image WHERE image_id = '$image_id'");
    if($delete_photo) {
        // Ambil nama file foto berdasarkan id
        $foto = mysqli_query($conn, "SELECT image FROM tb_image WHERE image_id = '$image_id'");
        $p = mysqli_fetch_object($foto);
        
        // Path lengkap menuju file foto
        $file_path = './foto/' . $p->image;

        // Cek apakah file foto benar-benar ada
        if (file_exists($file_path)) {
            // Hapus file foto dari sistem file
            if (unlink($file_path)) {
                echo "File foto berhasil dihapus.";
            } else {
                echo "Gagal menghapus file foto.";
            }
        } else {
            echo "File foto tidak ditemukan.";
        }
        
        // Redirect ke halaman data-image setelah proses selesai
        echo '<script>window.location="data-image.php"</script>';
    } else {
        echo "Gagal menghapus data foto dari database.";
    }
} else {
    echo "ID foto tidak valid.";
}
 
?>
