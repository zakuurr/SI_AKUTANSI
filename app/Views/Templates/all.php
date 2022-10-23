<!-- include header -->
<?= $this->include('Templates/HeaderBootstrap'); ?>
<!-- akhir include header -->

<!-- Side Bar -->
<?= $this->include('Templates/SidebarBootstrap'); ?>
<!-- Akhir Side Bar -->

<!-- Tempat Konten yang berbeda-beda akan diisi dari halaman yang memanggilnya -->
<?= $this->renderSection('konten'); ?>
<!-- Akhir Tempat Konten yang berbeda-beda -->

<!-- Footer -->
<?= $this->include('Templates/FooterBootstrap'); ?>
<!-- Akhir Footer -->