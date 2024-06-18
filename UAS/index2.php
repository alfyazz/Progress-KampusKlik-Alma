<?php
include "koneksi.php";
if (isset($_POST['nama']) && isset($_POST['npm'])) {
$nama_mhs = $_POST['nama'];
$npm = $_POST['npm'];

$cekNPM = "SELECT * FROM mhs WHERE npm = '$npm'";
$data = mysqli_query($koneksi, $cekNPM);
}
if (mysqli_query($koneksi, $cekNPM) > 13) {
    echo "<script>
            alert('digit npm lebih dari 13.');
            window.location.href = 'index.php';
          </script>";
}else if(mysqli_query($koneksi, $cekNPM) < 13){
    echo "<script>
          alert('digit npm kurang dari 13 angka.');
          window.location.href = 'index.php';
          </script>";
}else{
  echo "<script>
        alert('npm harus angka.');
        window.location.href = 'index.php';
        </script>";
}