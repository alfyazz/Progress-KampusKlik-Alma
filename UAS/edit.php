<?php
include('koneksi.php');

$id = $_GET['id'];

$ambil_data = mysqli_query($koneksi, "SELECT * FROM mhs WHERE id = '$id'");
$mhs = mysqli_fetch_array($ambil_data);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_mhs = $_POST['nama'];
    $npm = $_POST['npm'];
    $file_lama = $mhs['file'];

    // Mengelola file yang diunggah
  //  $target_dir = "upload/";
   // $uploadOk = 1;
   // $fileType = strtolower(pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION));
   // $target_file = $target_dir . basename($_FILES["file"]["name"]);

    //if (!empty($_FILES["file"]["name"])) {
        // Periksa ukuran file
        //if ($_FILES["file"]["size"] > 500000) {
          //  echo "<script>
          //          alert('Ukuran file terlalu besar.');
           //         window.location.href = 'edit.php?id=$id';
           //       </script>";
            //$uploadOk = 0;
     //   }

        // Izinkan format file tertentu
      //  if ($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "pdf") {
        //    echo "<script>
        //            alert('Hanya format JPG, JPEG, PNG, dan PDF yang diperbolehkan.');
         //           window.location.href = 'edit.php?id=$id';
         //         </script>";
          //  $uploadOk = 0;
       // }

        if ($uploadOk == 0) {
            $query = "UPDATE mhs SET nama_mhs='$nama_mhs', npm='$npm' WHERE id=$id";
        }
    }

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data berhasil diubah'); window.location='index.php';</script>";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
//}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Library/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="Library/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="Library/assets/styles.css" rel="stylesheet" media="screen">
    <script src="Library/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <title>Document</title>
</head>

<body>
    <div class="span9" id="content">
        <div class="row-fluid">
            <!-- block -->
            <div class="block">
                <div class="navbar navbar-inner block-header">
                    <div class="muted pull-left">Form Input Nilai Mahasiswa</div>
                </div>
                <div class="block-content collapse in">
                    <div class="span12">
                        <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
                            <fieldset>
                                <legend>Input Nilai Mahasiswa</legend>
                                <input type="hidden" name="id" value="<?php echo $mhs['id']?>">
                                <div class="control-group">
                                    <label class="control-label" for="focusedInput">Nama Mahasiswa</label>
                                    <div class="controls">
                                        <input type="text" class="input-xlarge focused" id="nama" name="nama" value="<?php echo $mhs['nama_mhs']?>">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="focusedInput">NPM Mahasiswa</label>
                                    <div class="controls">
                                        <input type="text" class="input-xlarge focused" id="npm" name="npm" value="<?php echo $mhs['npm']?>">
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                    <!-- <button type="reset" class="btn" onclick="resetPreview()">Cancel</button> -->
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
