<?= $this->extend('Dashboard'); ?>

<?= $this->section('content'); ?>

<div class="container-sm">
    <div class="row">
        <div class="col-8 justify-content-center">
            <form action="/petugas/tkamar/update/<?= $detailtkamar['id'] ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <h1 class="display-6">Edit Tipe Kamar</h1>
                    <hr>
                    <label for="Namafasilitas" class="form-label">Tipe Kamar</label>
                    <input type="text" class="form-control" name="tipekamar" value="<?= $detailtkamar['tipe'] ?>">
                </div>
                <div class="mt-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Harga</label>
                    <textarea type="text" class="form-control" rows="3" name="harga"><?= $detailtkamar['harga'] ?></textarea>
                </div>
                <img src="/gambar/<?= $detailtkamar['foto'] ?>" alt="">
                <div class="form-group">
                    <label for="" class="form-label mt-3">Foto</label>
                    <input type="file" class="form-control" name="foto" id="" aria-describedby="emailHelpId" placeholder="">
                </div>
                <div class="mt-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                    <textarea type="text" class="form-control" rows="3" name="deskripsi"><?= $detailtkamar['deskripsi'] ?></textarea>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Kirim</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>