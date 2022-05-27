<?= $this->extend('Dashboard'); ?>

<?= $this->section('content'); ?>

<div class="container-sm">
    <div class="row">
        <div class="col-8 justify-content-center">
            <h1 class="display-6">Tambah fasilitas Kamar</h1>
            <hr>
            <form action="/petugas/fkamar/add" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <label for="Namafkamar" class="form-label">Nama Fasilitas Kamar</label>
                    <input type="text" class="form-control " name="nama_fkamar" id="" placeholder="Masukkan nama fasilitas kamar" value="<?= old('no_kamar'); ?>">
                </div>
                <div class="form-group">
                    <label for="Namafkamar" class="form-label">Tipe Kamar</label>
                    <select class="form-control " name="tipe_kamar" id="">
                        <?php foreach ($tipe_kamar as $tipe) : ?>
                            <option value="<?= $tipe['id']; ?>"><?= $tipe['tipe']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mt-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Tambahkan deskripsi" name="deskripsi"></textarea>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Kirim</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>