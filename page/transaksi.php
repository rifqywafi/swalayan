<?php
$toastify = '<script src="assets/extensions/toastify-js/src/toastify.js"></script>';
if (isset($_SESSION['simpan_transaksi'])) {
    if ($_SESSION['simpan_transaksi'] === "sukses") {
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
        unset($_SESSION['simpan_transaksi']);
    } else if ($_SESSION['simpan_transaksi'] === "gagal") {
        echo '
        ' . $toastify . '
        <script>
        Toastify({
            text: "Data Gagal Disimpan!!",
            duration: 3000,
            close: true,
            style: {
                background: "#d9534f",
            }
        }).showToast();
        </script>';
        unset($_SESSION['simpan_transaksi']);
    }
}
if (isset($_SESSION['update_transaksi'])) {
    if ($_SESSION['update_transaksi'] === "sukses") {
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
        unset($_SESSION['update_transaksi']);
    } else if ($_SESSION['update_transaksi'] === "gagal") {
        echo '
        ' . $toastify . '
        <script>
        Toastify({
            text: "Data Gagal Diupdate!!",
            duration: 3000,
            close: true,
            style: {
                background: "#d9534f",
            }
        }).showToast();
        </script>';
        unset($_SESSION['update_transaksi']);
    }
}
if (isset($_SESSION['delete_transaksi'])) {
    if ($_SESSION['delete_transaksi'] === "sukses") {
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
        unset($_SESSION['delete_transaksi']);
    } else if ($_SESSION['delete_transaksi'] === "gagal") {
        echo '
        ' . $toastify . '
        <script>
        Toastify({
            text: "Data Gagal Dihapus!!",
            duration: 3000,
            close: true,
            style: {
                background: "#d9534f",
            }
        }).showToast();
        </script>';
        unset($_SESSION['delete_transaksi']);
    }
}

