<?php
session_start();
include'koneksi.php';

if(isset($_POST['login'])){
	$kode_akses = mysqli_real_escape_string($koneksi, $_POST['kode_akses']);
	$data_akses = mysqli_query($koneksi, "SELECT * FROM tbl_akses INNER JOIN tbl_dpt ON tbl_akses.nim = tbl_dpt.nim WHERE kode_akses='$kode_akses'");
	$r = mysqli_fetch_array($data_akses);
	$nim = $r['nim'];
	$kode_akses = $r['kode_akses'];
	$nama_mhs = $r['nama_mhs'];
	$level = $r['level'];
	if( mysqli_num_rows($data_akses) === 1 ){
		$_SESSION["login"] = true;
		$_SESSION['nim'] = $nim;
		$_SESSION['nama_mhs'] = $nama_mhs;
		$_SESSION['kode_akses'] = $kode_akses;
		$_SESSION['level'] = $level;
		header('location:sistem');
	}else{
		echo "<script type='text/javascript'>
		setTimeout(function () {
			swal({
				title: 'Kode Akses Salah',
				type: 'warning',
				timer: 3200,
				showConfirmButton: true
				});
				},10);
				window.setTimeout(function(){
					window.location.replace('index.php');
					},3000);
					</script>";
				}
			}
			?>
			<!DOCTYPE html>
			<html lang="en">
			<head>
				<title>E-Voting</title>
				<meta charset="UTF-8">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<meta name="keywords" content="bangka, cendekia, gusmint"/>
				<meta itemprop="description" content="Sistem Pemilihan Ketua dan Wakil OSIS SMA N 2 RATAHAN secara Daring" />
				<link rel="stylesheet" type="text/css" href="fontawesome-free/css/all.min.css">
				<link rel="stylesheet" type="text/css" href="css/sweetalert.css">
				<!--===============================================================================================-->	
				<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
				<!--===============================================================================================-->
				<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
				<!--===============================================================================================-->
				<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
				<!--===============================================================================================-->
				<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
				<!--===============================================================================================-->	
				<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
				<!--===============================================================================================-->
				<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
				<!--===============================================================================================-->
				<link rel="stylesheet" type="text/css" href="css/util.css">
				<link rel="stylesheet" type="text/css" href="css/main.css">
				<!--===============================================================================================-->
			</head>
			<body>

				<div class="limiter">
					<div class="container-login100">
						<div class="wrap-login100">
							<div class="login100-pic js-tilt" data-tilt>
								<h4>Aplikasi E-Voting </h4>
								<h4>SMA N 2 RATAHAN</h4>
								<img src="images/vote.png" alt="Pemira">
							</div>

							<form class="login100-form validate-form" action="" method="post">
								<span class="login100-form-title">
								<img src="images/mpk.png" alt="Bangka Cendekia" style="width:90px;">
								<img src="images/osis.png" alt="Bangka Cendekia" style="width:80px;"> <br>
								Pemilihan Ketua dan Wakil OSIS 2020 <br> SMA N 2 RATAHAN
								</span>

								<div class="wrap-input100 validate-input">
									<input class="input100" type="text" name="nim" placeholder="Username..." autocomplete="off" required="required">
									<span class="focus-input100"></span>
									<span class="symbol-input100">
										<i class="fa fa-user" aria-hidden="true"></i>
									</span>
								</div>

								<div class="wrap-input100 validate-input">
									<input class="input100" type="password" name="kode_akses" placeholder="Password..." autocomplete="off" required="required">
									<span class="focus-input100"></span>
									<span class="symbol-input100">
										<i class="fa fa-lock" aria-hidden="true"></i>
									</span>
								</div>

								<div class="container-login100-form-btn">
									<button class="login100-form-btn" name="login" id="login">
										Masuk
									</button>
								</div>
								<div class="container-login100-form-btn">
									<button type="reset" class="login100-form-btn">
										Reset
									</button>
								</div>
								<br><br>
								<div class="text-center p-t-12">
									<span class="txt1">
									</span>
									<a class="txt2" href="https://www.youtube.com/channel/UCOAdMyFuPTcmi1TExyynO6w" target="_blank">
										<p>&copy; SMA N 2 RATAHAN <?php echo date('Y') ?></p>
									</a>
								</div>


							</form>
						</div>
					</div>
				</div>

				<script src="js/sweetalert.min.js"></script>
				<!--===============================================================================================-->	
				<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
				<!--===============================================================================================-->
				<script src="vendor/bootstrap/js/popper.js"></script>
				<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
				<!--===============================================================================================-->
				<script src="vendor/select2/select2.min.js"></script>
				<!--===============================================================================================-->
				<script src="vendor/tilt/tilt.jquery.min.js"></script>
				<script >
					$('.js-tilt').tilt({
						scale: 1.1
					})
				</script>
				<!--===============================================================================================-->
				<script src="js/main.js"></script>

			</body>
			</html>