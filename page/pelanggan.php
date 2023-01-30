<?php
$toastify = '<script src="assets/extensions/toastify-js/src/toastify.js"></script>';
if (isset($_SESSION['simpan_pelanggan'])) {
    if ($_SESSION['simpan_pelanggan'] === "sukses") {
        echo '
        ' . $toastify . '
        <script>
        Toastify({
            text: "Data Berhasil Disimpan!!",
            duration: 3000,
            close: true,
            style: {
                background: "#5cb85c",
            }
        }).showToast();
        </script>';
        unset($_SESSION['simpan_pelanggan']);
    } else if ($_SESSION['simpan_pelanggan'] === "gagal") {
        echo '
        ' . $toastify . '
        <script>
        Toastify({
            text: "Data Gagal Disimpan!!",
            duration: 3000,
            close: true,
        }).showToast();
        </script>';
        unset($_SESSION['simpan_pelanggan']);
    }
}
if (isset($_SESSION['update_pelanggan'])) {
    if ($_SESSION['update_pelanggan'] === "sukses") {
        echo '
        ' . $toastify . '
        <script>
        Toastify({
            text: "Data Berhasil Diupdate!!",
            duration: 3000,
            close: true,
            style: {
                background: "#5cb85c",
            }
        }).showToast();
        </script>';
        unset($_SESSION['update_pelanggan']);
    } else if ($_SESSION['update_pelanggan'] === "gagal") {
        echo '
        ' . $toastify . '
        <script>
        Toastify({
            text: "Data Gagal Diupdate!!",
            duration: 3000,
            close: true,
        }).showToast();
        </script>';
        unset($_SESSION['update_pelanggan']);
    }
}
if (isset($_SESSION['delete_pelanggan'])) {
    if ($_SESSION['delete_pelanggan'] === "sukses") {
        echo '
        ' . $toastify . '
        <script>
        Toastify({
            text: "Data Berhasil Dihapus!!",
            duration: 3000,
            close: true,
            style: {
                background: "#5cb85c",
            }
        }).showToast();
        </script>';
        unset($_SESSION['delete_pelanggan']);
    } else if ($_SESSION['delete_pelanggan'] === "gagal") {
        echo '
        ' . $toastify . '
        <script>
        Toastify({
            text: "Data Gagal Dihapus!!",
            duration: 3000,
            close: true,
        }).showToast();
        </script>';
        unset($_SESSION['delete_pelanggan']);
    }
}

