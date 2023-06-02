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
    $querysimpan = mysqli_query($koneksi, "INSERT INTO user VALUES('$id_user','$nama_user','$jenis_kelamin','$username','$password','$no_hp')");
    $simpan = 'const simpan = '.$querysimpan.'';
    var_dump($query);
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
    // return $querysimpan;
    break;

  case 'update':
    $id_user = $_POST['id_user'];
    $nama_user = $_POST['nama_user'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $no_hp = $_POST['no_hp'];
    $queryupdate = mysqli_query($koneksi,"UPDATE user SET nama_user = '$nama_user', jenis_kelamin = '$jenis_kelamin',
    username = '$username', password = '$password', no_hp = '$no_hp' WHERE id_user = '$id_user'");
    $update = 'const update = '.$queryupdate.'';
    if($queryupdate === true){
      echo 'tes';
      session_start();
      $_SESSION['update_user'] = "sukses"; 
      echo '
      <script>
      window.location.href = "../index.php?page=user";
      </script>'
      ;
      header("location:../index.php?page=user");
    }else{
      session_start();
      $_SESSION['update_user'] = "gagal"; 
      echo '
      <script>
      window.location.href = "../index.php?page=user";
      </script>'
      ;
    };
    return $queryupdate;
    break;

  case 'delete':
    $id_user = $_GET['id_user'];
    $querydelete = mysqli_query($koneksi,"DELETE FROM user WHERE id_user = '$id_user'");
    $delete = 'const deletes = '.$querydelete.'';
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
    // return $querydelete;
    break;
    }
    // var_dump($querysimpan);
    // var_dump($queryupdate);
    // var_dump($querydelete);
?>
<script>
  

  // if(simpan === true){
  //   sessionStorage.setItem("simpan", "sukses")
  //   window.location.href = "http://localhost/swalayan/index.php?page=user"
  // }else if(simpan === false){
  //   sessionStorage.setItem("simpan", "gagal")
  //   window.location.href = "http://localhost/swalayan/index.php?page=user"
  // }

  // if(update === true){
  //   sessionStorage.setItem("update", "sukses")
  //   window.location.href = "http://localhost/swalayan/index.php?page=user"
  // }else if(update === false){
  //   sessionStorage.setItem("update", "gagal")
  //   window.location.href = "http://localhost/swalayan/index.php?page=user"
  // }

  // if(delete === true){
  //   sessionStorage.setItem("delete", "sukses")
  //   window.location.href = "http://localhost/swalayan/index.php?page=user"
  // }else if(delete === false){
  //   sessionStorage.setItem("delete", "gagal")
  //   window.location.href = "http://localhost/swalayan/index.php?page=user"
  // }
  // console.log(simpan)
  // console.log(update)
  // console.log(deletes)
</script>