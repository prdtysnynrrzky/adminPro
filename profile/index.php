<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

require '../services/koneksi.php';

include 'edit.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../soft-ui/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../soft-ui/assets/img/favicon.png">
    <title>
        Produk - AdminPro MS
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="../soft-ui/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../soft-ui/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../soft-ui/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="../soft-ui/assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="g-sidenav-show  bg-gray-100">
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 "
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="/ams/">
                <img src="../soft-ui/assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold">AdminPro (MS)</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/ams">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>shop </title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(0.000000, 148.000000)">
                                                <path class="color-background opacity-6"
                                                    d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../produk/index.php">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>office</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g id="office" transform="translate(153.000000, 2.000000)">
                                                <path class="color-background opacity-6"
                                                    d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Produk</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../kategori/index.php">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>credit-card</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(453.000000, 454.000000)">
                                                <path class="color-background opacity-6"
                                                    d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Kategori</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../penjualan/index.php">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>box-3d-50</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-2319.000000, -291.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(603.000000, 0.000000)">
                                                <path class="color-background"
                                                    d="M22.7597136,19.3090182 L38.8987031,11.2395234 C39.3926816,10.9925342 39.592906,10.3918611 39.3459167,9.89788265 C39.249157,9.70436312 39.0922432,9.5474453 38.8987261,9.45068056 L20.2741875,0.1378125 L20.2741875,0.1378125 C19.905375,-0.04725 19.469625,-0.04725 19.0995,0.1378125 L3.1011696,8.13815822 C2.60720568,8.38517662 2.40701679,8.98586148 2.6540352,9.4798254 C2.75080129,9.67332903 2.90771305,9.83023153 3.10122239,9.9269862 L21.8652864,19.3090182 C22.1468139,19.4497819 22.4781861,19.4497819 22.7597136,19.3090182 Z">
                                                </path>
                                                <path class="color-background opacity-6"
                                                    d="M23.625,22.429159 L23.625,39.8805372 C23.625,40.4328219 24.0727153,40.8805372 24.625,40.8805372 C24.7802551,40.8805372 24.9333778,40.8443874 25.0722402,40.7749511 L41.2741875,32.673375 L41.2741875,32.673375 C41.719125,32.4515625 42,31.9974375 42,31.5 L42,14.241659 C42,13.6893742 41.5522847,13.241659 41,13.241659 C40.8447549,13.241659 40.6916418,13.2778041 40.5527864,13.3472318 L24.1777864,21.5347318 C23.8390024,21.7041238 23.625,22.0503869 23.625,22.429159 Z">
                                                </path>
                                                <path class="color-background opacity-6"
                                                    d="M20.4472136,21.5347318 L1.4472136,12.0347318 C0.953235098,11.7877425 0.352562058,11.9879669 0.105572809,12.4819454 C0.0361450918,12.6208008 6.47121774e-16,12.7739139 0,12.929159 L0,30.1875 L0,30.1875 C0,30.6849375 0.280875,31.1390625 0.7258125,31.3621875 L19.5528096,40.7750766 C20.0467945,41.0220531 20.6474623,40.8218132 20.8944388,40.3278283 C20.963859,40.1889789 21,40.0358742 21,39.8806379 L21,22.429159 C21,22.0503869 20.7859976,21.7041238 20.4472136,21.5347318 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Penjualan</span>
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 46 42" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>customer-support</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(1.000000, 0.000000)">
                                                <path class="color-background opacity-6"
                                                    d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Profile</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">#</a>
                        </li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Profile</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    </div>
                    <ul class="navbar-nav  justify-content-end">
                        <li class="nav-item d-flex align-items-center gap-4">
                            <a href="index.php" class="nav-link text-body font-weight-bold px-0">
                                <?php
                                $queryUser = "SELECT * FROM admin";
                                $sqlUser = mysqli_query($conn, $queryUser);
                                if (mysqli_num_rows($sqlUser) > 0) {
                                    while ($row = mysqli_fetch_object($sqlUser)) {
                                        ?>
                                                <span class="d-sm-inline d-none fw-bold mx-2">
                                                    <?= $row->username ?>
                                                </span>
                                                <img src="img/<?= $row->image ?>" alt="avatar" class="rounded-circle" width="30"
                                                    height="30">
                                        <?php }
                                }
                                ?>
                            </a>
                            <a class="btn btn-sm btn-secondary bg-gradient-secondary text-sm mb-0"
                                href="/ams/logout.php" role="tab">
                                <span class="ms-1">Logout</span>
                                <svg class="bi bi-box-arrow-right" width="1em" height="1em" viewBox="0 0 16 16"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M11.854 8.354a.5.5 0 0 0 0-.708L9.207 4.793a.5.5 0 1 1 .707-.708l3.5 3.5a.5.5 0 0 1 0 .708l-3.5 3.5a.5.5 0 1 1-.707-.708l2.647-2.647H2.5a.5.5 0 0 1 0-1h11.854l-2.646-2.646a.5.5 0 0 1 .708-.708l3.5 3.5z" />
                                    <path fill-rule="evenodd"
                                        d="M12 1a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0V2.707l-8.146 8.147a.5.5 0 0 1-.708-.708L11.293 2H9.5a.5.5 0 0 1 0-1H12z" />
                                </svg>
                            </a>
                        </li>
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->

        <?php
        $id_admin = $_SESSION['login'];

        $queryUser = "SELECT * FROM admin WHERE id_admin = $id_admin";
        $resultUser = mysqli_query($conn, $queryUser);

        if ($resultUser && mysqli_num_rows($resultUser) > 0) {
            $row = mysqli_fetch_object($resultUser);
            ?>
                <div class="container-fluid">
                    <div class="page-header min-height-300 border-radius-xl mt-4"
                        style="background-image: url('../soft-ui/assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
                        <span class="mask bg-gradient-primary opacity-6"></span>
                    </div>
                    <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
                        <div class="row gx-4">
                            <div class="col-auto">
                                <div class="avatar avatar-xl position-relative">
                                    <img src="img/<?= $row->image ?>" alt="profile_image"
                                        class="w-100 border-radius-lg shadow-sm">
                                </div>
                            </div>
                            <div class="col-auto my-auto">
                                <div class="h-100">
                                    <h5 class="mb-1">
                                        <?= $row->username ?>
                                    </h5>
                                    <p class="mb-0 font-weight-bold text-sm">
                                        <?= $row->email ?>
                                    </p>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto ml-auto mt-3">
                                <div class="nav-wrapper position-relative end-0">
                                    <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link mb-0 px-0 py-1 cursor-pointer" data-bs-toggle="modal"
                                                data-bs-target="#modalEdit<?= $row->id_admin ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" id="setting">
                                                    <path fill="#999"
                                                        d="M0.873095197,5.16335138 C1.07736478,5.12378632 1.28935874,5.16536248 1.46214576,5.27887571 C1.80346964,5.50552363 1.90243476,5.95394091 1.68701228,6.29776021 L1.68701228,6.29776021 L1.63049727,6.40886656 C1.41692137,6.89799239 1.60769048,7.47656916 2.09177201,7.74703557 C2.4834486,7.98141148 2.80584873,8.31137851 3.02721671,8.70443566 C3.71653222,9.94093426 3.28873846,11.4881571 2.05579336,12.2178305 C1.5344748,12.509102 1.35332921,13.1577086 1.65103364,13.6671058 L1.65103364,13.6671058 L2.27166522,14.7123408 C2.41288109,14.9614196 2.65203322,15.1434682 2.93385106,15.2164131 C3.2156689,15.2893581 3.51576316,15.2468866 3.76477889,15.0988142 C4.16629362,14.8713997 4.62284123,14.7531186 5.086994,14.7562582 C6.57727817,14.7562582 7.7853922,15.9360086 7.7853922,17.3913043 C7.79033116,17.9796916 8.28018723,18.454126 8.88274079,18.4541063 L8.88274079,18.4541063 L8.87374613,18.4716733 C9.15331914,18.4716732 9.41165527,18.617322 9.55144177,18.8537549 C9.69122828,19.0901879 9.69122828,19.3814853 9.55144177,19.6179183 C9.41165527,19.8543513 9.15331914,20 8.87374613,20 C7.38346196,20 6.17534794,18.8202497 6.17534794,17.3649539 C6.17777146,17.1797208 6.12798477,16.9974041 6.03143337,16.8379447 C5.72964011,16.3277527 5.06266326,16.1511907 4.5383197,16.4426877 L4.5383197,16.4426877 L4.37846769,16.5211696 C3.14151143,17.0796422 1.65653771,16.647903 0.940455444,15.4940711 L0.940455444,15.4940711 L0.328818521,14.4488362 C-0.360496985,13.2123376 0.0672967775,11.6651148 1.30024187,10.9354414 C1.46365758,10.8415595 1.59986794,10.708547 1.69600694,10.5489679 C1.8763988,10.3034349 1.94122763,9.99452277 1.87427955,9.69949129 C1.80733148,9.40445982 1.61493722,9.15120776 1.34521517,9.00307422 L1.34521517,9.00307422 L1.1953131,8.90768859 C0.0785600264,8.14500505 -0.286802202,6.67465723 0.373791824,5.4896794 L0.373791824,5.4896794 L0.450399681,5.39452047 C0.561991749,5.27649703 0.709679528,5.19500342 0.873095197,5.16335138 Z M17.001622,7.70191857 C17.3561623,7.5776619 17.7596901,7.71242785 17.9583534,8.03689065 C18.1782389,8.39845653 18.057649,8.86556614 17.6885136,9.0821256 C17.5250979,9.17600748 17.3888875,9.30901995 17.2927485,9.46859903 C17.1461723,9.71295723 17.1055255,10.0043354 17.1798277,10.2780759 C17.2541299,10.5518165 17.4372357,10.7852791 17.6885136,10.9266579 C18.9613109,11.6716815 19.3792149,13.2805084 18.6239583,14.5278876 L18.6239583,14.5278876 L18.0123214,15.5731225 L17.9146425,15.7195053 C17.1336224,16.8100396 15.6279243,17.166824 14.4144571,16.5217391 C14.0779771,16.3233633 13.6576674,16.3192826 13.3172148,16.5110862 C12.9767623,16.7028897 12.7699918,17.0602538 12.7774289,17.4440053 C12.7343665,17.8367986 12.3949315,18.1346728 11.990396,18.1346728 C11.5858606,18.1346728 11.2464256,17.8367986 11.2033632,17.4440053 C11.2226877,16.5230894 11.7330478,15.6788723 12.5494071,15.217434 C13.3657664,14.7559956 14.3696134,14.7443234 15.1969926,15.1866491 C15.4455875,15.3326398 15.7442164,15.3738466 16.0245013,15.3008344 C16.3042857,15.2242105 16.542826,15.0447838 16.6901062,14.8001757 L16.6901062,14.8001757 L17.3017432,13.7549407 C17.4479092,13.5119249 17.4883234,13.2218682 17.4139597,12.9495514 C17.339596,12.6772345 17.1566491,12.4453424 16.9059781,12.3056653 C16.4844845,12.0548529 16.1445142,11.6924066 15.9255601,11.2604304 C15.2362446,10.0239318 15.6640383,8.47670896 16.8969834,7.74703557 L16.8969834,7.74703557 Z M9.49437772,6.70178889 C10.3905098,6.69946703 11.2507575,7.04546173 11.885264,7.6634236 C12.5197705,8.28138546 12.8763822,9.12051219 12.8763822,9.99560826 L12.8763822,9.99560826 L12.8707845,10.1950507 C12.7967374,11.4511365 11.9951527,12.5648103 10.7948548,13.0530599 C9.53138337,13.5670069 8.07525531,13.2866234 7.10614636,12.3427838 C6.13703741,11.3989442 5.84603609,9.97775434 6.36897286,8.74258193 C6.89190962,7.50740952 8.125672,6.70178889 9.49437772,6.70178889 Z M9.49437772,8.24769433 C8.50085494,8.24769433 7.69544559,9.03419455 7.69544559,10.0043917 C7.69544559,10.9745889 8.50085494,11.7610892 9.49437772,11.7610892 C10.4879005,11.7610892 11.2933098,10.9745889 11.2933098,10.0043917 L11.2933098,10.0043917 L11.2873464,9.86031524 C11.2122986,8.95751078 10.4382244,8.24769433 9.49437772,8.24769433 Z M10.1150093,-1.44328993e-13 C11.6052935,-1.44328993e-13 12.8134075,1.17975033 12.8134075,2.63504611 C12.810984,2.82027917 12.8607707,3.00259594 12.9573221,3.16205534 C13.1005848,3.4089241 13.3389912,3.58959879 13.6194445,3.66384036 C13.8998978,3.73808193 14.1991078,3.699725 14.4504357,3.55731225 C15.7166624,2.88418026 17.3010837,3.30193043 18.0483,4.50592885 C18.2548102,4.87335233 18.1278399,5.33443771 17.7604709,5.55116381 C17.3871594,5.75928058 16.9119889,5.6384028 16.6901062,5.27887571 L16.6901062,5.27887571 L16.6194327,5.1754002 C16.2908071,4.74960935 15.6817056,4.62034539 15.1969926,4.89240228 C14.3710046,5.3340714 13.3689751,5.32328725 12.553156,4.86394851 C11.7373368,4.40460977 11.2257575,3.56317174 11.2033632,2.6438296 C11.2131151,2.35592011 11.1027692,2.07647732 10.8975968,1.8694985 C10.6924243,1.66251968 10.4100019,1.54573627 10.1150093,1.54589372 L10.1150093,1.54589372 L8.88274079,1.54589372 C8.58696967,1.54580638 8.30368621,1.6623152 8.09709986,1.86901212 C7.8905135,2.07570904 7.77811912,2.35508982 7.7853922,2.6438296 C7.77705279,3.5681803 7.26506951,4.4181882 6.44181545,4.87447051 C5.61856138,5.33075283 4.6087325,5.32419777 3.79176287,4.85726834 L3.79176287,4.85726834 L3.75578423,4.82213439 L3.66924268,4.76137496 C3.37175784,4.52112323 3.29446603,4.09717449 3.50393374,3.76811595 C3.73244398,3.409143 4.21568958,3.29903296 4.58329301,3.5221783 C4.74737874,3.61567616 4.93305,3.66704793 5.12297264,3.67149758 C5.41407245,3.68338695 5.69806446,3.58174102 5.91234656,3.38896624 C6.12662867,3.19619145 6.2536083,2.92811463 6.26529455,2.6438296 C6.2597607,1.21544702 7.42066447,0.0428415621 8.88274079,-1.44328993e-13 L8.88274079,-1.44328993e-13 Z"
                                                        transform="translate(2.5 2)"></path>
                                                </svg>
                                                <span class="ms-1">Edit Profile</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link mb-0 px-0 py-1 " href="/ams/logout.php" role="tab">
                                                <svg class="bi bi-box-arrow-right" width="1em" height="1em" viewBox="0 0 16 16"
                                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M11.854 8.354a.5.5 0 0 0 0-.708L9.207 4.793a.5.5 0 1 1 .707-.708l3.5 3.5a.5.5 0 0 1 0 .708l-3.5 3.5a.5.5 0 1 1-.707-.708l2.647-2.647H2.5a.5.5 0 0 1 0-1h11.854l-2.646-2.646a.5.5 0 0 1 .708-.708l3.5 3.5z" />
                                                    <path fill-rule="evenodd"
                                                        d="M12 1a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0V2.707l-8.146 8.147a.5.5 0 0 1-.708-.708L11.293 2H9.5a.5.5 0 0 1 0-1H12z" />
                                                </svg>
                                                <span class="ms-1">Logout</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row gx-4 mt-4">
                        <div class="col">
                            <h3 class="mb-3">Riwayat Aktivitas</h3>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Aktivitas</th>
                                            <th>Tanggal / Waktu</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $queryLog = "SELECT log_aktivitas_admin.*, admin.username FROM log_aktivitas_admin INNER JOIN admin ON log_aktivitas_admin.id_admin = admin.id_admin";
                                        $resultLog = mysqli_query($conn, $queryLog);

                                        $count = 1;

                                        if (mysqli_num_rows($resultLog) > 0) {
                                            while ($rowLog = mysqli_fetch_assoc($resultLog)) {
                                                ?>
                                                        <tr>
                                                            <td>
                                                                <?= $rowLog['username'] ?>
                                                            </td>
                                                            <td>
                                                                <?= $rowLog['aktivitas'] ?>
                                                            </td>
                                                            <?php
                                                            date_default_timezone_set('Asia/Jakarta');

                                                            $waktu = new DateTime($rowLog['waktu']);
                                                            $waktu->setTimezone(new DateTimeZone('Asia/Jakarta'));

                                                            echo '<td>' . $waktu->format('d F Y / H:i') . ' WIB</td>';
                                                            ?>
                                                        </tr>
                                                        <?php
                                                        $count++;
                                            }
                                        } else {
                                            ?>
                                                <tr>
                                                    <td colspan="3">Belum ada aktivitas.</td>
                                                </tr>
                                                <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
        }
        ?>

    </main>
    <!--   Core JS Files   -->
    <script src="../soft-ui/assets/js/core/popper.min.js"></script>
    <script src="../soft-ui/assets/js/core/bootstrap.min.js"></script>
    <script src="../soft-ui/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../soft-ui/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../soft-ui/assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>

</html>