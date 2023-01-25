<?php include "../layouts/header.php" ?>
<div class="container d-flex justify-content-center my-5">
<div id="auth">
    <div class="row h-100">
        <div class="col-md-12 ">
            <div id="auth ">
                <h1 class="auth-title">Masuk</h1>
                <p class="auth-subtitle mb-5">Input Data Kamu Untuk Masuk ke Website Ini.</p>
                <form action="act-login.php" method="POST">
                    <?php 
                        if(isset($_GET['pesan'])){
                            if($_GET['pesan'] == "gagal"){
                                echo '<div class="alert alert-danger" role="alert">
                                Login gagal! username dan password salah!
                                </div>';
                            }else if($_GET['pesan'] == "logout"){
                                echo '<div class="alert alert-danger" role="alert">
                                Anda telah berhasil logout!
                                </div>';
                            }else if($_GET['pesan'] == "belum_login"){
                                echo '<div class="alert alert-danger" role="alert">
                                Anda harus login untuk mengakses halaman admin
                                </div>';
                            }
                        }
                    ?>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="text" class="form-control form-control-xl" name="username" data-parsley-required="true" data-parsley-error-message="Kolom ini Harus Diisi!" placeholder="Username">
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" class="form-control form-control-xl" name="password" data-parsley-required="true" data-parsley-error-message="Kolom ini Harus Diisi!" placeholder="Password">
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Masuk</button>
                </form>
                <div class="text-center mt-5 text-lg fs-4">
                    <p class='text-gray-600'>Belum Punya Akun? <a href="register.php" class="font-bold">Daftar</a>.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right">

            </div>
        </div>
    </div>

</div>
</div>
<?php include "../layouts/footer.php" ?>