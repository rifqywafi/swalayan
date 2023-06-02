<?php
include '../databases/koneksi.php';

$aksi = $_GET['aksi'];
switch($aksi){
  
  case 'simpan':
    $id_pelanggan = $_POST['id_pelanggan'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $query = mysqli_query($koneksi, "INSERT INTO pelanggan VALUES('$id_pelanggan','$nama_pelanggan','$jenis_kelamin','$alamat','$no_hp')");
    if($query){
      session_start();
      $_SESSION['simpan_pelanggan'] = "sukses"; 
      echo '
      <script>
      window.location.href = "../index.php?page=pelanggan";
      </script>'
      ;
      //  :../index.php?page=pelanggan");
    }else{
      session_start();
      $_SESSION['simpan_pelanggan'] = "gagal"; 
      echo '
      <script>
      window.location.href = "../index.php?page=pelanggan";
      </script>'
      ;
    };
    break;

  case 'update':
    $id_pelanggan = $_POST['id_pelanggan'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $query = mysqli_query($koneksi,"UPDATE pelanggan SET nama_pelanggan = '$nama_pelanggan', jenis_kelamin = '$jenis_kelamin',
    alamat = '$alamat', no_hp = '$no_hp' WHERE id_pelanggan = '$id_pelanggan'");
    if($query){
      session_start();
      $_SESSION['update_pelanggan'] = "sukses"; 
      echo '
      <script>
      window.location.href = "../index.php?page=pelanggan";
      </script>'
      ;
      // header("location:../index.php?page=pelanggan");
    }else{
      session_start();
      $_SESSION['update_pelanggan'] = "gagal"; 
      echo '
      <script>
      window.location.href = "../index.php?page=user";
      </script>'
      ;
    };
    break;

  case 'delete':
    $id_pelanggan = $_GET['id_pelanggan'];
    $query = mysqli_query($koneksi,"DELETE FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'");
    if($query){
      session_start();
      $_SESSION['delete_pelanggan'] = "sukses"; 
      echo '
      <script>
      window.location.href = "../index.php?page=pelanggan";
      </script>'
      ;
      // header("location:../index.php?page=pelanggan");
    }else{
      session_start();
      $_SESSION['delete_pelanggan'] = "gagal"; 
      echo '
      <script>
      window.location.href = "../index.php?page=pelanggan";
      </script>'
      ;
    };
    break;
    }
?>