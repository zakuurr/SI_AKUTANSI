<!-- Tambahan Extend Layout -->
<?= $this->extend('Templates/all');  ?>
<!-- Akhir Tambahan Extend Layout -->

<!-- Awal section konten -->
<?= $this->Section('konten');  ?>

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
    <!--Image pakai fancy box-->
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    <!--akhir-->

    <canvas class="my-4 w-100" id="myChart" width="900" height="380" hidden></canvas>
    <div class="alert alert-success" role="alert">
        <?php
        $session = session();
        echo "Selamat Datang " . $session->get('user_name');
        ?>
    </div>
    <?php
    if (session()->has("status_dml")) {
    ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Data Berhasil!',
                text: '<?= session("status_dml"); ?>'

            });
        </script>
    <?php
    }
    ?>
    <!-- Tambahan Alert Jika Sukses DML -->
    <?php
    if (session()->has("status_dml")) {
    ?>
        <div class="row">
            <div class="col">
                <div class="alert alert-primary" role="alert">
                    <b><?= session("status_dml"); ?></b>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    <!-- Akhir Alert Jika Sukses DML -->

    <!-- Tambahan untuk table -->
    <a href="<?= base_url('Penyewaan/Add') ?>" class="btn btn-success btn-sm">Tambah</a><br><br>
    <table class="table table-hover" id="myTable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID Sewa</th>
                <th scope="col">Nama Pelanggan</th>
                <th scope="col">Nama Kategori</th>
                <th scope="col">Judul Buku</th>
                <th scope="col">Tanggal Sewa</th>
                <th scope="col">Tanggal Pengembalian</th>
                <th scope="col">Total Bayar</th>


            </tr>
        </thead>
        <tbody>
            <?php
            // looping hasil penghuni dari database
            foreach ($datapenyewaan as $row) :
            ?>
                <tr>
                    <th scope="row"><?= $row['id_sewa'] ?></th>
                    <td><?= $row['id_pelangan'] ?></td>
                    <td><?= $row['id_kategori'] ?></td>
                    <td><?= $row['id_buku'] ?></td>
                    <td><?= $row['tgl_sewa'] ?></td>
                    <td><?= $row['tgl_pengembalian'] ?></td>
                    <td><?= $row['total_bayar'] ?></td>

                  </tr>
            <?php
            endforeach;

            ?>

        </tbody>
    </table>
    <!-- Akhir tambahan table-->

</main>
</div>
</div>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>

<!-- <script src="../assets/dist/js/bootstrap.bundle.min.js"></script> -->

<!-- Modal Delete -->
<script>
    function deleteConfirm(url) {
        var tomboldelete = document.getElementById('btn-delete')
        tomboldelete.setAttribute("href", url); //akan meload kontroller delete

        var pesan = "Data dengan ID <b>"
        var pesan2 = " </b>akan dihapus"
        var n = url.lastIndexOf("/")
        var res = url.substring(n + 1);
        document.getElementById("xid").innerHTML = pesan.concat(res, pesan2);

        var myModal = new bootstrap.Modal(document.getElementById('deleteModal'), {
            keyboard: false
        });

        myModal.show();

    }
</script>
<!-- Logout Delete Confirmation-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin?</h5>
                <a id="btn-tutup" class="btn btn-secondary" data-bs-dismiss="modal">X</a>
            </div>
            <div class="modal-body" id="xid"></div>
            <div class="modal-footer">
                <a id="btn-batal" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</a>
                <a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
            </div>
        </div>
    </div>
</div>
<!-- Akhir Modal Delete -->

<?= $this->endSection('konten');  ?>
<!-- Akhir section konten -->