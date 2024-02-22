<?php

require '../koneksi.php';

if(isset($_POST['tambahpelanggan'])){
    $namapelanggan = $_POST['NamaPelanggan'];
    $notelp = $_POST['NomorTelepon'];
    $alamat = $_POST['Alamat'];

    $insert = mysqli_query($c, "INSERT INTO pelanggan (NamaPelanggan, NomorTelepon, Alamat) VALUES ('$namapelanggan','$notelp','$alamat')");

    if($insert){
        echo '
        <script>alert("Berhasil menambah pelanggan baru");
        window.location.href="pelanggan.php"
        </script>
        ';
    } else {
        echo '
        <script>alert("Gagal menambah pelanggan baru");
        window.location.href="pelanggan.php"
        </script>
        ';
    }
}

?>