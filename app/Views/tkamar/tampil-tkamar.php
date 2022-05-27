<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<div class="container-fluid mx-4">
    <h2>Data Tipe Kamar</h2>

    <p>
        <a href="/petugas/tkamar/tambah" class="btn btn-primary btn-sm">Tambah Tipe Kamar</a>
    </p>
    <table class="table table-sm table-hovered">
        <thead class="bg-light text-center">
            <tr>
                <th>No</th>
                <th>Tipe Kamar</th>
                <th>Harga</th>
                <th>Foto</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php
            $htmlData = null;
            $nomor = null;
            foreach ($Listtkamar as $row) {
                $nomor++;
                $htmlData = '<tr>';
                $htmlData .= '<td>' . $nomor . '</td>';
                $htmlData .= '<td>' . $row['tipe'] . '</td>';
                $htmlData .= '<td>' . $row['harga'] . '</td>';
                $htmlData .= '<td><img src="/gambar/' . $row['foto'] . '" width="300px"></td>';
                $htmlData .= '<td>' . $row['deskripsi'] . '</td>';
                $htmlData .= '<td class="text-center">';
                $htmlData .= '<a href="/petugas/tkamar/edit/' . $row['id'] . '" class="btn btn-info btn-sm mr-1">Edit</a>';
                $htmlData .= '<a href="/petugas/tkamar/hapus/' . $row['id'] . '" class="btn btn-danger btn-sm">Hapus</a>';
                $htmlData .= '</td>';

                $htmlData .= '</tr>';
                echo $htmlData;
            } ?>
        </tbody>
    </table>
</div>
<?php echo $this->endSection(); ?>