<?php
include 'koneksi.php';

$query = "SELECT * FROM produk";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>satamart - Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body { font-family: Arial, sans-serif; background-color: #f8f9fa; }
    .sidebar { min-height: calc(100vh - 48px); background-color: #f8f9fa; border-right: 1px solid #dee2e6; }
    .sidebar .nav-link { color: #0d6efd; font-weight: 500; padding: 8px 16px; }
    .sidebar .nav-link.active { color: #0d6efd; }
    .sidebar .nav-link i { margin-right: 8px; }
    .navbar-brand { padding-left: 1rem; font-weight: 500; }
  </style>
</head>
<body>

  <!-- Navbar Atas -->
  <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid p-0">
      <a class="navbar-brand text-white" href="#">satamart</a>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar Navigasi -->
      <nav class="col-md-3 col-lg-2 d-md-block sidebar collapse p-0 pt-3">
        <div class="position-sticky">
          <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link active" href="index.php"><i class="bi bi-house-door-fill"></i> Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-file-earmark"></i> Orders</a></li>
            <li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-cart"></i> Products</a></li>
            <li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-people"></i> Customers</a></li>
            <li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-graph-up"></i> Reports</a></li>
            <li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-puzzle"></i> Integrations</a></li>
          </ul>
          <ul class="nav flex-column mt-4">
            <li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-box-arrow-right"></i> Sign out</a></li>
          </ul>
        </div>
      </nav>

      <!-- Area Konten Utama -->
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3 bg-white" style="min-height: calc(100vh - 48px);">
        
        <h1 class="h2 mb-4">Dashboard</h1>
        <h3 class="h4 mb-3">Data Produk</h3>

        <!-- Tombol Add Product -->
        <div class="mb-3">
          <a href="tambah.php" class="btn btn-secondary btn-sm">Add Product</a>
        </div>

        <!-- Tabel Data Produk -->
        <div class="table-responsive">
          <table class="table table-striped table-hover align-middle">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Harga</th>
                <th scope="col">Stok</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no = 1;
              if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
              ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo htmlspecialchars($row['nama_barang']); ?></td>
                <td><?php echo htmlspecialchars($row['harga']); ?></td>
                <td><?php echo htmlspecialchars($row['stok']); ?></td>
                <td>
                  <!-- Tombol Edit dan Hapus dengan ID -->
                  <a href="edit.php?id=<?php echo $row['id']; ?>" class="text-decoration-none me-1">Edit</a> | 
                  <a href="hapus.php?id=<?php echo $row['id']; ?>" class="text-decoration-none ms-1 text-danger" onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</a>
                </td>
              </tr>
              <?php 
                  }
              } else {
              ?>
              <tr>
                <td colspan="5" class="text-center">Belum ada data produk.</td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>

      </main>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>