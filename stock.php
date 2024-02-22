<?php

require 'ceklogin.php';

//Hitung jumlah barang
$h1 = mysqli_query($c, "select * from produk");
$h2 = mysqli_num_rows($h1); // jumlah barang

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand ps-3" href="index.php">PPLG KASIR</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>

    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                    <?php
                       include 'sidebar.php'
                    ?>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Data Barang</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Selamat Datang</li>
                    </ol>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">Jumlah Barang : <?=$h2;?></div>
                            </div>
                        </div>
                    </div>

                    <!-- Button to Open the Modal -->
                    <button type="button" class="btn btn-info mb-4" data-bs-toggle="modal" data-bs-target="#myModal">
                        Tambah Barang Baru
                    </button>


                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Data Barang
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Produk</th>
                                            <th>Deskripsi</th>
                                            <th>Harga</th>
                                            <th>Stock</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $get = mysqli_query($c, "select * from produk");
                                        $i = 1; // penomoran

                                        while ($p = mysqli_fetch_array($get)) {
                                            $namaproduk = $p['NamaProduk'];
                                            $deskripsi = $p['Deskripsi'];
                                            $harga = $p['Harga'];
                                            $stock = $p['Stok'];
                                            $idproduk = $p['Produkid'];

                                        ?>

                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $namaproduk; ?></td>
                                                <td><?= $deskripsi; ?></td>
                                                <td>Rp<?=number_format($harga); ?></td>

                                                <!-- number format berfungsi untuk menformat angka contoh
                                            200000 menjadi seperti ini 200,000 jadi ada komanya -->
                                            <td><?= $stock; ?></td>
                                            <td>
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?=$idproduk;?>">
                                            Edit
                                            </button>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?=$idproduk;?>">
                                            Delete
                                            </button>
                                            </td>
                                            </tr>
<!-- The Modal edit -->
<div class="modal fade" id="edit<?=$idproduk;?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit<?=$namaproduk;?></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form method="post">
      <!-- Modal body -->
      <div class="modal-body">
        <input type="text" name="namaproduk" class="form-control" placeholder="Nama Produk"  value="<?=$namaproduk;?>">
        <input type="text" name="deskripsi" class="form-control" placeholder="Nama Produk"  value="<?=$deskripsi;?>">
        <input type="num" name="harga" class="form-control mt-2" placeholder="Harga"  value="<?=$harga;?>">
        <input type="nom" name="stok" class="form-control mt-2" placeholder="Stok" value="<?=$stock;?>">
        <input type="hidden" name="idp" class="form-control mt-2" placeholder="Stok" value="<?=$idproduk;?>">
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" name="editproduk">Update</button>
        <button type="button" class="btn btn-danger"  data-bs-dismiss="modal">Close</button>
      </div>

    </div>
</form>
  </div>
</div>



<!-- The Modal delete-->
<div class="modal fade" id="delete<?=$idproduk;?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Hapus <?=$namaproduk;?></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form method="post">
      <!-- Modal body -->
      <div class="modal-body">
       Apakah anda yakin akan menghapus produk ini?
        <input type="hidden" name="idp" class="form-control mt-2" placeholder="Stok" value="<?=$idproduk;?>">
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" name="deleteproduk">Delete</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
</form>
  </div>
</div>
                                        <?php
                                        }; //end of white

                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>


<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Produk</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form method="post">

                <!-- Modal body -->
                <div class="modal-body">
                    <input type="text" name="NamaProduk" class="from-control" placeholder="Nama Produk">
                    <input type="text" name="Deskripsi" class="from-control mt-2" placeholder="Deskripsi">
                    <input type="text" name="Harga" class="from-control mt-2" placeholder="Harga">
                    <input type="text" name="Stok" class="from-control mt-2" placeholder="Stock">
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <!-- <button type="submit" class="btn btn-succes" name="tambahpelanggan">Submit</button> -->

                    <button type="submit" class="btn btn-succes" name="tambahbarang">Submit</button>

                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </form>

        </div>
    </div>
</div>




</html>