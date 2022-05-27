<?=$this->include('Layout/Header');?>
<!-- Awal Konten Aplikasi -->
<main role="main" class="flex-shrink-0">
<div class="container-fluid">
    <h1 class="display-6 text-success"><marquee>Selamat Datang di Meitos Hotel </marquee><strong><?=
    session()->get('nama_petugas'); ?></strong>
    </h1>
<?= $this->renderSection('content') ?>
</div>
</main>
<?=$this->include('Layout/Footer');?>