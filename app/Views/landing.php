<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>MaitosHotel</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="/landing/assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="/landing/css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#!">MeitosHotel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#fasilitas-hotel">Fasilitas Hotel</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tipe-kamar">Tipe Kamar</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Header-->
    <header class="bg-dark pb-5" id="home">
        <div class="container px-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-6">
                    <div class="text-center my-5">
                        <?php if ($pesan = session('pesan-danger')) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?= $pesan ?>
                            </div>
                        <?php endif ?>
                        <h1 class="display-5 fw-bolder text-white mb-2">SELAMAT DATANG DI MAITOS HOTEL</h1>
                        <p class="lead text-white-50 mb-4">Hotel dengan fasilitas beragam dari yang terjangkau sampai yang mewah</p>
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                            <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#features" data-bs-toggle="modal" data-bs-target="#modalpesankamar">Pesan</a>
                            <!-- <a class="btn btn-outline-light btn-lg px-4" href="#tipe-kamar">Tipe Kamar</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Features section-->
    <section class="py-5 border-bottom" id="fasilitas-hotel">
        <div class="container px-5 my-5">
            <div class="text-center mb-5">
                <h2 class="fw-bolder">Fasilitas Hotel</h2>
                <p class="lead mb-0">Pilih tipe kamar sesuai yang anda mau</p>
            </div>
            <div class="container px-5 my-5">
                <div class="row gx-5">
                    <?php foreach ($fasilitas_hotel as $fhotel) : ?>
                        <div class="col-lg-4 mb-5 mb-lg-0">
                            <img src="http://localhost:8080/gambar/<?= $fhotel['foto'] ?>" alt="ini adalah gambar" class="card-img-top">
                            <h2 class="h4 fw-bolder"><?= $fhotel['nama_fasilitas_hotel'] ?></h2>
                            <p><?= $fhotel['deskripsi'] ?></p>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
    </section>
    <!-- Pricing section-->
    <section class="bg-light py-5 border-bottom" id="tipe-kamar">
        <div class="container px-5 my-5">
            <div class="text-center mb-5">
                <h2 class="fw-bolder">Tipe Kamar</h2>
                <p class="lead mb-0">Pilih tipe kamar sesuai yang anda mau</p>
            </div>
            <div class="row gx-5 justify-content-center">
                <!-- Pricing card free-->
                <?php foreach ($tipe_kamar as $tipekamar) : ?>
                    <div class="col-lg-6 col-xl-4">
                        <div class="card mb-5 mb-xl-0">
                            <img src="http://localhost:8080/gambar/<?= $tipekamar['foto'] ?>" alt="ini adalah gambar" class="card-img-top">
                            <div class="card-body pt-3 pb-5 px-5">
                                <div class="small text-uppercase fw-bold text-muted"><?= $tipekamar['tipe'] ?></div>
                                <div class="mb-3">
                                    <span class="display-7 fw-bold">Rp. <?= $tipekamar['harga'] ?></span>
                                    <span class="text-muted">/ Malam</span>
                                    <p><?= $tipekamar['deskripsi'] ?></p>
                                </div>
                                <ul class="list-unstyled mb-4">
                                    <?php foreach ($tipekamar['fasilitas'] as $fasilitas) : ?>
                                        <li class="mb-2">
                                            <i class="bi bi-check text-primary"></i>
                                            <?= $fasilitas['nama_fkamar'] ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                                <div class="d-grid"><button type="button" data-bs-toggle="modal" data-bs-target="#modalpesankamar" class="btn btn-outline-primary">Pesan Kamar</button></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>

    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container px-5">
            <p class="m-0 text-center text-white">Copyright &copy; website ica 2022</p>
        </div>
    </footer>

    <!-- Modal -->
    <div class="modal fade" id="modalpesankamar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Pesan Kamar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="/pesan" id="form_pesan">
                        <div class="row mb-3">
                            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Anda">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Masukan Email Anda">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nik" class="col-sm-3 col-form-label">Nik</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukan Nik Anda">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tipekamar" class="col-sm-3 col-form-label">Tipe Kamar</label>
                            <div class="col-sm-9">
                                <select id="tipekamar" class="form-select" name="tipekamar">
                                    <?php foreach ($tipe_kamar as $tipekamar) : ?>
                                        <option value="<?= $tipekamar['id'] ?>"><?= $tipekamar['tipe'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="cekin" class="col-sm-3 col-form-label">Cek In</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="cekin" name="cekin">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="cekout" class="col-sm-3 col-form-label">Cek Out</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="cekout" name="cekout">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="jumlahkamar" class="col-sm-3 col-form-label">Jumlah Kamar</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="jumlahkamar" name="jumlahkamar" placeholder="Masukan Jumlah Kamar">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                    <button type="button" class="btn btn-primary" onclick="document.getElementById('form_pesan').submit()">Pesan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="/landing/js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>