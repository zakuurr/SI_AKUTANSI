<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?= esc($title) ?></h1>
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

      <!-- Looping data kategori -->
      <?php 
        foreach ($datakategoribuku as $row) {
            $id_kategori = $row->id_kategori; 
            $nama_kategori = $row->nama_kategori; 
            $foto = $row->foto; 
            $nomor_rak = $row->nomor_rak;
        }
      ?>
      <!-- Akhir looping data kategori -->

      <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->
      <br>
      <!-- Tambahan untuk Input Form -->
      <form class="row g-3" action="<?=base_url('KategoriBuku/update')?>" method="post" enctype="multipart/form-data"> 
            <?= csrf_field() ?>
            <div class="mb-3 row">
                <label for="id" class="col-sm-2 col-form-label">ID Kategori</label>
                <div class="col-sm-10">
                <input type="text" id="id_kategori" name="id_kategori" class="form-control" value="<?=$id_kategori?>" readonly>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama_kategori" class="col-sm-2 col-form-label">Nama Kategori</label>
                <div class="col-sm-10">
                    <?php
                        //jika set value nama_kategori tidak kosong maka isi $nama_kategori diganti dengan isian dari user
                        if(strlen(set_value('nama_kategori'))>0){
                          $nama_kategori = set_value('nama_kategori');
                        }
                    ?>
                    <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="<?=$nama_kategori?>" placeholder="Masukkan Nama Kategori, cth: Bambang">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="foto" class="col-sm-2 col-form-label">Upload foto</label>
                <div class="col-sm-10">
                <input type="file" class="form-control" id="foto" name="foto" >
                </div> <br><br><br>
                <div class="mb-3 row">
                <label for="nomor_rak" class="col-sm-2 col-form-label">Nomor Rak</label>
                <div class="col-sm-10">
                    <?php
                        //jika set value nama_kategori tidak kosong maka isi $nama_kategori diganti dengan isian dari user
                        if(strlen(set_value('nomor_rak'))>0){
                          $nama_kategori = set_value('nomor_rak');
                        }
                    ?>
                    <input type="text" class="form-control" id="nomor_rak" name="nomor_rak" value="<?=$nomor_rak?>" placeholder="Masukkan Nomor Rak, cth: 1A">
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-sm-5"></div>
                <input class="col-sm-1 btn btn-info" type="submit" value="Ubah">
                <div class="col-sm-5"></div>
            </div>

            <div class="mb-3 row">
                <?php
                    if(isset($validation)){
                ?>
                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                        <div>
                            <?=$validation->listErrors();?>
                        </div>
                    </div>
                <?php
                    }
                ?>
            </div>
            
        </form>
      <!-- Akhir tambahan untuk card -->
        

    </main>
  </div>
</div>


