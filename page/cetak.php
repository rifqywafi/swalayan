<style>
    @media print {
        body * {
            visibility: hidden;
        }

        #content,
        #content * {
            visibility: visible;
        }
        #content {
            position: absolute;
            left: 25%;
            top: 25%;
            margin:0;
        }
        #buttonprint {
            display: none;
        }
    }
</style>
<?php
include 'databases/koneksi.php';
$id_transaksi = $_GET['id_transaksi'];
$query2 = mysqli_query($koneksi, "SELECT * FROM transaksi INNER JOIN barang ON barang.id_barang = transaksi.id_barang INNER JOIN pelanggan on pelanggan.id_pelanggan = transaksi.id_pelanggan INNER JOIN user on user.id_user = transaksi.id_user WHERE transaksi.id_transaksi = '$id_transaksi'");
$row = mysqli_fetch_array($query2);
// $sql = mysqli_query($koneksi, "SELECT * FROM barang");
// $row1 = mysqli_fetch_array($sql)

?>
<div class="card mx-auto" id="content" style="width:450px;">
    <div class="card-body text-center">
        <h4 class="card-title">
            Super Market
        </h4>
        <img class=" rounded-circle" src="assets/images/barca.png" width="100px" height="100px"/>
        <div class="card-text"><br>
            JL.Harapan No.2
            <hr>
            <?php echo $id_transaksi ?>&nbsp; | &nbsp;
            Kasir : <?= $row['nama_user'] ?>
            <hr>
            <table cellpadding="4" class="col-12 w-100">
                <tr>
                    <th>Nama</th>
                    <th>Qty</th>
                    <th>Harga(pcs)</th>
                    <th>Harga Total*</th>
                </tr>
                <tr class="border-bottom">
                    <td><?php echo $row['nama_barang'] ?>&nbsp;&nbsp;</td>
                    <td><?php echo $row['jumlah'] ?>&nbsp;&nbsp;</td>
                    <td><?php echo $row['harga'] ?>&nbsp;&nbsp;</td>
                    <td><?php echo $row['total'] ?>&nbsp;</td>

                </tr>
                <tr>
                    <td class="text-end" colspan="3">Total : </td>
                    <td>Rp. <?php echo $row['total'] ?></td>
                </tr>
            </table>
            <hr>
            <span class="col-sm-6">Call Center : 088208820882 </span>
            <br>
            <span class="col-sm-6">Email : campnou@barca.com </span>
        </div>
    </div>
</div>
<center>
    <div class="btn btn-primary mt-4" id="buttonprint" onclick="window.print();">Print</div>
</center>