<?= $this->extend('Dashboard'); ?>

<?= $this->section('content'); ?>

<div class="container-sm">
    <div class="row">
        <div class="col-8 justify-content-center">
            <form action="/petugas/fkamar/update/<?= $detailfkamar['id_fkamar'] ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <h1 class="display-6">Edit fasilitas Kamar</h1>
                    <hr>
                    <label for="Namafasilitas" class="form-label">Nama Fasilitas</label>
                    <input type="text" class="form-control" name="nama_fkamar" value="<?= $detailfkamar['nama_fkamar'] ?>">
                </div>

                <div class="form-group">
                    <label for="Namafkamar" class="form-label">Tipe Kamar</label>
                    <select class="form-control " name="tipe_kamar" id="">
                        <?php foreach ($tipe_kamar as $row) : ?>
                            <option <?= $detailfkamar['id_tipe_kamar'] == $row['id'] ? 'selected' : null; ?> value="<?= $row['id'] ?>"><?= $row['tipe'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mt-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                    <textarea type="text" class="form-control" rows="3" name="deskripsi"><?= $detailfkamar['deskripsi'] ?></textarea>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Kirim</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>