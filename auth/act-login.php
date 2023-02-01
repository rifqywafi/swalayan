<?php
session_start();
include '../databases/koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

// menyeleksi data admin dengan username dan password yang sesuai
$query = mysqli_query($koneksi,"select * from user where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($query);

$dt = mysqli_fetch_array($query);
// var_dump($nama_user);
if($cek > 0){
$_SESSION['username'] = $username;
$_SESSION['nama_user'] = $dt['nama_user'];
$_SESSION['id_user'] = $dt['id_user'];
$_SESSION['status'] = "login";
header("location:../index.php");
}else{
header("location:login.php?pesan=gagal");
}

?>