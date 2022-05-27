<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<div class="container-fluid mx-4">
    <h2>Data Fasilitas Kamar</h2>

    <p>
        <a href="/petugas/fkamar/tambah" class="btn btn-primary
    btn-sm">Tambah Fasilitas Kamar</a>
    </p>
    <table class="table table-sm table-hovered">
        <thead class="bg-light text-center">
            <tr>
                <th>No</th>
                <th>Nama Fasilitas Kamar</th>
                <th>Tipe Kamar</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php
            $htmlData = null;
            $nomor = null;
            foreach ($ListFKamar as $row) {
                $nomor++;
                $htmlData = '<tr>';
                $htmlData .= '<td>' . $nomor . '</td>';
                $htmlData .= '<td>' . $row['nama_fkamar'] . '</td>';
                $htmlData .= '<td>' . $row['tipe'] . '</td>';
                $htmlData .= '<td>' . $row['deskripsi'] . '</td>';
                $htmlData .= '<td class="text-center">';
                $htmlData .= '<a href="/petugas/fkamar/edit/' . $row['id_fkamar'] . '" class="btn btn-info btn-sm mr-1">Edit</a>';
                $htmlData .= '<a href="/petugas/fkamar/hapus/' . $row['id_fkamar'] . '" class="btn btn-danger btn-sm">Hapus</a>';
                $htmlData .= '</td>';

                $htmlData .= '</tr>';
                echo $htmlData;
            } ?>
        </tbody>
    </table>
</div>
<?php echo $this->endSection(); ?>