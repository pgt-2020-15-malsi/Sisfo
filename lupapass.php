
<?php $page='lupapass.php';
session_start();

include 'data/koneksi.php';


if($_SESSION['status']!=""){
  header("location:lupapass.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sisfo | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  

  <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700,900" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="data/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="data/assets/css/jquery-ui.css">
    <link rel="stylesheet" href="data/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="data/assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="data/assets/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="data/assets/css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="data/assets/css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="data/assets/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="data/assets/css/aos.css">

    <link rel="stylesheet" href="data/assets/css/style.css">


  <link rel="stylesheet" href="data/assets/vendor/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="data/assets/vendor/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="data/assets/vendor/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="data/assets/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="data/assets/vendor/iCheck/square/blue.css">

  <link rel="apple-touch-icon" sizes="76x76" href="data/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" sizes="96x96" href="data/assets/img/favicon.png"> 
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">



         
<div class="site-blocks-cover overlay" style="background-image: url(data/assets/img/hero_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">

    
      <div class="container" style="margin-left: 20%">
        
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-12" data-aos="fade-up" data-aos-delay="400">
                        
            <div class="row justify-content-center mb-4">
              <div class="col-md-8 text-center">
                
                <div class="login-box">
                  <div class="login-logo">

    <a href="#" style="color: white">Sisfo<b style="color:black">POLTEK</b>-GT</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
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
 
    $nama      = $_POST['nama'];
    $tempatlahir  = $_POST['tempatlahir'];
    $tanggallahir  = $_POST['tanggallahir'];
    $password_baru      = $_POST['password_baru'];
    $konfirmasi_password  = $_POST['konfirmasi_password'];
    
    //cek dahulu ke database dengan query SELECT
    //kondisi adalah WHERE (dimana) kolom password adalah $password_lama di encrypt m5
    //encrypt -> md5($password_lama)
    
    $cek      = $conn->query("SELECT nama,tempatlahir,tanggallahir FROM mahasiswa WHERE nama='$nama',tempatlahir='$tempatlahir',tanggallahir='$tanggallahir'");
  
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
            echo 'Gagal';
          }         
        }else{
          //kondisi jika password baru beda dengan konfirmasi password
          echo 'Konfirmasi password tidak cocok';
        }
      }else{
        //kondisi jika password baru yang dimasukkan kurang dari 5 karakter
        echo 'Minimal password baru adalah 7 karakter';
      }
    }
  }
  ?>
<h3 class="page-title">Lupa Password</h3>
  <table class="table table-striped">
    <tr>
      <td>Nama</td>
      <td><input type="text" class="form-control" name="nama"></td>
    </tr>
    <tr>
      <td>Tempat Lahir</td>
      <td><input type="text" class="form-control" name="tempatlahir"></td>
    </tr>
    <tr>
      <td>Tanggal Lahir</td>
      <td><input type="text" class="form-control" name="tanggallahir"></td>
    </tr>
    <tr>
        <td>Password Baru</td>
        <td><input type="password" name="password_baru" required name="password_baru"></td>
      </tr>
       <tr>
        <td>Konfirmasi Password</td>
        <td><input type="password" name="konfirmasi_password" required></td>
      </tr>
     <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="submit" value="Rubah"></td>
      <tr>
    </table>
    
  </div>
              </div>
            </div>
            <h1><span class="typed-words"></span></h1>

          </div>
        </div>
      </div>




</div>
  <!-- /.login-box-body -->
</div>
<div id="footer" align="center">
  <p style="color: black" class="copyright">&copy;Copyright | Politekik Gajah Tunggal - 2020</p> <!--buat nunjukkin nih punya siapa atau sp yg bikin.. wkwk-->
  
</div>
</div>  


<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="data/assets/vendor/jquery/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="data/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="data/assets/vendor/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>

 <script src="data/assets/js/jquery-3.3.1.min.js"></script>
  <script src="data/assets/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="data/assets/js/jquery-ui.js"></script>
  <script src="data/assets/js/popper.min.js"></script>
  <script src="data/assets/js/bootstrap.min.js"></script>
  <script src="data/assets/js/owl.carousel.min.js"></script>
  <script src="data/assets/js/jquery.stellar.min.js"></script>
  <script src="data/assets/js/jquery.countdown.min.js"></script>
  <script src="data/assets/js/bootstrap-datepicker.min.js"></script>
  <script src="data/assets/js/jquery.easing.1.3.js"></script>
  <script src="data/assets/js/aos.js"></script>
  <script src="data/assets/js/jquery.fancybox.min.js"></script>
  <script src="data/assets/js/jquery.sticky.js"></script>

  <script src="data/assets/js/typed.js"></script>
            <script>
            var typed = new Typed('.typed-words', {
            strings: ["Selamat Datang di Sisfo Poltek-GT","Silahkan Login Untuk Melanjutkan","Jangan Lupa Bahagia (^_^)"],
            typeSpeed: 80,
            backSpeed: 80,
            backDelay: 4000,
            startDelay: 1000,
            loop: true,
            showCursor: true
            });
            </script>

  <script src="data/assets/js/main.js"></script>

</body>
</html>
