<?php
include 'koneksi.php';

$id = $_GET['id'];

$query = "DELETE FROM produk WHERE id = '$id'";
$result = mysqli_query($conn, $query);

if ($result) {
    header("Location: index.php");
    exit();
} else {
    echo "<script>alert('Gagal menghapus data!'); window.location='index.php';</script>";
}
?>