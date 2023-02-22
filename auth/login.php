<?php include "../layouts/header.php" ?>
<?php
$toastify = '<script src="../assets/extensions/toastify-js/src/toastify.js"></script>';
if (isset($_GET['pesan'])) {
    if ($_GET['pesan'] === "gagal") {
        echo '' . $toastify . '
        <script>
        Toastify({
            text: "Login Gagal, Username atau Password Salah!!",
            duration: 3000,
            close: true,
            style: {
                background: "#d9534f",
            }
        }).showToast()
        </script>';
    } else if ($_GET['pesan'] === "logout") {
        echo '' . $toastify . '
        <script>
        Toastify({
            text: "Anda Berhasil Logout!!",
            duration: 3000,
            close: true,
            style: {
                background: "#5cb85c",
            }
        }).showToast();
        </script>';
    } else if ($_GET['pesan'] === "belum_login") {
        echo '' . $toastify . '
        <script>
        Toastify({
            text: "Anda Harus Login Terlebih Dahulu untuk Mengakses Halaman Admin!!",
            duration: 3000,
            close: true,
            style: {
                background: "#d9534f",
            }
        }).showToast();
        </script>';
    }
}
?>
<div class="container d-flex justify-content-center my-5">
    <div id="auth">
        <div class="row h-100">
            <div class="col-md-12 ">
                <div id="auth ">
                    <h1 class="auth-title">Masuk</h1>
                    <p class="auth-subtitle mb-5">Input Data Kamu Untuk Masuk ke Website Ini.</p>
                    <form action="act-login.php" method="POST">

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