<?php 

$koneksi = mysqli_connect("localhost","root","icb33674","pilketos");

if (mysqli_connect_error()){
	echo "koneksi database gagal" .mysqli_connect_error();
}

?>