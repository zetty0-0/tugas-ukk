<?php

require '../koneksi.php';

if(isset($_POST['tambahbarang'])){
    $namaproduk = $_POST['NamaProduk'];
    $deskripsi = $_POST['Deskripsi'];
    $harga = $_POST['Harga'];
    $stock = $_POST['Stok'];

    $insert = mysqli_query($c, "INSERT INTO produk (NamaProduk, Deskripsi, Harga, Stok) VALUES ('$namaproduk','$deskripsi','$harga','$stock')");

    if($insert){
        echo '
        <script>alert("Berhasil menambah barang");
        window.location.href="stock.php"
        </script>
        ';
    } else {
        echo '
        <script>alert("Gagal menambah barang baru");
        window.location.href="stock.php"
        </script>
        ';
    }
}

?>