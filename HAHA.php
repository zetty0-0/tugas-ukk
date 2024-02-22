<?php 
$query = mysqli_query($c, "SELECT * FROM user WHERE username = '$_SESSION[username]' ");
// ini untuk mengambil data user  setelah login dari session
$hasil = mysqli_fetch_array($query);
?>

<div class="navbar-content scroll-div " >
				
				<div class="">
					<div class="main-menu-header">
						<img class="img-radius" src="assets/images/user/avatar-2.jpg" alt="User-Profile-Image">
						<div class="user-details">
							<div id="more-details"><?php echo$hasil['username']?></div>
						</div>
					</div>
					<div class="collapse" id="nav-user-link">
						<ul class="list-unstyled">
							<li class="list-group-item"><a href="user-profile.html"><i class="feather icon-user m-r-5"></i>View Profile</a></li>
							<li class="list-group-item"><a href="#!"><i class="feather icon-settings m-r-5"></i>Settings</a></li>
							<li class="list-group-item"><a href="logout.php"><i class="feather icon-log-out m-r-5"></i>Logout</a></li>
						</ul>
					</div>
				</div>
				
				<ul class="nav pcoded-inner-navbar ">
					<li class="nav-item pcoded-menu-caption">
					    <label>Navigation</label>
					</li>
					<li class="nav-item">
					    <a href="index.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
					</li>
					<li class="nav-item pcoded-hasmenu">
					    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="fa-solid fa-database"></i></span><span class="pcoded-mtext">Data Master</span></a>
					    <ul class="pcoded-submenu">
					        <li><a href="stok.php" target="_blank">Stok Barang</a></li>
					        <li><a href="masuk.php" target="_blank">Barang Masuk</a></li>
					        <li><a href="pelanggan.php" target="_blank">Kelola Pelanggan</a></li>
					    </ul>
					</li>
					<li class="nav-item pcoded-menu-caption">
					    <label>Transaksi</label>
					</li>
					<li class="nav-item pcoded-hasmenu">
					    <a href="order.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Order</span></a>
					</li>
					<?php
                        // Cek apakah pengguna telah login
                        if(isset($_SESSION['username']) && isset($_SESSION['level'])) {
                            // Pengguna telah login
                            // Disini Anda bisa menentukan apa yang ingin ditampilkan sesuai dengan level pengguna
                            if($_SESSION['level'] == "admin") {
                                // Tampilkan link "User" jika pengguna adalah admin
                        ?>
						<li class="nav-item pcoded-menu-caption">
					    <label>Admin</label>
					</li>
					<li class="nav-item">
					    <a href="user.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">User</span></a>
					</li>
                        
                        <?php
                            }
                        }
                        ?>
					
				</ul>
				
				
				<!-- <div class="card text-center">
					<div class="card-block">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<i class="feather icon-sunset f-40"></i>
						<h6 class="mt-3">Download Pro</h6>
						<p>Getting more features with pro version</p>
						<a href="https://1.envato.market/qG0m5" target="_blank" class="btn btn-primary btn-sm text-white m-0">Upgrade Now</a>
					</div>
				</div> -->
				
			</div>