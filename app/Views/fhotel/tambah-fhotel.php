<?= $this->extend('Dashboard'); ?>

<?= $this->section('content'); ?>

<div class="container-sm">
    <div class="row">
        <div class="col-8 justify-content-center">
            <h1 class="display-6">Tambah fasilitas Hotel</h1>
            <hr>
            <form action="/petugas/fhotel/add" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <label for="Namafhotel" class="form-label">Nama Fasilitas Hotel</label>
                    <input type="text" class="form-control " name="nama_fasilitas_hotel" id="" placeholder="Masukkan nama fasilitas hotel">
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