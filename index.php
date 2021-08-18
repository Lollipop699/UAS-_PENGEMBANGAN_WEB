<?php
  session_start();

if (!isset($_SESSION["login"])){
  header("Location: login.php");
}
  require 'autoload.php';
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Penjualan</title>
  <Link rel ="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>
  <h2>TOKO SINAR PURNAMA</h2>

  <table border="1" cellspacing="0" cellpadding="4">
    <thead>
      <tr>
        <th>Nama Barang</th>
        <th>Harga Barang</th>
        <th>Stok Barang</th>   
      </tr>
    <?php $i =1; ?>
<?php foreach ( $mahasiswa as $row) : ?>
        <tr>
          <td>
         <td><?= $i ?></td>
                <td>
                  <a href="ubah.php?id=<?= $row ["id"]; ?>">EDIT ||</a>
          <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin');">HAPUS</a>
          </td>
          <td><?= $row['namabarang']; ?></td>
          <td><?= $row['hargabarang']; ?></td>
          <td><?= $row['stokbarang']; ?></td>
        </tr>
      <?php $i++; ?>
<?php endforeach; ?>
   </tbody>
  </table>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>