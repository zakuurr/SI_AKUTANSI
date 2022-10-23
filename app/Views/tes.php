<h1>CONTOH TABEL DENGAN DATA DARI MODEL</h1>
<table border=1>
    <tr>
        <td>Id Kos</td>
        <td>Nama Kos</td>
        <td>Jenis Kos</td>
        <td>Alamat</td>
    </tr>
<?php
    foreach($datakosan as $row):
?>
    <tr>
        <td><?= $row['id_kos'];?></td>
        <td><?= $row['nama'];?></td>
        <td><?= $row['jenis_kos'];?></td>
        <td><?= $row['alamat'];?></td>
    </tr>
<?php
    endforeach;
?>
</table>
