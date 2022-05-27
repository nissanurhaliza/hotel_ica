<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<div class="container-fluid mx-4">
    <h2>Data Resrvasi</h2>
    <p></p>
    <div class="form-row mb-3">
        <div class="col-auto">
            <form action="" method="get">
                <div class="form-row">
                    <div class="col-auto">
                        <input name="keywoard" type="text" class="form-control" placeholder="cari nama" />
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i>cari</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-auto">
            <form action="" method="get">
                <div class="form-row">
                    <div class="col-auto">
                        <input name="checkin" type="date" class="form-control" placeholder="cari tanggal" />
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-calendar3-week-fill">cari</i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <table class="table table-sm table-hovered">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Email</th>
                <th>nik</th>
                <th>Cek-in</th>
                <th>Cek-out</th>
                <th>Jumlah Kamar</th>
                <th>Harga/Malam</th>
                <th>Total</th>
                <th>Status</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $htmlData = null;
            $nomor = null;
            foreach ($Listreservasi as $row) {
                $nomor++;
                $htmlData = '<tr>';
                $htmlData .= '<td class="text-center">' . $nomor . '</td>';
                $htmlData .= '<td class="text-center">' . $row['nama_tamu'] . '</td>';
                $htmlData .= '<td class="text-center">' . $row['email_tamu'] . '</td>';
                $htmlData .= '<td class="text-center">' . $row['nik'] . '</td>';
                $htmlData .= '<td class="text-center">' . $row['checkin'] . '</td>';
                $htmlData .= '<td class="text-center">' . $row['checkout'] . '</td>';
                $htmlData .= '<td class="text-center">' . $row['jml_kamar'] . '</td>';
                $htmlData .= '<td class="text-center">' . $row['harga'] . '</td>';
                $htmlData .= '<td class="text-center">' . $row['total'] . '</td>';
                $htmlData .= '<td class="text-center">' . $row['status'] . '</td>';

                $htmlData .= '<td class="text-center">';
                $htmlData .= '<a href="/petugas/reservasi/cekin/' . $row['id_reservasi'] . '" class="btn btn-info btn-sm mr-1">cekin</a>';
                $htmlData .= '<a href="/petugas/reservasi/cekout/' . $row['id_reservasi'] . '" class="btn btn-danger btn-sm mr-1">cekout</a>';
                $htmlData .= '<a href="/petugas/reservasi/update/' . $row['id_reservasi'] . '" class="btn btn-warning btn-sm mr-1">update</a>';
                $htmlData .= '<a href="/petugas/reservasi/hapus/' . $row['id_reservasi'] . '" class="btn btn-danger btn-mt-4">batal</a>';

                $htmlData .= '</td>';

                $htmlData .= '</tr>';
                echo $htmlData;
            } ?>
        </tbody>
    </table>
</div>
<?php echo $this->endSection(); ?>