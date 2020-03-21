<?php $page='gantipass';
session_start();

include 'koneksi.php';


if($_SESSION['status']!="sudah_login"){
  header("location:gantipass.php");
}
?>

<!doctype html>
<html lang="en">

<head>
	<title>Home | Poltek-GT</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="assets/vendor/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
</head>

<body>
	
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="index.html"><img src="assets/img/logo-dark.png" alt="Klorofil Logo" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<form class="navbar-form navbar-left">
					<center><div>
						<h4 style="font-size: 20"> |<==== \(^_^)/ ====> | 8 Budi Poltek-GT : <span class="typed-words"></span></h4>
					</div></center>
				</form>
				<div class="navbar-btn navbar-btn-right">
					<a class="btn btn-danger" href="logout.php"><i class="lnr lnr-exit"></i> <span>Logout_</span><i class="fa fa-rocket"></i></a>
				</div>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						
						
						<li class="dropdown">
						<!--Kodingn NIM-->

							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="assets/img/avatar5.png" class="img-circle" alt="Avatar"> <span><?php echo $_SESSION['nama']?></span> </a>
							
						</li>
						<!-- <li>
							<a class="update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>
						</li> -->
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="home.php" class="active"><i class="lnr lnr-user"></i> <span>Profile</span></a></li>
						<li><a href="dosen.php" class=""><i class="lnr lnr-pencil"></i> <span>Evaluasi Dosen</span></a></li>
						
						<li>
							<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Info Nilai</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="collapse ">
								<ul class="nav">
									<li><a href="nilai.php" class=""><i class="lnr lnr-map"></i>Rekap Nilai</a></li>
									<li><a href="khs.php" class=""><i class="lnr lnr-bookmark"></i>KHS</a></li>
				
								</ul>
							</div>
						</li>
						<li><a href="Konsultasi.php" class=""><i class="lnr lnr-location"></i> <span>Konsultasi</span></a></li>
						<li><a href="poin.php" class=""><i class="lnr lnr-dice"></i> <span>Poin</span></a></li>
						<li><a href="tentang.php" class=""><i class="lnr lnr-question-circle"></i> <span>Tentang</span></a></li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main" >
			<!-- MAIN CONTENT -->
			<div class="main-content"  >
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						
<!-- PROFILE DETAIL -->
								<div class="profile-detail">
									<div class="profile-info">
										<h4 class="heading" style="margin-bottom: 20px">Ganti Password</h4>
										<div class="panel-body">

        <?php
  //mengatasi error notice dan warning
  //error ini biasa muncul jika dijalankan di localhost, jika online tidak ada masalah
  error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    $conn = new mysqli("localhost", "root", "", "sisfo");
  if ($conn->connect_errno) {
    echo die("Failed to connect to MySQL: " . $conn->connect_error);
  }
  
  //proses jika tombol rubah di klik
  if($_POST['submit']){
    //membuat variabel untuk menyimpan data inputan yang di isikan di form
    $password_lama      = $_POST['password_lama'];
    $password_baru      = $_POST['password_baru'];
    $konfirmasi_password  = $_POST['konfirmasi_password'];
    
    //cek dahulu ke database dengan query SELECT
    //kondisi adalah WHERE (dimana) kolom password adalah $password_lama di encrypt m5
    //encrypt -> md5($password_lama)
    $password_lama  = sha1($password_lama);
    $cek      = $conn->query("SELECT password FROM mahasiswa WHERE password='$password_lama'");
  
    if($cek->num_rows){
      //kondisi ini jika password lama yang dimasukkan sama dengan yang ada di database
      //membuat kondisi minimal password adalah 5 karakter
      if(strlen($password_baru) >= 7){
        //jika password baru sudah 5 atau lebih, maka lanjut ke bawah
        //membuat kondisi jika password baru harus sama dengan konfirmasi password
        if($password_baru == $konfirmasi_password){
          //jika semua kondisi sudah benar, maka melakukan update kedatabase
          //query UPDATE SET password = encrypt md5 password_baru
          //kondisi WHERE id user = session id pada saat login, maka yang di ubah hanya user dengan id tersebut
          $password_baru  = sha1($password_baru);
          $nim    = $_SESSION['nim']; //ini dari session saat login
          
          $update     = $conn->query("UPDATE mahasiswa SET password='$password_baru' WHERE nim='$nim'");
          if($update){
            //kondisi jika proses query UPDATE berhasil
            echo 'Password berhasil di rubah';
          }else{
            //kondisi jika proses query gagal
            echo 'Gagal merubah password';
          }         
        }else{
          //kondisi jika password baru beda dengan konfirmasi password
          echo 'Konfirmasi password tidak cocok';
        }
      }else{
        //kondisi jika password baru yang dimasukkan kurang dari 5 karakter
        echo 'Minimal password baru adalah 7 karakter';
      }
    }else{
      //kondisi jika password lama tidak cocok dengan data yang ada di database
      echo 'Password lama tidak cocok';
    }
  }
  ?>
  <form method="post" action="">
    <table>
      <tr>
        <td>Password Lama</td>
        <td>:</td>
        <td><input type="password" name="password_lama" required></td>
      </tr>
      <tr>
        <td>Password Baru</td>
        <td>:</td>
        <td><input type="password" name="password_baru" required></td>
      </tr>
      <tr>
        <td>Konfirmasi Password</td>
        <td>:</td>
        <td><input type="password" name="konfirmasi_password" required></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td></td>
        <td><input type="submit" name="submit" value="Rubah"></td>
      </tr>
    </table>
  </form>
  </div>
 

											
										
									</div>
							
								</div>						



					</div>
					<!-- END OVERVIEW -->
					</div>
					
					</div>

							<!-- END TODO LIST -->
						</div>
						
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy;copyright 2020 | Politek Gajah Tunggal</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>

	<script src="assets/js/typed.js"></script>
            <script>
            var typed = new Typed('.typed-words', {
            strings: [" Jujur"," Disiplin"," Bertanggung Jawab"," Kerja Sama"," Visioner"," Adil"," Peduli"," Tawakal"],
            typeSpeed: 80,
            backSpeed: 80,
            backDelay: 3000,
            startDelay: 1000,
            loop: true,
            showCursor: true
            });
            </script>

  <script src="assets/js/main.js"></script>
	
</body>

</html>
