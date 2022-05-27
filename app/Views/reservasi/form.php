<?= $this->extend('Dashboard'); ?>
<?= $this->section('content'); ?>

<div class="container-sm">
    <div class="row">
        <div class="col-8 justify-content-center">
            <form action="/petugas/resepsionis/simpan" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <h1 class="display-6">Form Reservasi</h1>
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

                    <button type="submit" class="btn btn-primary mt-3">Kirim</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>