<?php
	require_once "../sistem/ayar.php";
	
	
	//isset($_SESSION["kull_adi"]) --> kullanici adi boş mu anlamında 
	if($_SESSION["kull_adi"] != ""){ // session boş değilse anlamında
		// boş değilse oturum vardır
		header('location:/yonetici.php');
	}

	
	if ($baglan){
		echo "<br>";
		?>
		
		<p align= "right"> 
		<b>Veritabanı Bağlantısı:
		<img 
			width ="100px" 
			height ="50px" 
			src ="images/on.png">
		</img>
	<?php
	}else{
		echo "";
		?>
		
		<p align ="right"><b><u>Veri Tabanı baglantısı:</u><img width ="100px" height ="50px" src ="images/on.png"></img>
	<?php
	}
	
	###############################################  SITE DURUM IF BLOGU BAŞLANGIC
	if($satir["site_durum"] == "1"){
		echo "
				<p align='right'>
				<b> Site Durum: </u>
				<img 
					width = '100px'
					height ='50px'
					src ='images/on.png'>
				</img>";
				
		
		?>
		<html>
	<head>
		<title> <?php echo $satir['site_baslik']?></title>
		
		
		
		<meta name = "description" content="<?php $satir['site_aciklama'];?>">
		<meta name = "keywords" content="<?php $satir['site_anahtar'];?>">
		<meta name = "author" content = "semih acar">
		
		
	</head>
	<body>
	
		<?php 
			
			if($_POST){
				$dkullanici_adi = $_POST["kullanici_adi"];
				$dsifre = md5($_POST["sifre"]);
				
				// üyeler tablosundan herşeyi çek ama posttan gelen kullanici adi ve şifre eşleşiyorsa çek
				$sql = "SELECT * FROM uyeler WHERE kull_adi='$dkullanici_adi' AND kull_sifre='$dsifre'";
				$sonuc = mysqli_query($baglan,$sql);
				
				$data_array = mysqli_fetch_array($sonuc); // verileri dizi olarak değiskene aktar
				
				$d_satir = mysqli_num_rows($sonuc);
				// buradaki 1 sayısı true anlamında 0 ise false yani veri yoktur  
				if($d_satir == true){
				
					if($data_array['uye_durum'] == 1){
						echo "<p style=' color:green;'align='left'> giriş başarılı";
						$_SESSION["kull_adi"] = $data_array['kull_adi'];
						$_SESSION['login_zaman'] = time(); //time() fonksitonu bize şu anki zamanı verir
						$_SESSION["uye_id"] = $data_array['uye_id'];
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
	
		?>
<!-- 	###############################################  LOGIN SCREEN -->
			<div align="center">
				<div
				style=" 
					width:500px;
					background-color:#f8c291;
					border-radius: 50%;
					padding:7rem 1rem;
				">
					<form name = "giris" id = "giris" action="" method="post">
					<center> <h1> GİRİŞ </h1></center>
					
					<table align="center">
						<tr>
							<td><b>Kullanici Adi: </td>
							<td width="150px"> <input name="kullanici_adi" type="text"></td>
						</tr>
						<tr>
							<td><b> Sifre</td>
							<td width="150px"> <input name = "sifre" type="password"></td>
						</tr>
						<tr  align = "center">
							<td> <input 
								type="submit" 
								value="Giris Yap"
								colspan="2"
								width="40px"></input></td>
						</tr>
					</table>
					</form>
					<center> 
					<a href="kayit.php">Kayit Ol</a> &nbsp;&nbsp;
					<a href="kayit.php">Şifremi unuttum</a>
					
					</center>
					
					
				</div>

		</div>
	<!-- 	###############################################  END LOGIN SCREEN -->
	
	</body>

</html>

<!-- 	###############################################  SITE DURUM IF BLOGU BİTİŞ-->
	
<?php
	}
	else{
		echo "
				<p align='right'>
				<b> Site Durum: </u>
				<img 
					width = '100px'
					height ='50px'
					src ='images/off.png'>
				</img>";
	}

?>









