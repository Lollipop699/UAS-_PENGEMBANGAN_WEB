<?php
// Konek Ke database
$conn = mysqli_connect("localhost","root","","uasweb");

function query($query){
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows =[];
  while ($row = mysqli_fetch_assoc($result)){
    $rows[] = $row;
  }
  return $rows;
}

function tambah ($data){
  global $conn;
  //ambil data dari tiap form
  $namabarang   = htmlspecialchars( $data["namabarang"]);
  $hargabarang   = htmlspecialchars( $data["hargabarang"]);
  $stokbarang = htmlspecialchars( $data["stokbarang"]);

  //query insert data
  $query ="INSERT INTO kel4 
        VALUE 
      ('','$namabarang','$hargabarang', '$stokbarang')
      ";
  mysqli_query($conn, $query);
  
  return mysqli_affected_rows($conn);
  
}


function ubah ($data){
  global $conn;
  //ambil data dari tiap form
  $id    = htmlspecialchars($data["id"]);
  $namabarang   = htmlspecialchars( $data["namabarang"]);
  $hargabarang   = htmlspecialchars( $data["hargabarang"]);
  $stokbarang = htmlspecialchars( $data["stokbarang"]);

}
  //query insert data
  $query ="UPDATE kel4 SET
        namabarang   = '$namabarang',
        hargabarang  = '$hargabarang',
        stokbarang  = '$stokbarang',
      WHERE id  = '$id
      ";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);

function hapus($id){
  global $conn;
  mysqli_query($conn,"DELETE FROM kel4 WHERE id= $id");

  return mysqli_affected_rows($conn);
}

function cari ($keyword){
  $query = "SELECT * FROM buku 
        WHERE
        namabarang   LIKE '%$keyword%' OR
        hargabarang  LIKE '%$keyword%' OR
        stokbarang   LIKE '%$keyword%' OR
      ";
  return query ($query);
}


function registrasi($data){
  global $conn;
  $username  = strtolower(stripslashes($data["username"]));
  $password    = mysqli_real_escape_string($conn,$data["password"]);
  $password2   = mysqli_real_escape_string($conn,$data["password2"]);

  //cek username udah ada atau belum
  $result = mysqli_query($conn,"SELECT username FROM user WHERE
            username ='$username'");
  if (mysqli_fetch_assoc($result)){
    echo "<script>
        alert('username sudah terdaftar')
        </script>
      ";
    return false;
  }

  //cek konfirmasi password
  if($password !== $password2){
    echo "<script>
      alert('konfirmasi password tidak sesuai');
      </script>";
    return false;

  }

  //encripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);



  //tambahkan user baru ke database
  mysqli_query($conn, "INSERT INTO user VALUE('','$username','$password')");

  return mysqli_affected_rows($conn);
}
?>