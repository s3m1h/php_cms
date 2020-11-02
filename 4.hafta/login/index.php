<?php
	require_once "../sistem/ayar.php";
	
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
				
				$sql = "SELECT * FROM uyeler WHERE kull_adi='$dkullanici_adi' AND kull_sifre='$dsifre'";
				$sonuc = mysqli_query($baglan,$sql);
				
				$d_satir = mysqli_num_rows($sonuc);
				if($d_satir == 1){
					echo "<p style=' color:green;'align='left'> giriş başarılı";
					$_SESSION["kull_adi"] = $dkullanici_adi;
					
					header("location:yonetici.php");
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









