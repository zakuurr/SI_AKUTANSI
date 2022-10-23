        <p>
        <table class="table table-bordered table-striped">
          <thead>
            <tr class="table-secondary"> 
              <th>#Id</th>
              <th>Tanggal</th>
              <th>Keterangan</th>
              <th style="text-align:center">Ref</th>
              <th style="text-align:center">Debet</th>
              <th style="text-align:center">Kredit</th>
            </tr>
          </thead>
          <tbody>
            <?php 
                foreach($datajurnal as $row):
                    ?>
                        <tr>
                                <td><?= $row['id_transaksi'];?></td>
                                <td><?= $row['tgl_jurnal'];?></td>
                                <td><?= ($row['posisi_d_c']=='d')?$row['nama_coa']:'&nbsp;&nbsp;&nbsp;&nbsp;'.$row['nama_coa']?></td>
                                <td style="text-align:right"><?= $row['kode_akun']?></td>
                                <td style="text-align:right"><?= ($row['posisi_d_c']=='d')?format_rupiah($row['nominal']):'-'?></td>
                                <td style="text-align:right"><?= ($row['posisi_d_c']=='d')?'-':format_rupiah($row['nominal'])?></td>
                        </tr> 
                    <?php
                endforeach;    
            ?>
          </tbody>
        </table>