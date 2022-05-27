<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<div class="container-fluid mx-4">
    <h2>Data Fasilitas Hotel</h2>

    <p>
        <a href="/petugas/fhotel/tambah" class="btn btn-primary btn-sm">Tambah Fasilitas Hotel</a>
    </p>
    <table class="table table-sm table-hovered">
        <thead class="bg-light text-center">
            <tr>
                <th>No</th>
                <th>Nama Fasilitas</th>
                <th>Deskripsi</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $htmlData = null;
            $nomor = null;
            foreach ($ListFhotel as $row) {
                $nomor++;
                $htmlData = '<tr class="text-center">';
                $htmlData .= '<td>' . $nomor . '</td>';
                $htmlData .= '<td>' . $row['nama_fasilitas_hotel'] . '</td>';
                $htmlData .= '<td>' . $row['deskripsi'] . '</td>';
                $htmlData .= '<td><img src="/gambar/' . $row['foto'] . '" width="300px"></td>';
                $htmlData .= '<td class="text-center">';
                $htmlData .= '<a href="/petugas/fhotel/edit/' . $row['id_hotel'] . '" class="btn btn-info btn-sm mr-1">Edit</a>';
                $htmlData .= '<a href="/petugas/fhotel/hapus/' . $row['id_hotel'] . '" class="btn btn-danger btn-sm">Hapus</a>';
                $htmlData .= '</td>';

                $htmlData .= '</tr>';
                echo $htmlData;
            } ?>
        </tbody>
    </table>
</div>
<?php echo $this->endSection(); ?>