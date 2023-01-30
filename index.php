<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swalayan </title>
    <link rel="stylesheet" href="assets/css/style.css" class="rel">
    <link rel="stylesheet" href="assets/css/main/app.css">
    <link rel="stylesheet" href="assets/css/pages/datatables.css" class="rel">
    <link rel="stylesheet" href="assets/extensions/@fortawesome/fontawesome-free/css/all.css" class="rel">
    <link rel="stylesheet" href="assets/css/main/app-dark.css">
    <link rel="stylesheet" href="assets/extensions/toastify-js/src/toastify.css" class="rel">
    <link rel="stylesheet" href="assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.css" class="rel">
    <link rel="stylesheet" href="assets/extensions/sweetalert2/sweetalert2.css" class="rel">
    <link rel="shortcut icon" href="assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/png">

    <link rel="stylesheet" href="assets/css/shared/iconly.css">

</head>

<body>
    <?php
    session_start();
    $username = $_SESSION['username'];
    $nama_user = $_SESSION['nama_user'];
    if (!isset($_SESSION['status'])) {
        header("location:auth/login.php?pesan=belum_login");
    };
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    }
    ?>

    <body>
        <div id="app">
            <div id="sidebar" class="active">
                <div class="sidebar-wrapper active">
                    <div class="sidebar-header position-relative">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="logo me-3">
                                <a href="index.php">Swalayan</a>
                            </div>
                            <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                                    <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2" opacity=".3"></path>
                                        <g transform="translate(-210 -1)">
                                            <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                            <circle cx="220.5" cy="11.5" r="4"></circle>
                                            <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2">
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                                <div class="form-check form-switch fs-6">
                                    <input class="form-check-input  me-0" type="checkbox" id="toggle-dark">
                                    <label class="form-check-label"></label>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
                                    </path>
                                </svg>
                            </div>
                            <div class="sidebar-toggler  x">
                                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="card">
                            <div class="card-body py-0 px-4">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-xl">
                                        <img src="assets/images/faces/1.jpg" alt="Face 1">
                                    </div>
                                    <div class="ms-3 name dropdown">
                                        <h5 class="font-bold"><?= $nama_user ?></h5>
                                        <h6 class="text-muted mb-0"><?= '@', $username ?></h6>
                                    </div>
                                    <div>
                                        <button class="ms-4 btn btn-primary" style=" margin-left:10px;" onclick="swalLogout()">
                                            <i class=" fs-4 bi bi-box-arrow-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-menu">
                        <ul class="menu">
                            <li class="sidebar-title">Menu</li>
                            <li class="sidebar-item <?php if (!$page) {
                                                        echo 'active';
                                                    } ?>">
                                <a href="index.php" class='sidebar-link'>
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            <li class="sidebar-item <?php if ($page == "user") {
                                                        echo 'active';
                                                    } ?>">
                                <a href="index.php?page=user" class='sidebar-link'>
                                    <i class="bi bi-person-fill"></i>
                                    <span>User</span>
                                </a>
                            </li>
                            <li class="sidebar-item <?php if ($page == "pelanggan") {
                                                        echo 'active';
                                                    } ?>">
                                <a href="index.php?page=pelanggan" class='sidebar-link'>
                                    <i class="bi bi-people-fill"></i>
                                    <span>Pelanggan</span>
                                </a>
                            </li>
                            <li class="sidebar-item <?php if ($page == "barang") {
                                                        echo 'active';
                                                    } ?>">
                                <a href="index.php?page=barang" class='sidebar-link'>
                                    <i class="bi bi-box-fill"></i>
                                    <span>Barang</span>
                                </a>
                            </li>
                            <li class="sidebar-item <?php if ($page == "transaksi") {
                                                        echo 'active';
                                                    } ?>">
                                <a href="index.php?page=transaksi" class='sidebar-link'>
                                    <i class="bi bi-currency-dollar"></i>
                                    <span>Transaksi</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="main">
                <header class="">
                    <div class="col-md-4">
                        <a href="#" class="burger-btn d-block d-xl-none">
                            <i class="bi bi-justify fs-3"></i>
                        </a>
                    </div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-right">
                            <?php
                            if (!isset($page)) {
                                echo '
                                <li class="breadcrumb-item active" aria-current="page">Home</a></li>
                                ';
                            } else if (isset($page)) {
                                switch ($page) {
                                    case "user":
                                        echo '
                                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">User</a></li>
                                        ';
                                        break;
                                    case "pelanggan":
                                        echo '
                                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Pelanggan</a></li>
                                        ';
                                        break;
                                    case "barang":
                                        echo '
                                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Barang</a></li>
                                        ';
                                        break;
                                    case "transaksi":
                                        echo '
                                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Transaksi</a></li>
                                        ';
                                        break;
                                }
                            }
                            ?>

                        </ol>
                    </nav>
                </header>
                <?php if(!isset($page)) { ?>
                <div class="card col-md-4">
                    <div class="card-header fs-4 border-bottom">
                        Data Master
                    </div>
                    <div class="card-body">
                        <div class="row mt-3">
                            <a href="index.php?page=user" class="btn-md btn btn-primary col-sm-5">
                                <i class="bi bi-person-fill me-2"></i>User
                            </a>
                            <a href="index.php?page=barang" class="btn-md btn btn-primary offset-md-2 col-sm-5">
                                <i class="bi bi-box-fill me-2"></i>Barang
                            </a>
                        </div>
                        <div class="row mt-3">
                            <a href="index.php?page=pelanggan" class="btn-md btn btn-primary col-sm-12">
                                <i class="bi bi-people-fill me-2"></i>Pelanggan
                            </a>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php if (isset($page)) {
                    switch ($page) {
                        case 'user':
                            include 'page/user.php';
                            break;
                        case 'pelanggan':
                            include 'page/pelanggan.php';
                            break;
                        case 'barang':
                            include 'page/barang.php';
                            break;
                        case 'transaksi':
                            include 'page/transaksi.php';
                            break;
                    }
                } ?>
            </div>
        </div>
        <script src="assets/js/bootstrap.js"></script>
        <script src="assets/js/app.js"></script>
        <script src="assets/js/script.js"></script>
        <script src="assets/js/pages/datatables.js"></script>
        <script src="assets/extensions/jquery/jquery.js"></script>
        <script src="assets/js/extensions/datatables.js"></script>
        <script src="assets/extensions/sweetalert2/sweetalert2.all.js"></script>
        <script src="assets/extensions/toastify-js/src/toastify.js"></script>
        <script src="assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.js"></script>
        <!-- Need: Apexcharts -->
        <script src="assets/extensions/apexcharts/apexcharts.min.js"></script>
        <script src="assets/js/pages/dashboard.js"></script>
        <script src="assets/extensions/parsleyjs/parsley.min.js"></script>
        <script src="assets/js/pages/parsley.js"></script>
        <script>
            function previewImage() {
                const image = document.querySelector('#image');
                const imgPreview = document.querySelector('.img-preview');

                imgPreview.style.display = 'block';

                const oFReader = new FileReader();
                oFReader.readAsDataURL(image.files[0]);

                oFReader.onload = function(oFREvent) {
                    imgPreview.src = oFREvent.target.result;
                }

            }

            function swalLogout() {
                Swal.fire({
                    title: "Logout",
                    text: "Apakah Kamu Ingin Logout?",
                    icon: "warning",
                    showConfirmButton: true,
                    confirmButtonText: "Logout",
                    confirmButtonColor: '#42ba96',
                    showCancelButton: true,
                    cancelButtonText: "Batal",
                    cancelButtonColor: '#DC3545',
                    customClass: {
                        confirmButton: 'me-1',
                        cancelButton: 'ms-1',
                    }
                }).then((response) => {
                    if (response.value) {
                        window.location.href = "auth/logout.php"
                    }
                })
            }

            function swalDelete(link) {
                Swal.fire({
                    title: "Hapus",
                    text: "Apakah Kamu Yakin Ingin Menghapus Data Ini?",
                    icon: "warning",
                    showConfirmButton: true,
                    confirmButtonText: "Hapus",
                    confirmButtonColor: '#42ba96',
                    showCancelButton: true,
                    cancelButtonText: "Batal",
                    cancelButtonColor: '#DC3545',
                    customClass: {
                        confirmButton: 'me-1',
                        cancelButton: 'ms-1',
                    }
                }).then((response) => {
                    if (response.value) {
                        window.location.href = link
                    }
                })
            }

            // function toastError(msg) {
            //     Toastify({
            //         text: msg,
            //         duration: 3000,
            //         close: true,
            //         style: {
            //             background: "#d9534f",
            //         }
            //     }).showToast();
            // }

            // function toastSuccess(msg) {
            //     Toastify({
            //         text: msg,
            //         duration: 3000,
            //         close: true,
            //         style: {
            //             background: "#5cb85c",
            //         }
            //     }).showToast();
            // }

            $(".btn-collapse").click(function() {
                const collapseId = $(this).attr("href")
                if ($(this).children("span").html() == 'Open Form') {
                    $(this).children("span").html('Close Form');
                } else {
                    $(this).children("span").html('Open Form');
                }
            });
        </script>

    </body>

</html>