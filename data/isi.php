<?php $page='dosen';
session_start();

include 'koneksi.php';


if($_SESSION['status']!="sudah_login"){
  header("location:dosen.php");
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
						<li><a href="index.php" class="active"><i class="lnr lnr-user"></i> <span>Profile</span></a></li>
						<li><a href="dosen.php" class=""><i class="lnr lnr-pencil"></i> <span>Evaluasi Dosen</span></a></li>
						
						<li>
							<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Info Nilai</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="collapse ">
								<ul class="nav">
									<li><a href="nilai.php" class=""><i class="lnr lnr-map"></i>Rekap Nilai</a></li>
									<li><a href="khs.php" class=""><i class="lnr lnr-bookmark"></i>KHS</a></li>
				
								</ul>
							</div>
							<li><a href="Konsultasi.php" class=""><i class="lnr lnr-location"></i> <span>Konsultasi</span></a></li>
						</li>
						<li><a href="poin.php" class=""><i class="lnr lnr-dice"></i> <span>Poin</span></a></li>
						<li><a href="tentang.php" class=""><i class="lnr lnr-question-circle"></i> <span>Tentang</span></a></li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->





		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						

<?php
//jika sudah mendapatkan parameter GET id dari URL
if(isset($_GET['id'])){
//membuat variabel $id untuk menyimpan id dari GET id di URL
$id = $_GET['id'];
//query ke database SELECT tabel mahasiswa berdasarkan id = $id
$select = mysqli_query($koneksi, "SELECT * FROM nilaiakademik WHERE
id='$id'") or die(mysqli_error($koneksi));
//jika hasil query = 0 maka muncul pesan error
if(mysqli_num_rows($select) == 0){
echo '<div class="alert alert-warning">ID tidak ada dalam
database.</div>';
exit();
//jika hasil query > 0
}else{
//membuat variabel $data dan menyimpan data row dari query
$data = mysqli_fetch_assoc($select);
}
}
?>

<?php
//jika tombol simpan di tekan/klik
if(isset($_POST['submit'])){
$nim = $_SESSION['nim'];
$dosen = $_POST['dosen'];
$namamk = $_POST['namamk'];
$kodemk = $_POST['kodemk'];
$a1 = $_POST['a1'];
$a2 = $_POST['a2'];
$a3 = $_POST['a3'];
$a4 = $_POST['a4'];
$a5 = $_POST['a5'];
$a6 = $_POST['a6'];
$a7 = $_POST['a7'];
$a8 = $_POST['a8'];
$a9 = $_POST['a9'];
$a10 = $_POST['a10'];
$a11 = $_POST['a11'];
$b1 = $_POST['b1'];
$b2 = $_POST['b2'];
$b3 = $_POST['b3'];
$b4 = $_POST['b4'];
$b5 = $_POST['b5'];
$b6 = $_POST['b6'];
$b7 = $_POST['b7'];
$b8 = $_POST['b8'];
$b9 = $_POST['b9'];
$c1 = $_POST['c1'];
$c2 = $_POST['c2'];
$c3 = $_POST['c3'];
$c4 = $_POST['c4'];
$d1 = $_POST['d1'];
$d2 = $_POST['d2'];
$d3 = $_POST['d3'];
$d4 = $_POST['d4'];
$d5 = $_POST['d5'];
$d6 = $_POST['d6'];
$yaw = mysqli_query($koneksi, "UPDATE nilaiakademik SET statusmk='Sudah Terisi' WHERE id='$id'") or die(mysqli_error($koneksi));
$sql = mysqli_query($koneksi, "INSERT INTO evaluasidosen (nama, mk, nim, a1, a2, a3, a4, a5, a6, a7, a8, a9, a10, a11, b1, b2, b3, b4, b5, b6, b7, b8, b9, c1, c2, c3, c4, d1, d2, d3, d4, d5, d6) values ('$nama','$namamk','$nim','$a1','$a2','$a3','$a4','$a5','$a6','$a7','$a8','$a9','$a10','$a11','$b1','$b2.,'$b3','$b4','$b5','$b6','$b7','$b8','$b9','$c1','$c2','$c3','$c4','$d1','$d2','$d3','$d4','$d5','$d6') ") or die(mysqli_error($koneksi));
if($sql){
echo '<script>alert("Berhasil menyimpan data.");
document.location="dosen.php";</script>';
}else{
echo '<div class="alert alert-warning">Gagal melakukan input
data.</div>';
}
}
?>


 <div class="w3-panel w3-grey w3-card-4 w3-round-large">
      <center><b><h2 style="font-size: 40px; font-family: serif; color: black; margin-bottom: 30px"><strong>Evaluasi Proses Pembelajaran</strong></h2></b></center>
  </div>
      <div class="container-fluid">
        <div class="alert alert-warning">
          

<form action="isi.php?id=<?php echo $id; ?>" method="post">
<div class="form-group row">
<label class="col-sm-2 col-form-label">Nama Dosen</label>
<div class="col-sm-10">
<input type="text" name="dosen" class="form-control"
size="4" value="<?php echo $data['dosen']; ?>" readonly required>
</div>
</div>
  
<div class="form-group row">
<label class="col-sm-2 col-form-label">Matakuliah</label>
<div class="col-sm-10">
<input type="text" name="namamk" class="form-control"
size="4" value="<?php echo $data['namamk']; ?>" readonly required>
</div>
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label">Kode Matakuliah</label>
<div class="col-sm-10">
<input type="text" name="kodemk" class="form-control"
size="4" value="<?php echo $data['kodemk']; ?>" readonly required>
</div>
</div>


  <div class="alert alert-warning" role="alert">

<table class="table table-striped">

<tr>
    <td>1.</td>    
    <td>Dosen mengajar sesuai dengan jadwal kuliah yang telah ditentukan</td>
    <td>
<select name="a1" required>
<option value="">--</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select>
    </td>
</tr>

<tr>
    <td>2.</td>    
    <td>Penyajian materi kuliah sistematis dan mudah dipahami</td>
    <td>
<select name="a2" required>
<option value="">--</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select>
    </td>
</tr>

<tr>
    <td>3.</td>    
    <td>Tujuan matakuliah diberikan dengan jelas</td>
    <td>
<select name="a3" required>
<option value="">--</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select>
    </td>
</tr>

<tr>
    <td>4.</td>    
    <td>Materi perkuliahan yang disampaikan sesuai SAP</td>
    <td>
<select name="a4" required>
<option value="">--</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select>
    </td>
</tr>

<tr>
    <td>5.</td>    
    <td>Dosen memberikan contoh yang jelas dan relevan dengan materi perkuliahan</td>
    <td>
<select name="a5" required>
<option value="">--</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select>
    </td>
</tr>

<tr>
    <td>6.</td>    
    <td>Dosen memberikan kesempatan dan memotivasi mahasiswa untuk bertanya</td>
    <td>
<select name="a6" required>
<option value="">--</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select>
    </td>
</tr>

<tr>
    <td>7.</td>    
    <td>Dosen memberikan jawaban dengan jelas pada pertanyaan mahasiswa</td>
    <td>
<select name="a7" required>
<option value="">--</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select>
    </td>
</tr>

<tr>
    <td>8.</td>    
    <td>Dosen memberitahukan buku-buku referensi yang digunakan</td>
    <td>
<select name="a8" required>
<option value="">--</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select>
    </td>
</tr>

<tr>
    <td>9.</td>    
    <td>Dosen memberikan motivasi kepada mahasiswa untuk membaca buku referensi</td>
    <td>
<select name="a9" required>
<option value="">--</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select>
    </td>
</tr>

<tr>
    <td>10.</td>    
    <td>Dosen berusaha memacu prestasi mahasiswa</td>
    <td>
<select name="a10" required>
<option value="">--</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select>
    </td>
</tr>

<tr>
    <td>11.</td>    
    <td>Alat bantu yang digunakan relevan dengan kebutuhan</td>
    <td>
<select name="a11" required>
<option value="">--</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select>
    </td>
</tr>

</table>
</div>

<div class="alert alert-warning" role="alert">
<table class="table table-striped">

<tr>
    <td>1.</td>    
    <td>Dosen berbicara dengan jelas</td>
    <td>
<select name="b1" required>
<option value="">--</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select>
    </td>
</tr>

<tr>
    <td>2.</td>    
    <td>Dosen selalu hadir tepat waktu</td>
    <td>
<select name="b2" required>
<option value="">--</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select>
    </td>
</tr>

<tr>
    <td>3.</td>    
    <td>Dosen selalu mengikuti perkembangan baru dalam bidangnya</td>
    <td>
<select name="b3" required>
<option value="">--</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select>
    </td>
</tr>

<tr>
    <td>4.</td>    
    <td>Dosen menjelaskan materi perkuliahan secara rinci / detail</td>
    <td>
<select name="b4" required>
<option value="">--</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select>
    </td>
</tr>

<tr>
    <td>5.</td>    
    <td>Penjelasan materi perkuliahan mudah dipahami</td>
    <td>
<select name="b5" required>
<option value="">--</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select>
    </td>
</tr>

<tr>
    <td>6.</td>    
    <td>Dosen terbuka terhadap masukan yang bersifat membangun</td>
    <td>
<select name="b6" required>
<option value="">--</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select>
    </td>
</tr>

<tr>
    <td>7.</td>    
    <td>Dosen berpakaian dengan rapih dan sopan</td>
    <td>
<select name="b7" required>
<option value="">--</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select>
    </td>
</tr>

<tr>
    <td>8.</td>    
    <td>Dosen bersedia membimbing mahasiswa didalam maupun diluar kelas</td>
    <td>
<select name="b8" required>
<option value="">--</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select>
    </td>
</tr>

<tr>
    <td>9.</td>    
    <td>Dosen tidak sering menggantikan dan merubah jadwal kuliahnya</td>
    <td>
<select name="b9" required>
<option value="">--</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select>
    </td>
</tr>

</table>
</div>

<div class="alert alert-warning" role="alert">
<table class="table table-striped">

<tr>
    <td>1.</td>    
    <td>Dosen memberikan tugas</td>
    <td>
<select name="c1" required>
<option value="">--</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select>
    </td>
</tr>

<tr>
    <td>2.</td>    
    <td>Hasil tugas dibahas kembali / diberi umpan balik</td>
    <td>
<select name="c2" required>
<option value="">--</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select>
    </td>
</tr>

<tr>
    <td>3.</td>    
    <td>Tugas bermanfaat guna memperdalam materi kuliah</td>
    <td>
<select name="c3" required>
<option value="">--</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select>
    </td>
</tr>

<tr>
    <td>4.</td>    
    <td>Soal ujian sesuai dengan materi kuliah</td>
    <td>
<select name="c4" required>
<option value="">--</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select>
    </td>
</tr>

</table>
</div>

<div class="alert alert-warning" role="alert">
<table class="table table-striped">

<tr>
    <td>1.</td>    
    <td>Buku-buku di perpustakaan menunjang proses belajar mengajar</td>
    <td>
<select name="d1" required>
<option value="">--</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select>
    </td>
</tr>

<tr>
    <td>2.</td>    
    <td>Sarana yang tersedia di dalam ruang kelas cukup memadai</td>
    <td>
<select name="d2" required>
<option value="">--</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select>
    </td>
</tr>

<tr>
    <td>3.</td>    
    <td>Laboratorium atau sarana penunjang mata kuliah terkait</td>
    <td>
<select name="d3" required>
<option value="">--</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select>
    </td>
</tr>

<tr>
    <td>4.</td>    
    <td>Suasana belajar cukup menunjang dan kondusif</td>
    <td>
<select name="d4" required>
<option value="">--</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select>
    </td>
</tr>

<tr>
    <td>5.</td>    
    <td>Fasilitas akses ke internet sangat membantu proses belajar-mengajar</td>
    <td>
<select name="d5" required>
<option value="">--</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select>
    </td>
</tr>

<tr>
    <td>6.</td>    
    <td>Hasil ujian segera diumumkan</td>
    <td>
<select name="d6" required>
<option value="">--</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select>
    </td>
</tr>

</table>
</div>
<div class="text-right"><button type="submit" name="submit" class="btn btn-success"><i class="fa fa-check-circle"></i> Simpan</button></div><br>

</form>
							
							<!-- END RECENT PURCHASES -->
						</div>
							
							<!-- END MULTI CHARTS -->
						</div>
			
							</div>
							<!-- END TODO LIST -->
						</div>			
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy;copyright 2020 | Malsi | Teguh | Surya | Politek Gajah Tunggal</p>
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
