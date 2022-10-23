<!-- Tambahan Extend Layout -->
<?= $this->extend('Templates/all');  ?>
<!-- Akhir Tambahan Extend Layout -->

<!-- Awal section konten -->
<?= $this->Section('konten');  ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Input Penyewaan Buku</h1>
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
        <?= form_open('Penyewaan/Add/'.$id_kamar.'/'.$namakos) ?>
        <input type="hidden" id="id_kamar" name="id_kamar" value="<?= $id_kamar?>">
        <input type="hidden" id="namakos" name="namakos" value="<?= $namakos?>">
        <input type="hidden" id="idkos" name="idkos" value="<?= $id?>">


        
        <!-- <form class="row g-3" action="<?=base_url('Penyewaan/Add')?>" method="post" enctype="multipart/form-data">  -->
            <div class="mb-3 row">
                <label for="id_sewa" class="col-sm-2 col-form-label">ID Sewa</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id_sewa" name="id_sewa" value="<?= set_value('id_sewa')?>" placeholder="Masukkan ID Kategori, contoh: KB1234">
                    <div id="errorid" class="invalid-feedback"></div>
                    <?php
                    if(isset($validation)){
                        if($validation->getError('id_sewa')){?>
                        <script>
                            document.getElementById('id_sewa').setAttribute("class","form-control is-invalid");
                            document.getElementById('errorid').innerHTML="<?= $validation->getError('id_sewa');?>";
                        </script>
                        <?php
                        }else{
                            ?>
                            <script>
                                document.getElementById('id_sewa').setAttribute("class","form-control is-valid");
                                document.getElementById('errorid').innerHTML="";
                            </script>
                            <?php
                        }
                    }
                    ?>
                  </div>
            </div>


            <div class="mb-3 row">
                <label for="id_pelanggan" class="col-sm-2 col-form-label">Nama Pelanggan</label>
                <div class="col-sm-10">
                    <!-- <input type="text" class="form-control" id="id_pelanggan" name="id_pelanggan" value="<?= set_value('id_pelanggan')?>" placeholder="Masukkan ID Kategori, contoh: KB1234"> -->
                    <!-- <div id="errorid" class="invalid-feedback"></div> -->
                    <select class="form-select" aria-label="Default select example" id="id_pelanggan" name="id_pelanggan">
                            <?php
                                //looping penghuni
                                foreach($pelanggan as $row):
                                    $id_pelanggan = $row->id_pelanggan;
                                    $nama = $row->nama;
                                    if(set_value('id_pelanggan')==$id_pelanggan){
                                      ?>
                                        <option value="<?= $id_pelanggan ?>" selected><?= $nama?></option>
                                      <?php
                                    }else{
                                      ?>
                                        <option value="<?= $id_pelanggan ?>"><?= $nama?></option>
                                      <?php
                                    }
                                endforeach;
                            ?>
                        </select>
                  </div>
            </div>
            
            
            <div class="mb-3 row">
                <label for="id_kategori" class="col-sm-2 col-form-label">Nama Kategori</label>
                <div class="col-sm-10">
                    <!-- <input type="text" class="form-control" id="id_pelanggan" name="id_pelanggan" value="<?= set_value('id_kategori')?>" placeholder="Masukkan ID Kategori, contoh: KB1234"> -->
                    <!-- <div id="errorid" class="invalid-feedback"></div> -->
                    <select class="form-select" aria-label="Default select example" id="id_kategori" name="id_kategori">
                            <?php
                                //looping penghuni
                                foreach($pelanggan as $row):
                                    $id_kategori = $row->idkategori;
                                    $namakategori = $row->namakategori;
                                    if(set_value('id_kategori')==$id_kategori){
                                      ?>
                                        <option value="<?= $id_kategori ?>" selected><?= $nama?></option>
                                      <?php
                                    }else{
                                      ?>
                                        <option value="<?= $id_kategori ?>"><?= $nama?></option>
                                      <?php
                                    }
                                endforeach;
                            ?>
                        </select>
                  </div>
            </div>


            <div class="mb-3 row">
                <label for="kode_buku" class="col-sm-2 col-form-label">Judul Buku</label>
                <div class="col-sm-10">
                    <!-- <input type="text" class="form-control" id="id_pelanggan" name="id_pelanggan" value="<?= set_value('kode_buku')?>" placeholder="Masukkan ID Kategori, contoh: KB1234"> -->
                    <!-- <div id="errorid" class="invalid-feedback"></div> -->
                    <select class="form-select" aria-label="Default select example" id="kode_buku" name="kode_buku">
                            <?php
                                //looping penghuni
                                foreach($pelanggan as $row):
                                    $kode_buku = $row->kodebuku;
                                    $namakategori = $row->namakategori;
                                    if(set_value('kode_buku')==$kode_buku){
                                      ?>
                                        <option value="<?= $kode_buku ?>" selected><?= $nama?></option>
                                      <?php
                                    }else{
                                      ?>
                                        <option value="<?= $kode_buku ?>"><?= $nama?></option>
                                      <?php
                                    }
                                endforeach;
                            ?>
                        </select>
                  </div>
            </div>


                <div class="mb-3 row">
                  <label for="penyewaan" class="col-sm-2 col-form-label">Tanggal Sewa</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" id="tgl_sewa" name="tgl_sewa" value="<?= set_value('tgl_sewa')?>" placeholder="Diisi dengan tanggal" onchange="myFunction()">
                    <div class="invalid-feedback" id="errortgl_sewa"></div>            
                  </div>
                </div>      
                <?php 
                    // contoh mendapatkan error per komponen tanggal mulai
                    if(isset($validation)){
                        if($validation->getError('tgl_sewa')) {?>
                            <script>
                                // modifikasi elemen class input form untuk tgl_sewa menjadi is-invalid
                                document.getElementById('tgl_sewa').setAttribute("class", "form-control is-invalid");
                                document.getElementById('errortgl_sewa').innerHTML = "<?=$validation->getError('tgl_sewa'); ?>";
                                // serta tambahkan div class invalid
                            </script>
                        <?php 
                        }else{
                            // tidak ada error di tgl_sewa maka nilai is-invalid dihapuskan
                            ?>
                            <script>
                                // modifikasi elemen class input form untuk tgl_sewa menjadi is-valid
                                document.getElementById('tgl_sewa').setAttribute("class", "form-control is-valid");
                                document.getElementById('errortgl_sewa').innerHTML = "";
                                // serta tambahkan div class is valid
                            </script>
                            <?php
                        }
                    }?>
                

                <div class="mb-3 row">
                  <label for="penyewaan" class="col-sm-2 col-form-label">Tanggal Pengembalian</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" id="tgl_pengembalian" name="tgl_pengembalian" value="<?= set_value('tgl_pengembalian')?>" readonly>
                  </div>
                </div> 


                <!-- <div class="mb-3 row">
                  <label for="penyewaan" class="col-sm-2 col-form-label">Tanggal Pengembalian</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" id="tgl_pengembalian" name="tgl_pengembalian" value="<?= set_value('tgl_pengembalian')?>" placeholder="Diisi dengan tanggal" onchange="myFunction()">
                    <div class="invalid-feedback" id="errortgl_pengembalian"></div>            
                  </div>
                </div>      
                <?php 
                    // contoh mendapatkan error per komponen tanggal mulai
                    if(isset($validation)){
                        if($validation->getError('tgl_pengembalian')) {?>
                            <script>
                                // modifikasi elemen class input form untuk tgl_pengembalian menjadi is-invalid
                                document.getElementById('tgl_pengembalian').setAttribute("class", "form-control is-invalid");
                                document.getElementById('errortgl_pengembalian').innerHTML = "<?=$validation->getError('tgl_pengembalian'); ?>";
                                // serta tambahkan div class invalid
                            </script>
                        <?php 
                        }else{
                            // tidak ada error di tgl_pengembalian maka nilai is-invalid dihapuskan
                            ?>
                            <script>
                                // modifikasi elemen class input form untuk tgl_pengembalian menjadi is-valid
                                document.getElementById('tgl_pengembalian').setAttribute("class", "form-control is-valid");
                                document.getElementById('errortgl_pengembalian').innerHTML = "";
                                // serta tambahkan div class is valid
                            </script>
                            <?php
                        }
                    }?> -->


                <div class="mb-3 row">
                  <label for="penyewaan" class="col-sm-2 col-form-label">Jangka Waktu Sewa</label>
                  <div class="col-sm-10">
                      <select class="form-select" aria-label="Default select example" id="durasi" name="durasi" onchange="myFunction()">
                          <?php
                              $l1=""; $l2 = ""; $l3 = "";
                              if(set_value('durasi')==7){$l3="selected";}
                              elseif(set_value('durasi')==6){$l14="selected";}
                              else{$l1="selected";}
                          ?>
                          <option value="7" <?= $l3 ?>>7 Hari</option>
                          <option value="14" <?= $l2 ?>>14 Hari</option>
                          <option value="30"<?= $l1 ?>>30 Hari</option>
                      </select>  
                  </div>
                </div> 

                <!-- <div class="mb-3 row">
                  <label for="jenis_kos" class="col-sm-2 col-form-label">Harga Awal</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="harga_awal" name="harga_awal" value="<?= number_format($harga)?>" readonly>
                  </div>
                </div>          
                
                <div class="mb-3 row">
                  <label for="jenis_kos" class="col-sm-2 col-form-label">Harga Jadi</label>
                  <div class="col-sm-10">
                   <input type="text" class="form-control" id="harga_deal" name="harga_deal" onchange="myFunction()" placeholder="Diisi harga kesepakatan">
                   <div class="invalid-feedback" id="errorharga_deal"></div> 
                  </div>
                </div> 

                <?php 
                    // contoh mendapatkan error per komponen harga_deal
                    if(isset($validation)){
                        if($validation->getError('harga_deal')) {?>
                            <script>
                                // modifikasi elemen class input form untuk tgl_sewa menjadi is-invalid
                                document.getElementById('harga_deal').setAttribute("class", "form-control is-invalid");
                                document.getElementById('errorharga_deal').innerHTML = "<?=$validation->getError('harga_deal'); ?>";
                                // serta tambahkan div class invalid
                            </script>
                        <?php 
                        }else{
                            // tidak ada error di harga_deal maka nilai is-invalid dihapuskan
                            ?>
                            <script>
                                // modifikasi elemen class input form untuk tgl_sewa menjadi is-valid
                                document.getElementById('harga_deal').setAttribute("class", "form-control is-valid");
                                document.getElementById('errorharga_deal').innerHTML = "";
                                // serta tambahkan div class is valid
                            </script>
                            <?php
                        }
                    }?> -->

                <div class="mb-3 row">
                  <label for="penyewaan" class="col-sm-2 col-form-label">Total Bayar</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="total_bayar" name="total_bayar" value="<?= set_value('total_bayar')?>" onchange="myFunction()" placeholder="Diisi dengan besar pembayaran">
                    <div class="invalid-feedback" id="errortotal_bayar"></div> 
                  </div>
                </div>                 

                <?php 
                    // contoh mendapatkan error per komponen total_bayar
                    if(isset($validation)){
                        if($validation->getError('total_bayar')) {?>
                            <script>
                                // modifikasi elemen class input form untuk total_bayar menjadi is-invalid
                                document.getElementById('total_bayar').setAttribute("class", "form-control is-invalid");
                                document.getElementById('errortotal_bayar').innerHTML = "<?=$validation->getError('total_bayar'); ?>";
                                // serta tambahkan div class invalid
                            </script>
                        <?php 
                        }else{
                            // tidak ada error di total_bayar maka nilai is-invalid dihapuskan
                            ?>
                            <script>
                                // modifikasi elemen class input form untuk tgl_sewa menjadi is-valid
                                document.getElementById('total_bayar').setAttribute("class", "form-control is-valid");
                                document.getElementById('errortotal_bayar').innerHTML = "";
                                // serta tambahkan div class is valid
                            </script>
                            <?php
                        }
                    }?>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

     
    </main>
  </div>
