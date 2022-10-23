<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <span data-feather="database"></span>
              Masterdata
              </a>
              <ul class="ms-3 dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="<?=base_url('buku/view')?>">Buku</a></li>
                <li><a class="dropdown-item" href="<?=base_url('coa/view')?>">COA</a></li>
                <li><a class="dropdown-item" href="<?=base_url('KategoriBuku/view')?>">Kategori Buku</a></li>
                <li><a class="dropdown-item" href="<?=base_url('pelanggan/view')?>">Pelanggan</a></li>
                <li><a class="dropdown-item" href="<?=base_url('supplier/view')?>">Supplier</a></li>
              </ul>
          </li>
          
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <span data-feather="shopping-cart"></span>
              Transaksi
              </a>
              <ul class="ms-3 dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="<?=base_url('penjualan/view')?>">Penjualan</a></li>
                <li><a class="dropdown-item" href="<?=base_url('pembelian/view')?>">Pembelian</a></li>
                <li><a class="dropdown-item" href="<?=base_url('Penyewaan/view')?>">Penyewaan</a></li>
                <li><a class="dropdown-item" href="<?=base_url('penggajian/view')?>">Penggajian</a></li>
                <li><a class="dropdown-item" href="<?=base_url('returpenjualan/view')?>">Retur Penjualan</a></li>
              </ul>
          </li>

          <li class="nav-item">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <span data-feather="file"></span>
              Laporan
              </a>
              <ul class="ms-3 dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="<?=base_url('laporan/bukubesar')?>">Buku Besar</a></li>
            <li><a class="dropdown-item" href="<?=base_url('laporan/jurnalumum')?>">Jurnal Umum</a></li>
                
              </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="pie-chart"></span>
              Grafik
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="bar-chart"></span>
              Analisis Data
            </a>
          </li>

        </ul>
        

      </div>
    </nav>