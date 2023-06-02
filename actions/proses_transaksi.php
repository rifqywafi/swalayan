<?php
include '../databases/koneksi.php';

$aksi = $_GET['aksi'];
switch($aksi){
  
  case 'simpan':
    $id_transaksi = $_POST['id_transaksi'];
    $id_pelanggan = $_POST['id_pelanggan'];
    $tanggal = $_POST['tanggal'];
    $id_barang = $_POST['id_barang'];
    $jumlah = $_POST['jumlah'];
    $total = $_POST['total'];
    $id_user = $_POST['id_user'];
    $query = mysqli_query($koneksi, "INSERT INTO transaksi VALUES('$id_transaksi','$id_pelanggan','$tanggal','$id_barang','$jumlah','$total','$id_user')");
    if($query){
      session_start();
      $_SESSION['simpan_transaksi'] = "sukses"; 
      echo '
      <script>
      window.location.href = "../index.php?page=transaksi";
      </script>'
      ;
      //  :../index.php?page=pelanggan");
    }else{
      session_start();
      $_SESSION['simpan_transaksi'] = "gagal"; 
      echo '
      <script>
      window.location.href = "../index.php?page=transaksi";
      </script>'
      ;
    };
    break;

  // case 'update':
  //   $id_transaksi = $_POST['id_transaksi'];
  //   $id_pelanggan = $_POST['id_pelanggan'];
  //   $tanggal = $_POST['tanggal'];
  //   $id_barang = $_POST['id_barang'];
  //   $jumlah = $_POST['total'];
  //   $id_user = $_POST['id_user'];
  //   $query = mysqli_query($koneksi,"UPDATE pelanggan SET nama_pelanggan = '$nama_pelanggan', jenis_kelamin = '$jenis_kelamin',
  //   alamat = '$alamat', no_hp = '$no_hp' WHERE id_pelanggan = '$id_pelanggan'");
  //   if($query){
  //     session_start();
  //     $_SESSION['update_transaksi'] = "sukses"; 
  //     echo '
  //     <script>
  //     window.location.href = "../index.php?page=transaksi";
  //     </script>'
  //     ;
  //     // header("location:../index.php?page=pelanggan");
  //   }else{
  //     session_start();
  //     $_SESSION['update_transaksi'] = "gagal"; 
  //     echo '
  //     <script>
  //     window.location.href = "../index.php?page=transaksi";
  //     </script>'
  //     ;
  //   };
  //   break;

  case 'delete':
    $id_transaksi = $_GET['id_transaksi'];
    $query = mysqli_query($koneksi,"DELETE FROM transaksi WHERE id_transaksi = '$id_transaksi'");
    if($query){
      session_start();
      $_SESSION['delete_transaksi'] = "sukses"; 
      echo '
      <script>
      window.location.href = "../index.php?page=transaksi";
      </script>'
      ;
      // header("location:../index.php?page=pelanggan");
    }else{
      session_start();
      $_SESSION['delete_transaksi'] = "gagal"; 
      echo '
      <script>
      window.location.href = "../index.php?page=transaksi";
      </script>'
      ;
    };
    break;
    }
?>