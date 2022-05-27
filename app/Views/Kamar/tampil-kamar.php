<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Data Kamar</h2>
<p>
    <a href="/petugas/kamar/tambah" class="btn btn-primary
    btn-sm">Tambah Kamar</a>
</p>
<table class="table table-sm table-hovered">
    <thead class="bg-light text-center">
        <tr>
            <th>No</th>
            <th>No Kamar</th>
            <th>tipe Kamar</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor = 1; ?>
        <?php foreach ($ListKamar as $row) : ?>
            <tr>
                <!-- hijau -> success -->
                <!-- Biru cerah -> info -->
                <!-- Biru -> primary -->
                <!-- Kuning -> warning -->
                <!-- Merah -> Danger -->
                <td class="text-center"><?= $nomor++ ?></td>
                <td class="text-center"><?= $row['no_kamar'] ?></td>
                <td class="text-center"><?= $row['tipe'] ?></td>
                <td class="text-center"><?= $row['status'] ?></td>
                <td class="text-center">
                    <a href="/petugas/kamar/edit/<?= $row['id_kamar'] ?>" class="btn btn-info btn-sm mr-1">Edit</a>
                    <a href="/petugas/kamar/hapus/<?= $row['id_kamar'] ?>" class="btn btn-danger btn-sm mr-1" onclick="return confirm('Apakah Anda yakin akan menghapusnya?')">Hapus</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?php echo $this->endSection(); ?>