<?php
session_start();
include 'db.php';

// Periksa apakah admin sudah login
if (!isset($_SESSION['admin_id'])) {
    // Redirect ke halaman login jika belum login
    header("Location: login.php");
    exit();
}

$adminId = $_SESSION['admin_id'];

// Periksa apakah ID komentar telah diberikan
if (isset($_GET['id'])) {
    $commentId = $_GET['id'];
    
    // Hapus komentar dengan ID yang diberikan
    $result = mysqli_query($conn, "DELETE FROM komentarfoto WHERE comment_id = '$commentId' AND admin_id = '$adminId'");
    
    if ($result) {
        // Redirect kembali ke halaman detail foto setelah berhasil menghapus komentar
        header("Location: detail-image-dashboard.php?id=" . $_GET['image_id']);
        exit();
    } else {
        echo "Gagal menghapus komentar.";
    }
} else {
    echo "ID komentar tidak diberikan.";
}
?>
