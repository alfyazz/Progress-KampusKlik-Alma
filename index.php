<?php
    include "tampilkan_data.php";
    // include "edit_data.php";
    $data_edit = isset($_GET['id']) ? mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id = " . $_GET['id'])) : null;
    // $data_edit = mysqli_fetch_assoc($proses_ambil);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="library/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="library/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="library/assets/styles.css" rel="stylesheet" media="screen">
    <script src="library/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>
<body>
            <!-- <form action="percobaan8.php" method="POST">
            <form action="" method="GET">
                NPM : 
                <input type="text" name="npm" value=""\>
                    <br> 
                NILAI :
                <input type="text" name="nilai" value=""\>
                    <br>
                ULANGI : 
                <input type="text" name="ulangi" value=""\>
                    <br>
                <button type="submit" name="proses_data">
                    PROSES DATA
                </button> -->
            
            </form>
            <div class="span9" id="content">
                      <!-- morris stacked chart -->
                    <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Input Nilai Mahasiswa</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">

                                <form action= "<?php echo isset($data_edit['id']) ? 'edit_data.php?id=' . $data_edit['id'] . '&proses=1' : 'percobaan8.php'; ?>" method="POST">
                                      <fieldset>
                                        <legend>Input Nilai Mahasiswa</legend>

                                        <div class="control-group">
                                          <label class="control-label" for="NPM">NAMA MAHASISWA : </label>
                                          <div class="controls">
                                            <input type="text" class="input-xlarge focused" id="NPM" name="nama" value="<?php echo isset($data_edit['nama_mahasiswa']) ? $data_edit['nama_mahasiswa'] : ''; ?>">
                                          </div>
                                        </div>

                                        <div class="control-group">
                                          <label class="control-label" for="NPM">PRODI MAHASISWA : </label>
                                          <div class="controls">
                                            <input type="text" class="input-xlarge focused" id="NPM" name="prodi" value="<?php echo isset($data_edit['prodi']) ? $data_edit['prodi'] : ''; ?>">
                                          </div>
                                        </div>

                                        <div class="form-actions">
                                          <button type="submit" class="btn btn-primary">Proses</button>
                                          <button type="reset" class="btn">Cancel</button>
                                        </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Data Mahasiswa</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
  									<table class="table">
						              <thead>
						                <tr>
						                  <th>Id</th>
						                  <th>Nama Mahasiswa</th>
						                  <th>Prodi</th>
						                  <th>Aksi</th>
						                </tr>
						              </thead>
						              <tbody>
                          <?php
                          $result = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
                          while ($data = mysqli_fetch_assoc($result)) {
                          ?>
						                <tr>
						                  <td><?php echo $data['id'] ?></td>
						                  <td><?php echo $data['nama_mahasiswa'] ?></td>
						                  <td><?php echo $data['prodi'] ?></td>
						                  <td><a href="index.php?id=<?php echo $data ['id']; ?> "> Edit | <a href="hapus_data.php?id=<?php echo $data ['id']; ?> "> Hapus </td>
						                </tr>

                          <?php
                              }
                          ?>
						              </tbody>
						            </table>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
            </div>
</body>
</html>
