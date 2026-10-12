<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM produk WHERE id = '$id'");
$row = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
    $nama_barang = $_POST['nama_barang'];
    $harga       = $_POST['harga'];
    $stok        = $_POST['stok'];

    $query = "UPDATE produk SET nama_barang='$nama_barang', harga='$harga', stok='$stok' WHERE id='$id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: index.php");
        exit();
    } else {
        echo "<script>alert('Gagal mengupdate data!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Produk - satamart</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow">
          <div class="card-header bg-dark text-white">
            <h4 class="mb-0">Edit Data Produk</h4>
          </div>
          <div class="card-body">
            <form action="" method="POST">
              <div class="mb-3">
                <label class="form-label">Nama Barang</label>
                <input type="text" class="form-control" name="nama_barang" value="<?php echo htmlspecialchars($row['nama_barang']); ?>" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Harga</label>
                <input type="number" class="form-control" name="harga" value="<?php echo htmlspecialchars($row['harga']); ?>" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Stok</label>
                <input type="number" class="form-control" name="stok" value="<?php echo htmlspecialchars($row['stok']); ?>" required>
              </div>
              <button type="submit" name="update" class="btn btn-success">Update</button>
              <a href="index.php" class="btn btn-secondary">Kembali</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>