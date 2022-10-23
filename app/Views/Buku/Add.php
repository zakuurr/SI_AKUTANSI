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

      

      <canvas class="my-4 w-100" id="myChart" width="900" height="380" hidden></canvas>
      <br>
      <!-- Tambahan untuk Input Form -->
        <form class="row g-3" action="<?=base_url('buku/add')?>" method="post" enctype="multipart/form-data"> 
            <div class="mb-3 row">
                <label for="foto_buku" class="col-sm-2 col-form-label">Foto Buku</label>
                <div class="col-sm-10">
                <input type="file" class="form-control" id="foto_buku" name="foto_buku" >
                </div>
             </div>
             <div class="mb-3 row">
                <label for="judul_buku" class="col-sm-2 col-form-label">Judul Buku</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="judul_buku" name="judul_buku" value="<?= set_value('judul_buku')?>" placeholder="Masukkan Judul Buku, cth: 172 Days">
                <div id="errorjudul" class="invalid-feedback">
                </div>
                    <?php
                    if(isset($validation)){
                        if($validation->getError('judul_buku')){?>
                        <script>
                            document.getElementById('judul_buku').setAttribute("class","form-control is-invalid");
                            document.getElementById('errorjudul').innerHTML="<?= $validation->getError('judul_buku');?>";
                        </script>
                        <?php
                        }else{
                            ?>
                            <script>
                                document.getElementById('judul_buku').setAttribute("class","form-control is-valid");
                                document.getElementById('errorjudul').innerHTML="";
                            </script>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="mb-3 row">
               <label for="kategori" class="col-sm-2 col-form-label">Kategori</label><br>
               <div class="col-sm-10">
               <input type="radio" id="kategori" name="kategori" value="Fiksi"><label for="kategori1"> Fiksi</label><br>
               <input type="radio" id="kategori" name="kategori" value="Non Fiksi"><label for="kategori2"> Non Fiksi</label><br>
               <div id="errorkategori" class="invalid-feedback"></div>
                    <?php
                    if(isset($validation)){
                        if($validation->getError('kategori')){?>
                        <script>
                            document.getElementById('kategori').setAttribute("class","form-control is-invalid");
                            document.getElementById('errorkategori').innerHTML="<?= $validation->getError('kategori');?>";
                        </script>
                        <?php
                        }else{
                            ?>
                            <script>
                                document.getElementById('kategori').setAttribute("class","form-control is-valid");
                                document.getElementById('errorkategori').innerHTML="";
                            </script>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= set_value('penerbit')?>" placeholder="Masukkan Penerbit, cth: B.J.Habibie">
                    <div id="errorpenerbit" class="invalid-feedback"></div>
                    <?php
                    if(isset($validation)){
                        if($validation->getError('penerbit')){?>
                        <script>
                            document.getElementById('penerbit').setAttribute("class","form-control is-invalid");
                            document.getElementById('errorpenerbit').innerHTML="<?= $validation->getError('penerbit');?>";
                        </script>
                        <?php
                        }else{
                            ?>
                            <script>
                                document.getElementById('penerbit').setAttribute("class","form-control is-valid");
                                document.getElementById('errorpenerbit').innerHTML="";
                            </script>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
             <div class="mb-3 row">
                <label for="pengarang" class="col-sm-2 col-form-label">Pengarang</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="pengarang" name="pengarang" value="<?= set_value('pengarang')?>" placeholder="Masukkan Pengarang, cth: B.J.Habibie">
                    <div id="errorpengarang" class="invalid-feedback"></div>
                    <?php
                    if(isset($validation)){
                        if($validation->getError('pengarang')){?>
                        <script>
                            document.getElementById('pengarang').setAttribute("class","form-control is-invalid");
                            document.getElementById('errorpengarang').innerHTML="<?= $validation->getError('pengarang');?>";
                        </script>
                        <?php
                        }else{
                            ?>
                            <script>
                                document.getElementById('pengarang').setAttribute("class","form-control is-valid");
                                document.getElementById('errorpengarang').innerHTML="";
                            </script>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
             <div class="mb-3 row">
                <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="harga" name="harga" value="<?= set_value('harga')?>" placeholder="Masukkan Harga, cth: 200.000">
                    <div id="errorharga" class="invalid-feedback"></div>
                    <?php
                    if(isset($validation)){
                        if($validation->getError('harga')){?>
                        <script>
                            document.getElementById('harga').setAttribute("class","form-control is-invalid");
                            document.getElementById('errorharga').innerHTML="<?= $validation->getError('harga');?>";
                        </script>
                        <?php
                        }else{
                            ?>
                            <script>
                                document.getElementById('nama_pegawai').setAttribute("class","form-control is-valid");
                                document.getElementById('errorharga').innerHTML="";
                            </script>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-sm-5"></div>
                <input class="col-sm-1 btn btn-success" type="submit" value="Input">
                <div class="col-sm-5"></div>
            </div>
            <!-- <div class="mb-3 row"> -->
                <?php
                    // if (isset($validation)){
                ?>
                    <!-- <div class="alert alert-danger d-flex align-items-center" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                        <div>
                            <?//=$validation->listErrors();?> -->
                        </div>
                    </div>
                <?php
                    //}
                ?>
            </div> -->
            
        </form>
      <!-- Akhir tambahan untuk card -->
        

    </main>
  </div>
</div>

