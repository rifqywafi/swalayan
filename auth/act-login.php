<?php
session_start();
include '../databases/koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

// menyeleksi data admin dengan username dan password yang sesuai
$query = mysqli_query($koneksi,"select * from user where username='$username' and password='$password'");
$ceknama_user = mysqli_query($koneksi, "select nama_user from user where username='$username'");
$nama_user = mysqli_fetch_array($ceknama_user);
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($query);

// var_dump($nama_user);
if($cek > 0){
$_SESSION['username'] = $username;
$_SESSION['nama_user'] = $nama_user[0];
$_SESSION['status'] = "login";
header("location:../index.php");
}else{
header("location:login.php?pesan=gagal");
}

?>