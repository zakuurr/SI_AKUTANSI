
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
                                            
                                           <tr>
                                               <td><?= $key['tgl_sewa']?></td>
                                               <td align="left"><?= $key['akun']?></td>
                                               <?php if ($key['akun']=='Kas') { ?>
                                                 <td>111</td>
                                              <?php } else if ($key['akun']=='Penyewaan') {?>
                                                            <td>4</td>
                                                <?php } ?>

                                                <?php if ($key['akun']=='Kas') { ?>
                                                 <td><?= $key['total_bayar'] ?></td>
                                              <?php } else if ($key['akun']=='Penyewaan') {?>
                                                            <td><?= $key['total_bayar'] ?></td>
                                                <?php } ?>
                                               <
                                            </tr>
                                            
                                        <?php } ?>
                                    </tbody>
                                </table>             

                    