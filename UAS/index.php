<?php
include "tampilkan_data.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM</title>
    <link href="Library/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="Library/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="Library/assets/styles.css" rel="stylesheet" media="screen">
    <script src="Library/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>

<body>
    <div class="span9" id="content">
        <!-- morris stacked chart -->
        <div class="row-fluid">
            <!-- block -->
            <div class="block">
                <div class="navbar navbar-inner block-header">
                    <div class="muted pull-left">Form Data Mahasiswa</div>
                </div>
                <div class="block-content collapse in">
                    <div class="span12">
                        <form action="index2.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
                            <fieldset>
                                <legend>Input Data Mahasiswa</legend>
                                <div class="control-group">
                                    <label class="control-label" for="focusedInput">Nama Mahasiswa</label>
                                    <div class="controls">
                                        <input type="text" class="input-xlarge focused" id="nama" name="nama">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="focusedInput">NPM Mahasiswa</label>
                                    <div class="controls">
                                        <input type="text" class="input-xlarge focused" id="npm" name="npm">
                                    </div>
                                </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <!-- <button type="reset" class="btn">Cancel</button> -->
                                </div>

                                <div class="block-content collapse in">
                    <div class="span12">
                        <input type="text" id="search" placeholder="Cari data mahasiswa" onkeyup="searchTable()">
                        <table class="table" id="data-table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>NPM Mahasiswa</th>
                                    <th>File</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($data = mysqli_fetch_assoc($process)) {
                                ?>
                                    <tr>
                                        <td><?php echo $data['id'] ?></td>
                                        <td><?php echo $data['nama_mhs'] ?></td>
                                        <td><?php echo $data['npm'] ?></td>
                                        <td><a href="edit.php?id=<?php echo $data['id']; ?>">Edit</a> |
                                            <a href="hapus_data.php?id=<?php echo $data['id']; ?>">Hapus</a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        </div>

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function searchTable() {
            const input = document.getElementById('search');
            const filter = input.value.toLowerCase();
            const table = document.getElementById('data-table');
            const rows = table.getElementsByTagName('tr');

            for (let i = 1; i < rows.length; i++) {
                const cells = rows[i].getElementsByTagName('td');
                let match = false;
                if (cells.length > 0) {
                    const name = cells[1].innerText.toLowerCase();
                    const prodi = cells[2].innerText.toLowerCase();
                    if (name.includes(filter) || prodi.includes(filter)) {
                        match = true;
                        rows[i].style.display = '';
                    } else {
                        rows[i].style.display = 'none';
                    }
                }
            }
        }
    </script>
</body>

</html>