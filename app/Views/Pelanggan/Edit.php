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

    <!-- Looping data kosan -->
    <?php
    foreach ($datapelanggan as $row) {
        $id_pelanggan = $row->id_pelanggan;
        $nama = $row->nama;
        $nomor_telepon = $row->nomor_telepon;
        $jenis_kelamin = $row->jenis_kelamin;
        $alamat = $row->alamat;
        $foto = $row->foto;
    }
    ?>
    <!-- Akhir looping data kosan -->

    <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->
    <br>
    <!-- Tambahan untuk Input Form -->
    <form class="row g-3" action="<?= base_url('pelanggan/update') ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <div class="mb-3 row">
            <label for="id" class="col-sm-2 col-form-label">Id Pelanggan</label>
            <div class="col-sm-10">
                <input type="text" id="id_pelanggan" name="id_pelanggan" class="form-control" value="<?= $id_pelanggan ?>" readonly>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama Pelanggan</label>
            <div class="col-sm-10">
                <?php
                //jika set value namakosan tidak kosong maka isi $nama diganti dengan isian dari user
                if (strlen(set_value('nama')) > 0) {
                    $nama = set_value('nama');
                }
                ?>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $nama ?>" placeholder="Masukkan Nama, cth: Risma Nur Istiqomah">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nomor_telepon" class="col-sm-2 col-form-label">Nomor Telepon</label>
            <div class="col-sm-10">
                <?php
                //jika set value namakosan tidak kosong maka isi $nama diganti dengan isian dari user
                if (strlen(set_value('nomor_telepon')) > 0) {
                    $nomor_telepon = set_value('nomor_telepon');
                }
                ?>
                <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" value="<?= $nomor_telepon ?>" placeholder="Masukkan Nomor Telepon">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-10">
                <?php
                //jika set value namakosan tidak kosong maka isi $nama diganti dengan isian dari user
                if (strlen(set_value('jenis_kelamin')) > 0) {
                    $jenis_kelamin = set_value('jenis_kelamin');
                }
                ?>
                <input type="radio" id="lakilaki" name="jenis_kelamin" value="Laki-Laki" <?php if ($jenis_kelamin == "Laki-Laki") echo 'checked' ?>><label for="lakilaki">Laki-Laki</label><br>
                <input type="radio" id="perempuan" name="jenis_kelamin" value="Perempuan" <?php if ($jenis_kelamin == "Perempuan") echo 'checked' ?>><label for="perempuan">Perempuan</label><br>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <?php
                //jika set value namakosan tidak kosong maka isi $nama diganti dengan isian dari user
                if (strlen(set_value('alamat')) > 0) {
                    $alamat = set_value('alamat');
                }
                ?>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $alamat ?>" placeholder="Masukkan Alamat">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="foto" class="col-sm-2 col-form-label">Foto Diri</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="foto" name="foto" value="<?= set_value('foto') ?>">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-5"></div>
            <input class="col-sm-1 btn btn-info" type="submit" value="Ubah">
            <div class="col-sm-5"></div>
        </div>
    </form>
    <!-- Akhir tambahan untuk card -->

</main>
</div>
</div>