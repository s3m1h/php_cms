<!DOCTYPE html>
<?php
	require_once "../sistem/ayar.php";
	
	
	//isset($_SESSION["kull_adi"]) --> kullanici adi boş mu anlamında 
	if($_SESSION["kull_adi"] != ""){ // session boş değilse anlamında
		// boş değilse oturum vardır
		header('location:/login/yonetici.php');
	}

		?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Yönetici| Giriş</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <!-- RECAPTCHA-->
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box" >
  <div class="login-logo">
    <a href="../../index2.html"><b class="display-1">Yönetici</b>SEM</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body" style="">
    <p class="login-box-msg">Oturumu başlatmak için giriş yapınız</p>
	<!-- POST #################-->
			<?php 
			
			if($_POST){
				$dkullanici_adi = $_POST["kullanici_adi"];
				$dsifre = md5($_POST["sifre"]);
				
				// RECAPTCHA 
				$response = $_POST["g-recaptcha-response"];
				$secret = "6LfE9O0ZAAAAABnjRkzUUQtqMXkZ5QSWJYCMg-m9";
				$remoteip = $_SERVER["REMOTE_ADDR"];
				$catcpha = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip");
				
				$result = json_decode($catcpha);
				if ($result -> success == 1){
					
					// üyeler tablosundan herşeyi çek ama posttan gelen kullanici adi ve şifre eşleşiyorsa çek
					$sql = "SELECT * FROM uyeler WHERE kull_adi='$dkullanici_adi' AND kull_sifre='$dsifre'";
					$sonuc = mysqli_query($baglan,$sql);
					
					$data_array = mysqli_fetch_array($sonuc); // verileri dizi olarak değiskene aktar
					
					$d_satir = mysqli_num_rows($sonuc);
					// buradaki 1 sayısı true anlamında 0 ise false yani veri yoktur  
					if($d_satir == 1){
					
						if($data_array['uye_durum'] == 1){
							echo "<p style=' color:green;'align='left'> giriş başarılı";
							$_SESSION["kull_adi"] = $data_array['kull_adi'];
							$_SESSION['login_zaman'] = time(); //time() fonksitonu bize şu anki zamanı verir
							$_SESSION["uye_id"] = $data_array['id'];
							$_SESSION["uye_durum"] = $data_array['uye_durum'];
							$_SESSION["uye_yetki"] = $data_array['uye_yetki'];

							header("location:yonetici.php");
						}
						else{
							echo "<br>kullanici adi ve şifreniz doğru fakat site 
							yöneticisi tarafından hesabınız onaylanmadı";
						}
					}
					else{
						echo "<p bgcolor = 'red' align='left'>giriş başarısız....";
					}
				}
				else{echo "Doğrulama başarısız oldu";}
			}
		?>
    <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
      <div class="form-group has-feedback">
        <input name= "kullanici_adi" type="text" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="sifre" type="password" class="form-control" placeholder="Password">
		
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
	  <div class="g-recaptcha" data-sitekey="6LfE9O0ZAAAAADCNHt-rLT8Y9nWVDLxJFDi4uxim"></div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Beni Hatırla
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
	  
    </form>
	
	
    <div class="social-auth-links text-center">
	
	<!--
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>-->
    </div> 
    <!-- /.social-auth-links -->

    <a href="#">Şifremi Unuttum</a><br>
    <a href="register.html" class="text-center">Kayit Ol</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
