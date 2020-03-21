<?php
session_start();

include 'data/koneksi.php';

$nim = $_POST['nim']; 
$password = sha1($_POST['password']);
//$nama = $_POST['nama'];

$sql 	= mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim = '$nim' AND password = '$password'");

//$sql = mysqli_query($conn,"select * from mahasiswa where nim='$nim' and password='$password'");
$cek=mysqli_num_rows($sql);
 


if($cek > 0){
$data = mysqli_fetch_assoc($sql);

	$_SESSION['nim'] = $nim;
	$_SESSION['nama'] = $data['nama'];
	$_SESSION['status'] = "sudah_login";
	$_SESSION['jeniskelamin'] = $data['jeniskelamin'];


	
	header("location:data");
}else{
	echo"<script>alert(' NIM atau PASSWORD salah'); window.location = 'index.php'</script>";
}



?>