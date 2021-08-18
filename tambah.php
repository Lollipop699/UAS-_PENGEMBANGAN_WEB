<?php
session_start();

if (!isset($_SESSION["login"])){
	header("Location: login.php");
}

require 'autoload.php';
//koneksi Ke DBMS


//alamat	user   password		nama database
$conn = mysqli_connect("localhost", "root","","uas");

//apakah tombol submit sudah di tekan
if( isset($_POST["submit"])){	

//apakah data berhasil ditambahakan	
	if(tambah($_POST) > 0){
		echo "
			<script>
				alert('data berhasil di tambahkan');
				document.location.href = 'index.php';
			</script>
			";
	}else{
		echo "<script>
				alert('data gagal di tambahkan');
				document.location.href = 'index.php';
			</script>
			";
	}

}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>TAMBAH DATA PENJUALAN</title>
<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style2.css">
</head>

<body>
	
	<div class="card mt-3">
        <div class="card-header bg-white">
            <div class="card-body">
            	<h1 class="text-center card-header bg-info text-white">FORM TAMBAH DATA PENJUALAN</h1>
        <form action="" method="POST" enctype="multipart/form-data">
                    	<div class="form-group">
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Masuka Nama Barang" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="pengarang" name="pengarang" placeholder="Masukan Harga Barang" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Masukan Stok Barang" required>
                    </div>
                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-info" name="submit">Submit</button>
                    </div>
                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-info" name="submit">Submit</button>
                    </div>
        </form>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>