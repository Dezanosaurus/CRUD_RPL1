<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $nama_barang = $_POST['nama_barang'];
    $harga       = $_POST['harga'];
    $stok        = $_POST['stok'];

    $query = "INSERT INTO produk (nama_barang, harga, stok) VALUES ('$nama_barang', '$harga', '$stok')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: index.php");
        exit();
    } else {
        echo "<script>alert('Gagal menambah data!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Produk - satamart</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow">
          <div class="card-header bg-dark text-white">
            <h4 class="mb-0">Tambah Data Produk</h4>
          </div>
          <div class="card-body">
            <form action="" method="POST">
              <div class="mb-3">
                <label class="form-label">Nama Barang</label>
                <input type="text" class="form-control" name="nama_barang" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Harga</label>
                <input type="number" class="form-control" name="harga" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Stok</label>
                <input type="number" class="form-control" name="stok" required>
              </div>
              <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
              <a href="index.php" class="btn btn-secondary">Kembali</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>