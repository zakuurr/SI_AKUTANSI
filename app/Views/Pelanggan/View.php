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
    <a href="<?= base_url('pelanggan/add') ?>" class="btn btn-success btn-sm">Tambah</a><br><br>
    <table class="table table-hover" id="myTable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">No Telepon</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Alamat</th>
                <th scope="col">Foto Diri</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // looping hasil penghuni dari database
            foreach ($datapelanggan as $row) :
            ?>
                <tr>
                    <th scope="row"><?= $row['id_pelanggan'] ?></th>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['nomor_telepon'] ?></td>
                    <td><?= $row['jenis_kelamin'] ?></td>
                    <td><?= $row['alamat'] ?></td>
                    <td>
                        <a data-fancybox data-src="/images/<?= $row["foto"] ?>" data-caption="<?= $row['foto'] ?>">
                            <img src="/images/<?= $row["foto"] ?>" width="50px" class="foto"></a>
                    </td>


                    <td>
                        <a href="<?= base_url('pelanggan/viewData/' . $row['id_pelanggan']) ?>" class="btn btn-primary btn-sm">Ubah</a>
                        <a onclick="deleteConfirm('<?php echo base_url('pelanggan/delete/' . $row['id_pelanggan']) ?>')" href="#" class="btn btn-danger btn-sm" role="button" aria-pressed="true">Hapus</a>

                    </td>
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