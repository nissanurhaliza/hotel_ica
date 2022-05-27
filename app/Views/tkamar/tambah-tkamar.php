<?= $this->extend('Dashboard'); ?>
<?= $this->section('content'); ?>

<div class="container-sm">
    <div class="row">
        <div class="col-8 justify-content-center">
            <h1 class="display-6">Tambah Tipe Kamar</h1>
            <hr>
            <form action="/petugas/tkamar/add" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <!-- <div class="form-group">
                    <label for="Namatkamar" class="form-label">Nama Tipe Kamar</label>
                    <input type="text" class="form-control " name="nama_fkamar" id="" placeholder="Masukkan nama fasilitas kamar" value="<?= old('no_kamar'); ?>">
                </div> -->
                <div class="form-group">
                    <label for="Namafkamar" class="form-label">Tipe Kamar</label>
                    <input type="text" class="form-control" name="tipe_kamar" id="" aria-describedby="emailHelpId" placeholder="">
                </div>
                <div class="form-group">
                    <label for="Namafkamar" class="form-label">Harga</label>
                    <input type="number" class="form-control" name="harga" id="" aria-describedby="emailHelpId" placeholder="">
                </div>
                <div class="form-group">
                    <label for="" class="form-label mt-3">Foto</label>
                    <input type="file" class="form-control" name="foto" id="" aria-describedby="emailHelpId" placeholder="">

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