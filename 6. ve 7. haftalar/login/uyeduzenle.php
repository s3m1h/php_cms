<?php  require_once "../sistem/ayar.php";
	$gelenid = $_GET["uyeid"];
	$gelen = $_GET["uyeid"];

	####### ÖNEMLİ ######### burada oturum(session) yönetici veya editörün ise if koşulunu çalıştır
	if($_SESSION["uye_yetki"] < 3){
		
		$editquery = "SELECT * FROM uyeler where id=$gelenid";
		$editquery2 = mysqli_query($baglan,$editquery);
		$queryrow= mysqli_fetch_array($editquery2);
		
		##hangi durumlarda hesap düzenlenemez?
		#  	bir yönetici başka bir yöneticiyi düzenleyemez
		#  	bir yönetici kurucuyu düzenleyemez 
		# 	yönetici kendiniz düzenleyebilmeli
		# 	kurucu kendini düzenleyebilmeli
		if($_SESSION["uye_id"] != $queryrow['id'] and $_SESSION["uye_yetki"] >= $queryrow['uye_yetki']){
			#if($_SESSION["uye_yetki"] >= $queryrow['uye_yetki']){
				
					echo "<font color='red'>Bu hesap değiştirilemez...Üye işlemlerine tekrar yönlendiriliyorsunuz</font>";
					header('Refresh:3;url = http://localhost/login/uyeislemleri.php',true);
		}
		else{
				
			if($_POST){
				$kullanici_adi_form = $_POST['kullanici_adi'];
				$sifre_form = $_POST['sifre'];
				$uye_mail_form = $_POST['uye_mail'];
				$uye_durum_form = $_POST['uye_durum'];
				$uye_yetki_form = $_POST['uye_yetki'];
				
				
				
					######## formda şifre boş geçilmiş ise veritabanındaki şifre aynı kalması için
					######## veritabanındaki şifreyi tekrar değişkene atadık
					if($sifre_form == ""){
						$sifre_form2 = $queryrow['kull_sifre'];
					}
					######## boş geçilmemiş ise formdan gelen veriyi atadık
					else{
						$sifre_form2 = md5($sifre_form);
					}
					$updatesql = "
						UPDATE uyeler SET
						kull_adi = '$kullanici_adi_form',
						kull_sifre = '$sifre_form2',
						uye_mail = '$uye_mail_form',
						uye_durum = '$uye_durum_form',
						uye_yetki = '$uye_yetki_form'
						WHERE id='$gelenid'
						";
					$update_query = mysqli_query($baglan,$updatesql);

					if($update_query){ 
						$aciklama = $_SESSION['kull_adi']." adlı kullanıcının kaydı güncellendi";
						$kadi = $_SESSION['kull_adi'];
						$yapilanislem = "kayıt güncelleme";
						$sistemkayitquery = "
									INSERT INTO sistemkayitlari SET 
									aciklama='$aciklama',
									yapilanislem='$yapilanislem',
									yapan='$kadi'
									";
									$sistemkayit = mysqli_query($baglan,$sistemkayitquery);

						echo "<font color='green'> Başarılı bir şekilde güncellendi</font>";
						header('Refresh:3;url = http://localhost/login/uyeislemleri.php',true);
					}
					else{echo "<font color='red'>Güncelleme Başarısız...</font>";}
			}	
?>
<html>
	<body>
	<div width="100%" align="center">
		<div style="
			font-size:20px;
			width:500px;
			height:500px;
			padding:5rem;
			
			">
		<form method="POST">
			<h1 style="font-size:20px; background: #20bf6b; border-radius:50%; padding:1.5rem 0rem;">ÜYE DÜZENLEME SAYFASI</h1>
			<table>
				<tr>
					<td> KULLANICI ADI:: </td>
					<td><input value=<?php echo $queryrow["kull_adi"]; ?> text="text" name="kullanici_adi"></input></td>
				</tr>
				<tr>
					<td> SIFRE:: </td>
					<td><input text="text" name="sifre"></input></td>
				</tr>
				<tr>
					<td> E-MAİL:: </td>
					<td><input value=<?php echo $queryrow["uye_mail"]; ?> text="text" name="uye_mail"></input></td>
				</tr>
				<tr>
					<td> ÜYE DURUMU:: </td>
					<td>
						<select name= "uye_durum">
							<option value="1" <?php if($queryrow['uye_durum'] ==1){echo 'selected';} ?>> AKTİF</option>
							<option value="0" <?php if($queryrow['uye_durum'] ==0){echo 'selected';} ?>> AKTİF DEĞİL</option>
						</select>
					</td>
				</tr>
				<tr>
					<td> ÜYE YETKİ:: </td>
					<td>
						<select name= "uye_yetki">
							<option value="0" <?php if($queryrow['uye_yetki'] ==0){echo 'selected';} ?>> Kurucu</option>
							<option value="1" <?php if($queryrow['uye_yetki'] ==1){echo 'selected';} ?>> Site Yöneticisi</option>
							<option value="2" <?php if($queryrow['uye_yetki'] ==2){echo 'selected';} ?>> Editör</option>
							<option value="3" <?php if($queryrow['uye_yetki'] ==3){echo 'selected';} ?>> Yazar</option>
							<option value="4" <?php if($queryrow['uye_yetki'] ==4){echo 'selected';} ?>> Okur</option>
							
						</select>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<input style = "
							cursor:hand;
							width:100%;
							padding: .5rem 3.7rem; 
							border:0px;
							background: #20bf6b;
							margin-bottom:.2rem;
							"
							type="submit" 
							value="Düzenle"></input>
							<a href="http://localhost/login/uyeislemleri.php">
							<input style = "
							cursor:hand;
							width:100%;
							padding: .5rem 3.7rem; 
							color:white;
							border:0px;
							background: crimson;
							" 
							type="button";
							value="Vazgeç"></input></a>
					</td>
					
				</tr>
				
			</table>
		
		</form>
		</div>
	<div>
		
	
	</body>
</html>
		<?php }}?>
