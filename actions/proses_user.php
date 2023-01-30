<?php
include '../databases/koneksi.php';

$aksi = $_GET['aksi'];
switch($aksi){
  
  case 'simpan':
    $id_user = $_POST['id_user'];
    $nama_user = $_POST['nama_user'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $no_hp = $_POST['no_hp'];
    $query = mysqli_query($koneksi, "INSERT INTO user VALUES('$id_user','$nama_user','$jenis_kelamin','$username','$password','$no_hp')");
    if($query){
      session_start();
      $_SESSION['simpan_user'] = "sukses"; 
      echo '
      <script>
      window.location.href = "../index.php?page=user";
      </script>'
      ;
      //  :../index.php?page=user");
    }else{
      session_start();
      $_SESSION['simpan_user'] = "gagal"; 
      echo '
      <script>
      window.location.href = "../index.php?page=user";
      </script>'
      ;
    };
    break;

  case 'update':
    $id_user = $_POST['id_user'];
    $nama_user = $_POST['nama_user'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $no_hp = $_POST['no_hp'];
    $query = mysqli_query($koneksi,"UPDATE user SET nama_user = '$nama_user', jenis_kelamin = '$jenis_kelamin',
    username = '$username', password = '$password', no_hp = '$no_hp' WHERE id_user = '$id_user'");
    if($query){
      session_start();
      $_SESSION['update_user'] = "sukses"; 
      echo '
      <script>
      window.location.href = "../index.php?page=user";
      </script>'
      ;
      // header("location:../index.php?page=user");
    }else{
      session_start();
      $_SESSION['update_user'] = "gagal"; 
      echo '
      <script>
      window.location.href = "../index.php?page=user";
      </script>'
      ;
    };
    break;

  case 'delete':
    $id_user = $_GET['id_user'];
    $query = mysqli_query($koneksi,"DELETE FROM user WHERE id_user = '$id_user'");
    if($query){
      session_start();
      $_SESSION['delete_user'] = "sukses"; 
      echo '
      <script>
      window.location.href = "../index.php?page=user";
      </script>'
      ;
      // header("location:../index.php?page=user");
    }else{
      session_start();
      $_SESSION['delete_user'] = "gagal"; 
      echo '
      <script>
      window.location.href = "../index.php?page=user";
      </script>'
      ;
    };
    break;
    }
?>