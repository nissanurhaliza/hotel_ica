<?= $this->extend('Dashboard'); ?>
<?= $this->section('content'); ?>

<div class="container-sm">
    <div class="row">
        <div class="col-8 justify-content-center">
            <form action="/petugas/kamar/add" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <h1 class="display-6">Tambah Kamar</h1>
                    <hr>
                    <label for="NoKamar" class="form-label">No.Kamar</label>
                    <input type="text" class="form-control" name="no_kamar" id="" placeholder="Masukkan nomor kamar">
                </div>

                <label for="" class="form-label mt-3">Tipe Kamar</label>
                <select class=" form-control" name="tipe_kamar" id="">
                    <?php foreach ($tipe_kamar as $row) : ?>
                        <option value="<?= $row['id'] ?>"><?= $row['tipe'] ?></option>
                    <?php endforeach ?>
                </select>

                <button type="submit" class="btn btn-primary mt-3">Kirim</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>