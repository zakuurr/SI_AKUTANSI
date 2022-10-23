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

    <form class="row g-3" action="<?= base_url('pelanggan/add') ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama') ?>" placeholder="Masukkan Nama, cth: Risma Nur Istiqomah">
                <!--bootsrap validation-->
                <div id="errornama" class="invalid-feedback"></div>
                <?php
                if (isset($validation)) {
                    if ($validation->getError('nama')) { ?>
                        <script>
                            document.getElementById('nama').setAttribute("class", "form-control is-invalid");
                            document.getElementById('errornama').innerHTML = "<?= $validation->getError('nama'); ?>";
                        </script>
                    <?php
                    } else {
                    ?>
                        <script>
                            document.getElementById('nama').setAttribute("class", "form-control is-valid");
                            document.getElementById('errornama').innerHTML = "";
                        </script>
                <?php
                    }
                }
                ?>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nomor_telepon" class="col-sm-2 col-form-label">No Telepon</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" value="<?= set_value('nomor_telepon') ?>" placeholder="Masukkan No Telepon, cth : 081234567890 ">
                <div id="errornotelp" class="invalid-feedback"></div>
                <?php
                if (isset($validation)) {
                    if ($validation->getError('nomor_telepon')) { ?>
                        <script>
                            document.getElementById('nomor_telepon').setAttribute("class", "form-control is-invalid");
                            document.getElementById('errornotelp').innerHTML = "<?= $validation->getError('nomor_telepon'); ?>";
                        </script>
                    <?php
                    } else {
                    ?>
                        <script>
                            document.getElementById('nomor_telepon').setAttribute("class", "form-control is-valid");
                            document.getElementById('errornotelp').innerHTML = "";
                        </script>
                <?php
                    }
                }
                ?>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-10">
                <input type="radio" id="jenis_kelamin" name="jenis_kelamin" value="Laki-Laki"><label for="lakilaki">Laki-Laki</label><br>
                <input type="radio" id="jenis_kelamin" name="jenis_kelamin" value="Perempuan"><label for="perempuan">Perempuan</label><br>

                <div id="errorjk" class="invalid-feedback"></div>
                <?php
                if (isset($validation)) {
                    if ($validation->getError('jenis_kelamin')) { ?>
                        <script>
                            document.getElementById('jenis_kelamin').setAttribute("class", "is-invalid");
                            document.getElementById('errorjk').innerHTML = "<?= $validation->getError('jenis_kelamin'); ?>";
                        </script>
                    <?php
                    } else {
                    ?>
                        <script>
                            document.getElementById('jenis_kelamin').setAttribute("class", "is-valid");
                            document.getElementById('errorjk').innerHTML = "";
                        </script>
                <?php
                    }
                }
                ?>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= set_value('alamat') ?>" placeholder="Masukkan Alamat Tempat Tinggal, cth: Bojongsoang">
                <div id="erroralamat" class="invalid-feedback"></div>
                <?php
                if (isset($validation)) {
                    if ($validation->getError('alamat')) { ?>
                        <script>
                            document.getElementById('alamat').setAttribute("class", "form-control is-invalid");
                            document.getElementById('erroralamat').innerHTML = "<?= $validation->getError('alamat'); ?>";
                        </script>
                    <?php
                    } else {
                    ?>
                        <script>
                            document.getElementById('alamat').setAttribute("class", "form-control is-valid");
                            document.getElementById('erroralamat').innerHTML = "";
                        </script>
                <?php
                    }
                }
                ?>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="foto" class="col-sm-2 col-form-label">Upload Foto</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="foto" name="foto">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-5"></div>
            <input class="col-sm-1 btn btn-success" type="submit" value="Input">
            <div class="col-sm-5"></div>
        </div>

    </form>
    <!-- Akhir tambahan untuk card -->


</main>
</div>
</div>