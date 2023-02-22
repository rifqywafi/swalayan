<?php
include '../databases/koneksi.php';

$aksi = $_GET['aksi'];
switch($aksi){
  
  case 'simpan':
    $rand = rand();
    $id_barang = $_POST['id_barang'];
    $nama_barang = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $filename = $_FILES['gambar']['name'];

    
    $newfilename = $rand.'_'.$filename;    
    move_uploaded_file($_FILES['gambar']['tmp_name'], '../gambar/'.$rand.'_'.$filename);
    $query = mysqli_query($koneksi, "INSERT INTO barang
    VALUES('$id_barang','$nama_barang','$harga','$stok','$newfilename')");
    if($query){
      session_start();
      $_SESSION['simpan_barang'] = "sukses"; 
      echo '
      <script>
      window.location.href = "../index.php?page=barang";
      </script>'
      ;
      //  :../index.php?page=barang");
    }else{
      session_start();
      $_SESSION['simpan_barang'] = "gagal"; 
      echo '
      <script>
      window.location.href = "../index.php?page=barang";
      </script>'
      ;
    };
    break;

  case 'update':
    $rand = rand();
    $id_barang = $_POST['id_barang'];
    $nama_barang = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $filename = $_FILES['gambar']['name'];
    $newfilename = $rand.'_'.$filename;
    move_uploaded_file($_FILES['gambar']['tmp_name'], '../gambar/'.$rand.'_'.$filename);
    $query = mysqli_query($koneksi,"UPDATE barang SET nama_barang = '$nama_barang', harga = '$harga', stok = '$stok' WHERE id_barang = '$id_barang'");
    if($query){
      session_start();
      $_SESSION['update_barang'] = "sukses"; 
      echo '
      <script>
      window.location.href = "../index.php?page=barang";
      </script>'
      ;
      //  :../index.php?page=barang");
    }else{
      session_start();
      $_SESSION['update_barang'] = "gagal"; 
      echo '
      <script>
      window.location.href = "../index.php?page=barang";
      </script>'
      ;
    };
    break;
    break;
    
    case 'delete':
        $id_barang = $_GET['id_barang'];
        $query_select = mysqli_query($koneksi, "SELECT gambar FROM barang WHERE id_barang = '$id_barang'");
        $data = mysqli_fetch_array($query_select);
        $file = '../gambar/' . $data['gambar'];
        unlink($file);
        $query = mysqli_query($koneksi, "DELETE FROM barang WHERE id_barang = '$id_barang'");
        if($query){
          session_start();
          $_SESSION['delete_barang'] = "sukses"; 
          echo '
          <script>
          window.location.href = "../index.php?page=barang";
          </script>'
          ;
          //  :../index.php?page=barang");
        }else{
          session_start();
          $_SESSION['delete_barang'] = "gagal"; 
          echo '
          <script>
          window.location.href = "../index.php?page=barang";
          </script>'
          ;
        };
        break;
        break;
    }
?>