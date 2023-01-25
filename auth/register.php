<?php include "../layouts/header.php";
include "../databases/koneksi.php" ?>
<div class="container d-flex justify-content-center my-5">
<div id="auth">
    <div class="row h-100">
        <div class=" col-md-12">
            <div id="auth-left">
                <h1 class="auth-title">Daftar</h1>
                <p class="auth-subtitle mb-3">Input Data Kamu Untuk Daftar di Website Ini.</p>
                <form action="act-register.php" method="POST">
                <?php
                $querykode = mysqli_query($koneksi, "SELECT max(id_user) as idterbesar FROM user");
                $data = mysqli_fetch_array($querykode);
                $id_user = $data['idterbesar'];
                $urutan = (int) substr($id_user, 3, 3);
                $urutan++;
                $huruf = "USR";
                $iduser = $huruf . sprintf("%03s", $urutan);
                ?>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-xl" value="<?= $iduser ?>" name="id_user" hidden>
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="text" class="form-control form-control-xl" data-parsley-required="true"  data-parsley-error-message="Kolom ini Harus Diisi!" name="nama" placeholder="Nama">
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="text" class="form-control form-control-xl" data-parsley-required="true" name="username" data-parsley-error-message="Kolom ini Harus Diisi!"  placeholder="Username">
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <select type="password" class="form-control form-control-xl" data-parsley-required="true" name="jenis_kelamin" data-parsley-error-message="Kolom ini Harus Diisi!" placeholder="Jenis Kelamin">
                            <option value="janis_kelamin" name="jenis_kelamin" hidden>Jenis Kelamin</option>
                            <option value="Laki-Laki" name="laki-laki">Laki-Laki</option>
                            <option value="Perempuan" name="perempuan">Perempuan</option>
                        </select>
                        <div class="form-control-icon">
                            <i class="bi bi-gender-ambiguous"></i>
                        </div>
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" class="form-control form-control-xl" data-parsley-required="true" data-parsley-error-message="Kolom ini Harus Diisi!" name="password" placeholder="Password">
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="text" class="form-control form-control-xl" data-parsley-required="true" data-parsley-error-message="Kolom ini Harus Diisi!" name="no_hp" placeholder="Nomor Hp">
                        <div class="form-control-icon">
                            <i class="bi bi-telephone"></i>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-3">Daftar</button>
                </form>
                <div class="text-center mt-5 text-lg fs-4">
                    <p class='text-gray-600'>Sudah Punya Akun? <a href="login.php" class="font-bold">Masuk</a>.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right">

            </div>
        </div>
    </div>

</div>
<?php include "../layouts/footer.php" ?>