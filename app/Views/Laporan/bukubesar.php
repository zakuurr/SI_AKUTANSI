<!-- Tambahan Extend Layout -->
<?= $this->extend('Templates/all');  ?>
<!-- Akhir Tambahan Extend Layout -->

<!-- Awal section konten -->
<?= $this->Section('konten');  ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Buku Besar</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
      </div>

      <canvas class="my-4 w-100" id="myChart" width="900" height="380" hidden></canvas>

      <div class="alert alert-success" role="alert">
          <?php 
            $session = session();
            echo "Selamat datang ".$session->get('user_name');
          ?>
      </div>

    <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Buku Besar (Pilih Periode Buku Besar)
                    </div>
                    <div class="card-body">
                        <!-- Awal dari Pilihan Tahun dan Bulan -->
                       
                            
                        <div class="form-group">
   <div class="input-group col-sm-5">
      <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
      <input type="month" id="vtanggal" class="form-control">
      <select name="" id="akun">
          <option value="Kas">Kas</option>
          <option value="Penyewaan">Penyewaan</option>
      </select>
      <span class="input-group-btn">
      <button id="tampil" class="btn btn-success" type="button"><i class="fa fa-search fa-fw"></i> Tampil</button>
      </span>
   </div>
</div>
                            
                      
                        <!-- Akhir dari Pilihan Tahun dan Bulan -->
                                        
                        <!-- Untuk Tempat Jurnal Umum -->
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center" id="header_kategori">Kategori Buku</div>
                                        <div class="text-center" id="judul"><b>Buku Besar</b></div>
                                        <div class="text-center" id="periode">Periode</div>
                                        <div id="tampil_transaksi" class="row"></div>    
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <!-- Akhir Tempat Jurnal Umum -->

                    </div>
                </div>
            </div>
    </div>        

      
    </main>
  </div>
</div>

    <!-- Script aktivasi Data Tables -->
    <script>
              $(function(){
    $("#tampil").click(function(){
       var vtanggal = $("#vtanggal").val();
       var akun = $("#akun").val();
       $.ajax({
          url:"<?php echo site_url('laporan/ambildatabukubesar');?>",
          type:"POST",
          data:"vtanggal="+vtanggal+"&akun="+akun,
          cache:false,
          success:function(html){
          $("#tampil_transaksi").html(html);
          }
       })
        })
     
   })
</script>
    <!-- Akhir script aktivasi data tables -->

      

<?= $this->endSection('konten');  ?>
<!-- Akhir section konten -->    