<div class="card">
    <section id="">
        <div class="row ">
            <div class="col-12">
                <div class="card-header">
                    <h4 class="fs-2 card-title">Data Barang</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="actions/proses_barang.php?aksi=simpan" method="POST"
                            enctype="multipart/form-data">
                            <a class="btn btn-primary btn-collapse" type="button" data-bs-toggle="collapse"
                                id="btn-collapse" href="#collapseForm" aria-expanded="false"
                                aria-controls="collapseForm">
                                <span>Open Form</span>
                            </a>
                            <div class="collapse mt-3" id="collapseForm">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <?php
                                            include 'databases/koneksi.php';
                                                $querykode = mysqli_query($koneksi, "SELECT max(id_barang) as idterbesar FROM barang");
                                                $data = mysqli_fetch_array($querykode);
                                                $id_barang = $data['idterbesar'];
                                                $urutan = (int) substr($id_barang, 3, 3);
                                                $urutan++;
                                                $huruf = "USR";
                                                $idbarang = $huruf . sprintf("%03s", $urutan);
                                            ?>
                                            <input type="text" id="id_barang" class="form-control"
                                                value="<?= $idbarang ?>" name="id_barang" hidden />
                                            <label for="nama_barang">Nama Barang</label>
                                            <div class="form-group position-relative has-icon-left">
                                                <input type="text" id="nama_barang" class="form-control"
                                                    placeholder="Nama Barang" name="nama_barang" required />
                                                <div class="form-control-icon">
                                                    <i class="bi bi-box"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="harga">Harga</label>
                                            <div class="form-group position-relative has-icon-left">
                                                <input type="text" id="harga" class="form-control" placeholder="Harga"
                                                    name="harga" required />
                                                <div class="form-control-icon">
                                                    <i class="bi bi-currency-dollar"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="stok">Stok</label>
                                            <div class="form-group position-relative has-icon-left">
                                                <input type="number" id="stok" class="form-control" placeholder="Stok"
                                                    name="stok" required />
                                                <div class="form-control-icon">
                                                    <i class="bi bi-box-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="gambar">Gambar</label>
                                            <input class="form-control mb-3" type="file" id="image" name="gambar"
                                                onchange="previewImage()">
                                            <img class="img-preview img-fluid col-sm-5">
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end mt-3">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">
                                            Submit
                                        </button>
                                        <button type="reset" onclick="btnReset()"
                                            class="btn btn-light-secondary me-1 mb-1">
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
                                            <th scope="col">ID Barang</th>
                                            <th scope="col">Nama Barang</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col">Stok</th>
                                            <th scope="col">Gambar</th>

                                            <th scope="col" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                    $sql = "SELECT * FROM `barang` ORDER BY `barang`.`id_barang` DESC";
                    $query = mysqli_query($koneksi, $sql);
 
                    $no = 0; //variabel no
 
 
                    while ($d = mysqli_fetch_array($query)) {
 
                        $no++
                    ?>

                                        <tr>
                                            <td scope='row' class="text-center"><?php echo $no ?></td>

                                            <td><?php echo $d['id_barang'] ?></td>
                                            <td><?php echo $d['nama_barang'] ?></td>
                                            <td><?php echo $d['harga'] ?></td>
                                            <td><?php echo $d['stok'] ?></td>
                                            <td class="text-center"><img src="gambar/<?php echo $d['gambar'] ?>"
                                                    width="100px" height="100px" alt="<?= $d['gambar'] ?>"></td>
                                            <td class="text-center">

                                                <a href='' class='btn btn-success text-decoration-none'
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#edit<?php echo $d['id_barang'] ?>"><span
                                                        data-feather='edit'></span></a> |
                                                <button class='btn btn-danger text-decoration-none'
                                                    onclick="swalDelete('actions/proses_barang.php?aksi=delete&id_barang=<?php echo $d['id_barang'] ?>')">
                                                    <span data-feather='trash-2'></span>
                                                </button>
                                            </td>

                                        </tr>
                                        <?php } ?>
                                </table>
                                <?php
            $no = 1;
            $data = mysqli_query($koneksi, "select * from barang");
            while ($d = mysqli_fetch_array($data)) {
            ?>
                                <div class="modal-primary me-1 mb-1 d-inline-block">
                                    <!--primary theme Modal -->
                                    <div class="modal fade text-left" data-bs-backdrop="static" data-bs-keyboard="false"
                                        id="edit<?php echo $d['id_barang'] ?>" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel33" aria-hidden="true" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title white" id="myModalLabel133">
                                                        Edit Barang
                                                    </h5>
                                                    <button type="button" class="close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="actions/proses_barang.php?aksi=update" method="post"
                                                        enctype="multipart/form-data">
                                                        <div class="form-group position-relative has-icon-left mb-4">
                                                            <div class="col-md-4">
                                                                <label>ID Barang</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group has-icon-left">
                                                                    <div class="position-relative">
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Id Barang" id="first-name-icon"
                                                                            name="id_barang"
                                                                            value="<?php echo $d['id_barang'] ?>"
                                                                            readonly>
                                                                        <div class="form-control-icon">
                                                                            <i class="bi bi-key"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <label>Nama Barang</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group has-icon-left">
                                                                    <div class="position-relative">
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Nama Barang"
                                                                            id="first-name-icon" name="nama_barang"
                                                                            value="<?php echo $d['nama_barang'] ?>"
                                                                            required>
                                                                        <div class="form-control-icon">
                                                                            <i class="bi bi-box"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <label>Harga</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group has-icon-left">
                                                                    <div class="position-relative">
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Harga" id="first-name-icon"
                                                                            name="harga"
                                                                            value="<?php echo $d['harga'] ?>" required>
                                                                        <div class="form-control-icon">
                                                                            <i class="bi bi-currency-dollar"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label>Stok</label>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group has-icon-left">
                                                                <div class="position-relative">
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Stok" id="first-name-icon"
                                                                        name="stok" value="<?php echo $d['stok'] ?>"
                                                                        required>
                                                                    <div class="form-control-icon">
                                                                        <i class="bi bi-box-fill"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label>Gambar</label>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="position-relative">
                                                                <input class="form-control mb-3" type="file" id="image"
                                                                    name="gambar" onchange="previewImage()">
                                                                <img class="img-preview img-fluid col-sm-5">
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-md-8 offset-md-4">
                                                        </div>
                                                        <div class="col-12 d-flex justify-content-end">
                                                            <button id="insert-button" class="btn btn-primary me-1 mb-1"
                                                                type="submit">Submit</button>
                                                            <button type="reset"
                                                                class="btn btn-light-secondary me-1 mb-1">Reset</button>
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