
                                <table class="table table-bordered table-responsive">
                                    <thead>
                                        <td>Tanggal</td>
                                        <td>Keterangan</td>
                                        <td>Ref</td>
                                        <td>Debet</td>
                                        <td>Kredit</td>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($penyewaan as $key) { ?>
                                            <?php if ($key['posisi']=='debet') {?>
                                           <tr>
                                               <td><?= $key['tgl_sewa']?></td>
                                               <td align="left">Kas</td>
                                               <td>111</td>
                                               <td><?= $key['total_bayar']?></td>
                                               <td>-</td>
                                            </tr>
                                            <?php } else if ($key['posisi']=='kredit') { ?>
                                                <tr>
                                               <td><?= $key['tgl_sewa']?></td>
                                               <td align="right">Penyewaan</td>
                                               <td>4</td>
                                               <td>-</td>
                                               <td><?= $key['total_bayar']?></td>
                                            </tr>
                                                <?php } ?>
                                        <?php } ?>
                                    </tbody>
                                </table>             

                    