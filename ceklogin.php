<?php
require 'function.php';
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    // Jika tidak, alihkan ke halaman login
    header("Location: login.php?pesan=harus_login");
    exit(); // Pastikan untuk keluar setelah melakukan pengalihan header
}

?>