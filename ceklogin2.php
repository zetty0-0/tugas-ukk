<?php
// memulai session
session_start();
include './koneksi.php';

//Login
if(isset($_POST['login'])){
// menerima data username dan password dari form
$username = $_POST['username'];
$password = $_POST['password'];

// cek database
$logun = mysqli_query($c, "SELECT * FROM user WHERE username ='$username' AND password='$password'");
$cek = mysqli_num_rows($logun);

// cek privilege dan set session
if ($cek > 0) {
	$data = mysqli_fetch_assoc($logun);

	if ($data['level']==admin) {
		$_SESSION['username'] = $data['username'];
		$_SESSION['IdUser'] = $data['IdUser'];
		$_SESSION['level'] = "admin";
		// header("location:../dashboard/index.php?dashboard");
        header('location:index.php');

	} elseif ($data['level']==kasir) {
		$_SESSION['username'] = $data['username'];
		$_SESSION['IdUser'] = $data['IdUser'];
		$_SESSION['level'] = "kasir";
		// header("location:../dashboard/index.php?home");
        header('location:index.php');
	} else {
		// header("location:index.php?pesan=gagal");
        //Data tidak ditemukan
        //gagal login
        echo '
        <script>alert("Username / level salah");
        window.location.href="login.php"
        </script>
        ';
	}
} else {
	// header("location:index.php?pesan=gagal");
    //Data tidak ditemukan
        //gagal login
        echo '
        <script>alert("Username atau Password salah");
        window.location.href="login.php"
        </script>
        ';
}

}
?>