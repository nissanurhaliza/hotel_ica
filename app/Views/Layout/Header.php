<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,
    initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Web pemesanan Hotel">
    <meta name="author" content="Icaaa">
    <title>Pemesanan Hotel</title>
    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/fontawesome/css/all.min.css">
    <meta name="theme-color" content="#563d7c">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        /* Custom page CSS
    -------------------------------------------------- */
        /* Not required for template or sticky footer method. */
        main>.container {
            padding: 60px 25px 0;
        }

        .footer {
            background-color: #f5f5f5;
        }

        .footer>.container {
            padding-right: 25px;
            padding-left: 25px;
        }

        code {
            font-size: 80%;
        }
    </style>
    <!-- Custom styles for this template -->
</head>

<body class="d-flex flex-column h-100">
    <header>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-expand-md navbar-dark
        fixed-top bg-info">
            <a class="navbar-brand" href="#">MeitosHotel</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <!-- Dropdown -->
                    <?php if (session()->get('level') == 'admin') { ?>
                        <li class="nav-item ">
                            <a class="nav-link" href="/petugas/kamar">Kamar</a>
                        </li>
                    <?php } ?>
                    <?php if (session()->get('level') == 'admin') { ?>
                        <li class="nav-item ">
                            <a class="nav-link" href="/petugas/fkamar/tampil">Fasilitas Kamar</a>
                        </li>
                    <?php } ?>
                    <?php if (session()->get('level') == 'admin') { ?>
                        <li class="nav-item ">
                            <a class="nav-link" href="/petugas/fhotel/tampil">Fasilitas Hotel</a>
                        </li>
                    <?php } ?>
                    <?php if (session()->get('level') == 'admin') { ?>
                        <li class="nav-item ">
                            <a class="nav-link" href="/petugas/tkamar/tampil">Tipe Kamar</a>
                        </li>
                    <?php } ?>
                    <?php if (session()->get('level') == 'resepsionis') { ?>
                        <li class="nav-item ">
                            <a class="nav-link" href="/petugas/reservasi/data">Data Reservasi</a>
                        </li>
                    <?php } ?>
                    <?php if (session()->get('level') == 'resepsionis') { ?>
                        <li class="nav-item ">
                            <a class="nav-link" href="/petugas/reservasi/form">Form Reservasi</a>
                        </li>
                    <?php } ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/petugas/logout" OnClick="return confirm('Anda Yakin ?')">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>