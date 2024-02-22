<?php

require '../koneksi.php';

// produk di pilih dipesanan/penjualan
if(isset($_POST['tambahproduk'])){
    $idproduk = $_POST['ProdukID'];
    $idp = $_POST['PenjualanID'];
    $qty = $_POST['JumlahProduk']; // jumlah yang mau di keluarkan

    // hitung stok sekarang ada berapa
    $hitung1 = mysqli_query($c,"select * from produk where ProdukID = '$idproduk'");
    $hitung2 = mysqli_fetch_array($hitung1);
    $stocksekarang = $hitung2['Stok']; //stok barang saat ini

    if ($stocksekarang>=$qty){

        // kurangi stoknya dengan jumlah bbarang yang akan di keluarkan
        $selisih = $stocksekarang-$qty;

        //stoknya cukup
        $insert = mysqli_query($c, "insert into detailpenjualan (PenjualanID,ProdukID,JumlahProduk) values ('$idp','$idproduk','$qty')");
        if (!$insert) {
            die('Error inserting product into detailpenjualan: ' . mysqli_error($c));
        }
        

        // $update = mysqli_query($c, "update produk set Stok='$selisih' where ProdukID='$idproduk'");
        $update = mysqli_query($c, "UPDATE produk SET Stok = $selisih WHERE ProdukID = '$idproduk'");
        if (!$update) {
            die('Error updating product stock: ' . mysqli_error($c));
        }
        

        
        if($insert&&$update){
            header('location:view.php?idp='.$idp);
        } else {
            echo '
            <script>alert("Gagal menambah pesanan baru");
            window.location.href="view.php?idp='.$idp.'"
            </script>
            ';
        }
    } else {
        // stok gak cukup
        echo '
            <script>alert("Stok barang tidak cukup");
            window.location.href="view.php?idp='.$idp.'"
            </script>
            ';
    }
}


?>