?>
<div class="card">
    <section id="">
        <div class="row ">
            <div class="col-12">
                <div class="card-header">
                    <h4 class="fs-2 card-title">Data Pelanggan</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="actions/proses_pelanggan.php?aksi=simpan" method="POST" enctype="multipart/form-data">
                            <a class="btn btn-primary btn-collapse" type="button" data-bs-toggle="collapse" id="btn-collapse" href="#collapseForm" aria-expanded="false" aria-controls="collapseForm">
                                <span>Open Form</span>
                            </a>
                            <div class="collapse mt-3" id="collapseForm">
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <?php
                                            include 'databases/koneksi.php';
                                            $querykode = mysqli_query($koneksi, "SELECT max(id_pelanggan) as idterbesar FROM pelanggan");
                                            $data = mysqli_fetch_array($querykode);
                                            $id_pelanggan = $data['idterbesar'];
                                            $urutan = (int) substr($id_pelanggan, 3, 3);
                                            $urutan++;
                                            $huruf = "PLG";
                                            $idpelanggan = $huruf . sprintf("%03s", $urutan);
                                            ?>
                                            <input type="text" id="id_pelanggan" class="form-control" value="<?= $idpelanggan ?>" name="id_pelanggan" hidden />
                                            <label for="nama_pelanggan">Nama Pelanggan</label>
                                            <div class="form-group position-relative has-icon-left">
                                                <input type="text" id="nama_pelanggan" class="form-control" placeholder="Nama Pelanggan" name="nama_pelanggan" required />
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                            <div class="form-group position-relative has-icon-left">
                                                <select id="jenis_kelamin" class="form-control" name="jenis_kelamin" required>
                                                    <option value="Jenis Kelamin" selected hidden>Jenis Kelamin</option>
                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-gender-ambiguous"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="no_hp">No. Hp</label>
                                            <div class="form-group position-relative has-icon-left">
                                                <input type="text" id="no_hp" class="form-control" placeholder="No. Hp" name="no_hp" required />
                                                <div class="form-control-icon">
                                                    <i class="bi bi-telephone"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group ">
                                            <label for="alamat">Alamat</label>
                                            <div class="form-group position-relative has-icon-left">
                                                <input class="form-control" type="text" id="alamat" name="alamat" placeholder="Alamat">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-signpost-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">
                                            Submit
                                        </button>
                                        <button type="reset" onclick="btnReset()" class="btn btn-light-secondary me-1 mb-1">
                                            Reset
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-12 py-3 mt-3" style="border-top:1px dotted black;border-radius:2px;">
                                <table class="table table-striped" id="table1">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col">#</th>
                                            <th scope="col">ID Pelanggan</th>
                                            <th scope="col">Nama Pelanggan</th>
                                            <th scope="col">Jenis Kelamin</th>
                                            <th scope="col">No. Hp</th>
                                            <th scope="col">Alamat</th>
                                            <th scope="col" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM `pelanggan` ORDER BY `pelanggan`.`id_pelanggan` DESC";
                                        $query = mysqli_query($koneksi, $sql);

                                        $no = 0; //variabel no


                                        while ($d = mysqli_fetch_array($query)) {

                                            $no++
                                        ?>

                                            <tr>
                                                <td scope='row' class="text-center"><?php echo $no ?></td>
                                                <td><?php echo $d['id_pelanggan'] ?></td>
                                                <td><?php echo $d['nama_pelanggan'] ?></td>
                                                <td><?php echo $d['jenis_kelamin'] ?></td>
                                                <td><?php echo $d['no_hp'] ?></td>
                                                <td><?php echo $d['alamat'] ?></td>
                                                <td class="text-center">
                                                    <a href='' class='btn btn-success text-decoration-none' data-bs-toggle="modal" data-bs-target="#edit<?php echo $d['id_pelanggan'] ?>"><span data-feather='edit'></span></a> |
                                                    <button class='btn btn-danger text-decoration-none' onclick="swalDelete('actions/proses_pelanggan.php?aksi=delete&id_pelanggan=<?php echo $d['id_pelanggan'] ?>')">
                                                        <span data-feather='trash-2'></span>
                                                    </button>
                                                </td>

                                            </tr>
                                        <?php } ?>
                                </table>
                                <?php
                                $no = 1;
                                $data = mysqli_query($koneksi, "select * from pelanggan");
                                while ($d = mysqli_fetch_array($data)) {
                                ?>
                                    <div class="modal-primary me-1 mb-1 d-inline-block">
                                        <!--primary theme Modal -->
                                        <div class="modal fade text-left" data-bs-backdrop="static" data-bs-keyboard="false" id="edit<?php echo $d['id_pelanggan'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title white" id="myModalLabel133">
                                                            Edit Pelanggan
                                                        </h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="actions/proses_pelanggan.php?aksi=update" method="post" enctype="multipart/form-data">
                                                            <div class="form-group position-relative has-icon-left mb-4">
                                                                <div class="col-md-4">
                                                                    <label>ID Barang</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group has-icon-left">
                                                                        <div class="position-relative">
                                                                            <input type="text" class="form-control" placeholder="Id Pelanggan" id="first-name-icon" name="id_pelanggan" value="<?php echo $d['id_pelanggan'] ?>" readonly>
                                                                            <div class="form-control-icon">
                                                                                <i class="bi bi-key"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <label>Nama Pelanggan</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group has-icon-left">
                                                                        <div class="position-relative">
                                                                            <input type="text" class="form-control" placeholder="Nama Pelanggan" id="first-name-icon" name="nama_pelanggan" value="<?php echo $d['nama_pelanggan'] ?>" required>
                                                                            <div class="form-control-icon">
                                                                                <i class="bi bi-person-fill"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <label>Jenis Kelamin</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group has-icon-left">
                                                                        <div class="position-relative">
                                                                            <select class="form-control" name="jenis_kelamin" required>
                                                                                <?php
                                                                                if ($d['jenis_kelamin'] == 'Laki-Laki') {
                                                                                    echo "<option value='Laki-Laki' selected>Laki-Laki</option>";
                                                                                    echo "<option value='Perempuan'>Perempuan</option>";
                                                                                } else if ($d['jenis_kelamin'] == 'Perempuan') {
                                                                                    echo "<option value='Laki-Laki'>Laki-Laki</option>";
                                                                                    echo "<option value='Perempuan' selected>Perempuan</option>";
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                            <div class="form-control-icon">
                                                                                <i class="bi bi-gender-ambiguous"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <label>No. Hp</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group has-icon-left">
                                                                    <div class="position-relative">
                                                                        <input type="text" class="form-control" placeholder="No. Hp" id="first-name-icon" name="no_hp" value="<?php echo $d['no_hp'] ?>" required>
                                                                        <div class="form-control-icon">
                                                                            <i class="bi bi-telephone"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <label>Alamat</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group has-icon-left">
                                                                    <div class="position-relative">
                                                                        <input type="text" class="form-control" placeholder="Alamat" name="alamat" value="<?php echo $d['alamat'] ?>" required>
                                                                        <div class="form-control-icon">
                                                                            <i class="bi bi-phone"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-md-8 offset-md-4">
                                                            </div>
                                                            <div class="col-12 d-flex justify-content-end">
                                                                <button id="insert-button" class="btn btn-primary me-1 mb-1" type="submit">Submit</button>
                                                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                            </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>

<script>
    function btnReset() {
        document.getElementbyId("form").reset()
    }
</script>