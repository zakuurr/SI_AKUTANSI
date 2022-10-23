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
      <form class="row g-3" action="<?=base_url('KategoriBuku/add')?>" method="post" enctype="multipart/form-data"> 
            <div class="mb-3 row">
                <label for="id_kategori" class="col-sm-2 col-form-label">ID Kategori</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id_kategori" name="id_kategori" value="<?= set_value('id_kategori')?>" placeholder="Masukkan ID Kategori, contoh: KB1234">
                    <div id="errorid" class="invalid-feedback"></div>
                    <?php
                    if(isset($validation)){
                        if($validation->getError('id_kategori')){?>
                        <script>
                            document.getElementById('id_kategori').setAttribute("class","form-control is-invalid");
                            document.getElementById('errorid').innerHTML="<?= $validation->getError('id_kategori');?>";
                        </script>
                        <?php
                        }else{
                            ?>
                            <script>
                                document.getElementById('id_kategori').setAttribute("class","form-control is-valid");
                                document.getElementById('errorid').innerHTML="";
                            </script>
                            <?php
                        }
                    }
                    ?>
                  </div>
            </div>
            <div class="mb-3 row">
                <label for="nama_kategori" class="col-sm-2 col-form-label">Nama Kategori</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="<?= set_value('nama_kategori')?>" placeholder="Masukkan Nama Kategori, contoh: Buku Tulis">

                                <div id="errornama" class="invalid-feedback"></div>
                    <?php
                    if(isset($validation)){
                        if($validation->getError('nama_kategori')){?>
                        <script>
                            document.getElementById('nama_kategori').setAttribute("class","form-control is-invalid");
                            document.getElementById('errornama').innerHTML="<?= $validation->getError('nama_kategori');?>";
                        </script>
                        <?php
                        }else{
                            ?>
                            <script>
                                document.getElementById('nama_kategori').setAttribute("class","form-control is-valid");
                                document.getElementById('errornama').innerHTML="";
                            </script>
                            <?php
                        }
                    }
                    ?>
                </div>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama_kategori" class="col-sm-2 col-form-label">Upload foto</label>
                <div class="col-sm-10">
            <div class="mb-3 row">
                <label for="foto" class="col-sm-2 col-form-label">Upload foto</label>
                <div class="col-sm-10">
                <input type="file" class="form-control" id="foto" name="foto" >
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-sm-5"></div>
                <input class="col-sm-1 btn btn-success" type="submit" value="Input">
                <div class="col-sm-5"></div>
            </div> 
            <div class="mb-3 row">
                <label for="nomor_rak" class="col-sm-2 col-form-label">Nomor Rak</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nomor_rak" name="nomor_rak" value="<?= set_value('nomor_rak')?>" placeholder="Masukkan Nomor Rak, contoh: 1A">

                                <div id="errornomor" class="invalid-feedback"></div>
                    <?php
                    if(isset($validation)){
                        if($validation->getError('nomor_rak')){?>
                        <script>
                            document.getElementById('nomor_rak').setAttribute("class","form-control is-invalid");
                            document.getElementById('errornomor').innerHTML="<?= $validation->getError('nomor_rak');?>";
                        </script>
                        <?php
                        }else{
                            ?>
                            <script>
                                document.getElementById('nomor_rak').setAttribute("class","form-control is-valid");
                                document.getElementById('errornomor').innerHTML="";
                            </script>
                            <?php
                        }
                    }
                    ?>
                </div>
                </div>
            </div>
           
        </form>
    </main>
  </div>


    