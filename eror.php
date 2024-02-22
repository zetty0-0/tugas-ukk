    <?php
                                        $get = mysqli_query($c, "select * from masuk m, produk p, where m.ProdukID=p.ProdukID");
                                        $i = 1; // penomoran

                                        while ($p = mysqli_fetch_array($get)) {
                                            $namaproduk = $p['NamaProduk'];
                                            $deskripsi = $p['Deskripsi'];
                                            $qty = $p['JumlahProduk'];
                                            $tanggal = $p['TanggalMasuk'];

                                        ?>

                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $namaproduk; ?></td>
                                                <td><?= $deskripsi; ?></td>
                                                <td><?= $qty; ?></td>
                                                <td><?= $tanggal; ?></td>
                                                <td>Edit Delete</td>
                                            </tr>

                                        <?php
                                        }; //end of white

                                        ?>