</div>


<script>
        //untuk fungsi number format di javascript
        function number_format (number, decimals, decPoint, thousandsSep) { 
            number = (number + '').replace(/[^0-9+\-Ee.]/g, '')
            var n = !isFinite(+number) ? 0 : +number
            var prec = !isFinite(+decimals) ? 0 : Math.abs(decimals)
            var sep = (typeof thousandsSep === 'undefined') ? ',' : thousandsSep
            var dec = (typeof decPoint === 'undefined') ? '.' : decPoint
            var s = ''

            var toFixedFix = function (n, prec) {
                var k = Math.pow(10, prec)
                return '' + (Math.round(n * k) / k)
                .toFixed(prec)
            }

            // @todo: for IE parseFloat(0.55).toFixed(0) = 0;
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.')
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep)
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || ''
                s[1] += new Array(prec - s[1].length + 1).join('0')
            }

            return s.join(dec)
        }

        //fungsi untuk mengganti nilai sesuai dengan pilihan user
        function myFunction(){
            //memilih elemen 
            var tgl_pengembalian = document.getElementById("tgl_pengembalian"); 
            var tgl_sewa = document.getElementById("tgl_sewa"); 
            var tgl_pengembalian2 = document.getElementById("tgl_pengembalian2");
            var durasi = document.getElementById("durasi").value; //mengambil elemen durasi
            // var harga_awal = document.getElementById("harga_awal"); //mengambil elemen harga_awal

            // //menghilangkan karakter selian numerik
            // //harga_awal_bersih =harga_awal.value.replaceAll(".", "");
            // harga_awal_bersih = "<?php echo $harga; ?>";

            // var pembagi = 1;
            // if(Number(durasi)==6){
            //   pembagi = 2; //harga per tahun dibagi 2
            // }else if(Number(durasi)==1){
            //   pembagi = 12; //harga per tahun dibagi 12
            // }

            // //membagi harga dasar dengan pembagi
            // harga_awal.setAttribute("value", number_format(Math.round(harga_awal_bersih/pembagi)) );
            // harga_awal.innerHTML = harga_awal_bersih/pembagi;

            //menambahkan nilai penambahan tanggal awal dengan durasi yang dipilih lalu diisikan sbg atribut value di input form tgl_pengembalian
            var dt = new Date(tgl_sewa.value); 
            dt.setMonth( dt.getMonth() + Number(durasi) );
            tgl_pengembalian.setAttribute("value", dt.toISOString().substring(0, 10)); 



            //mengambil substring dari hasil toISOString berupa string 2021-09-05T00:00:00.000Z

            //var idx = document.getElementById("idx");
            //idx.innerHTML = dt.toISOString();
            //idx.innerHTML = durasi;
        }
</script>

<?= $this->endSection('konten');  ?>
<!-- Akhir section konten -->