?>
<div class="card">
    <section id="">
        <div class="row ">
            <div class="col-12">
                <div class="card-header">
                    <h4 class="fs-2 card-title">Data Transaksi</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="actions/proses_transaksi.php?aksi=simpan" method="POST" enctype="multipart/form-data">
                            <a class="btn btn-primary btn-collapse" type="button" data-bs-toggle="collapse" id="btn-collapse" href="#collapseForm" aria-expanded="false" aria-controls="collapseForm">
                                <span>Open Form</span>
                            </a>
                            <div class="collapse mt-3" id="collapseForm">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <?php
                                            include 'databases/koneksi.php';
                                            $querykode = mysqli_query($koneksi, "SELECT max(id_transaksi) as idterbesar FROM transaksi");
                                            $data = mysqli_fetch_array($querykode);
                                            $id_transaksi = $data['idterbesar'];
                                            $urutan = (int) substr($id_transaksi, 3, 3);
                                            $urutan++;
                                            $huruf = "TRS";
                                            $idtransaksi = $huruf . sprintf("%03s", $urutan);
                                            ?>
                                            <input type="text" id="id_transaksi" class="form-control" value="<?= $idtransaksi ?>" name="id_transaksi" hidden />
                                            <label for="pelanggan">Pelanggan</label>
                                            <div class="form-group position-relative has-icon-left">
                                                <select id="pelanggan" class="form-control" name="id_pelanggan" required>
                                                    <option value="" selected hidden disabled>Pelanggan</option>
                                                    <?php
                                                    include 'databases/koneksi.php';
                                                    $getpelanggan = mysqli_query($koneksi, 'select * from pelanggan');
                                                    while (
                                                        $data = mysqli_fetch_array($getpelanggan)
                                                    ) { ?>
                                                        <option value=<?= $data['id_pelanggan']; ?> selected><?= $data['nama_pelanggan']; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-people-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="id_user">User</label>
                                            <div class="form-group position-relative has-icon-left">
                                                <input type="text" id="id_user" class="form-control" value="<?= $_SESSION['id_user'] ?>" placeholder="ID User" name="id_user" required readonly />
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="tanggal">Tanggal</label>
                                            <div class="form-group position-relative has-icon-left">
                                                <input type="text" id="tanggal" <?php $Now = new DateTime('now', new DateTimeZone('Asia/Jakarta')); ?> value="<?php echo $Now->format('Y-m-d H:i:s'); ?>" class="form-control" placeholder="tanggal" name="tanggal" required />
                                                <div class="form-control-icon">
                                                    <i class="bi bi-calendar"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="barang">Barang</label>
                                            <div class="form-group position-relative has-icon-left">
                                                <select name="id_barang" id="id_barang" onchange="changeValueBarang(this.value)" class="form-control">
                                                    <option value="" disabled selected hidden> Barang</option>
                                                    <?php
                                                    $query = mysqli_query($koneksi, "SELECT * FROM barang where stok > 0");
                                                    $jsBarang = "var dtBarang = new Array();\n";
                                                    while ($data = mysqli_fetch_array($query)) {
                                                    ?>
                                                        <option value="<?php echo $data['id_barang'] ?>">
                                                            <?php echo $data['nama_barang'] ?></option>
                                                        <?php $jsBarang .= "dtBarang['" . $data['id_barang'] . "'] = {harga:'" . addslashes($data['harga']) . "', stok:'" . addslashes($data['stok']) . "'};\n" ?>

                                                    <?php } ?>
                                                </select>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-box-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <div class="form-group">
                                            <label for="jumlah">Jumlah</label>
                                            <div class="form-group position-relative has-icon-left">
                                                <input type="number" id="jumlah" class="form-control" min="0" max="" oninput="hitung()" value="" placeholder="Jumlah" name="jumlah" required readonly />
                                                <div class="form-control-icon">
                                                    <i class="bi bi-bag"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12 ">
                                        <div class="form-group mt-4 bg-primary rounded-2 d-none  p-2" id="keterangan">
                                            <div class="keterangan">
                                                <div class="badge bg-primary">
                                                    <span class=" ket-label ">Harga : </span>
                                                    <span id="harga" class=" me-1"></span>
                                                </div>
                                                <div class="badge bg-primary">
                                                    <span class=" ket-label">Stok : </span>
                                                    <span id="stok" class=" me-1"></span>
                                                </div>
                                                <div class="badge bg-primary">
                                                    <span class=" ket-label">Total : </span>
                                                    <span id="ket_total" class=" me-1"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="text" id="total" class="form-control" value="" placeholder="Total" name="total" required readonly hidden />
                                    <div class="col-12 d-flex mt-2 justify-content-end">
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
                                            <th scope="col">ID Transaksi</th>
                                            <th scope="col">ID Pelanggan</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Nama Barang</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">User</th>

                                            <th scope="col" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM `v_transaksi` ORDER BY `v_transaksi`.`id_transaksi` DESC";
                                        $query = mysqli_query($koneksi, $sql);

                                        $no = 0; //variabel no


                                        while ($d = mysqli_fetch_array($query)) {
                                            $total_rupiah = number_format($d['total'], 2, ',', '.');
                                            $no++
                                        ?>

                                            <tr>
                                                <td scope='row' class="text-center"><?php echo $no ?></td>

                                                <td><?php echo $d['id_transaksi'] ?></td>
                                                <td><?php echo $d['nama_pelanggan'] ?></td>
                                                <td><?php echo $d['tanggal'] ?></td>
                                                <td><?php echo $d['nama_barang'] ?></td>
                                                <td><?php echo $d['jumlah'] ?></td>
                                                <td>Rp.<?php echo $total_rupiah ?></td>
                                                <td><?php echo $d['nama_user'] ?></td>
                                                <td class="text-center">
                                                    <button class='btn btn-danger text-decoration-none' onclick="swalDelete('actions/proses_transaksi.php?aksi=delete&id_transaksi=<?php echo $d['id_transaksi'] ?>')">
                                                        <span data-feather='trash-2'></span>
                                                    </button>
                                                    <a class='btn btn-success text-decoration-none' href="index.php?page=cetak&id_transaksi=<?= $d['id_transaksi'] ?>">
                                                        <span data-feather='file-text'></span>
                                                    </a>
                                                </td>

                                            </tr>
                                        <?php } ?>
                                </table>

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
    <?php echo $jsBarang; ?>

    function btnReset() {
        document.getElementbyId("form").reset()
        document.getElementById("keterangan").classList.add("d-none")
    }

    function hitung() {
        var jumlahValue = document.getElementById('jumlah').value;
        var jumlahMax = document.getElementById('jumlah').max;
        var harga = document.getElementById('harga').innerHTML;
        var stok = document.getElementById('stok').innerHTML;
        if (jumlahValue == jumlahMax) {
            Toastify({
                text: "Jumlah Tidak Boleh Melebihi Stok",
                duration: 3000,
                close: true,
                style: {
                    background: "#d9534f",
                }
            }).showToast()
        }
        const hargaRemoveRupiah = harga.replace(/[^0-9]/g, "")
        const hargaInt = parseInt(hargaRemoveRupiah);
        var total = hargaInt * jumlahValue;
        document.getElementById('total').value = total;
        document.getElementById('ket_total').innerHTML = rupiah(total)
        // console.log("max = " + jumlahMax)
        // console.log("value = " + jumlahValue)
    }

    function totalRp() {
        formatRupiah(document.getElementById('total').value);
    }

    function changeValueBarang(x) {
        document.getElementById('jumlah').readOnly = false;
        document.getElementById('jumlah').max = dtBarang[x].stok;
        document.getElementById('keterangan').classList.remove('d-none');
        document.getElementById('harga').innerHTML = rupiah(dtBarang[x].harga, "Rp.");
        document.getElementById('stok').innerHTML = dtBarang[x].stok;
    }
</script>