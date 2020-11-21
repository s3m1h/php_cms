<?php
require_once "../sistem/ayar.php";

if( $_SESSION['uye_yetki'] == 1 or $_SESSION['uye_yetki']==2 or $_SESSION['uye_yetki']==0){
	
	$uyeid = $_GET['uyeid'];
	$kull_adi = $_GET['uyeadi'];
	$uyeyetki = $_GET['uyeyetki'];
	
	if($_SESSION['uye_yetki'] >=$uyeyetki){
		echo"silemez";
	}else{

		$deleteuser = "DELETE FROM uyeler WHERE id='$uyeid'";
		$deletequery = mysqli_query($baglan, $deleteuser);
		if ($deletequery){
			$aciklama = $kull_adi." adlı kullanıcının kaydı silindi";
			$kadi = $_SESSION['kull_adi'];
			$yapilanislem = "kayıt silindi";
			$sistemkayitquery = "
										INSERT INTO sistemkayitlari SET 
										aciklama='$aciklama',
										yapilanislem='$yapilanislem',
										yapan='$kadi'
										";
										$sistemkayit = mysqli_query($baglan,$sistemkayitquery);
			
			
			echo "<font color= 'green'><b>başarılı bir şekilde silindi</b></font>";
			header('Refresh:3,url="http://localhost/login/uyeislemleri.php"',303);
		}else{	
			echo "<font color= 'green'><b>Hay aksi...bir sorun oluştu.Tekrar deneyiniz</b></font>";
			header('Refresh:2,url="http://localhost/login/uyeislemleri.php"',303);
		}
?>
<html>
	<body>
	</body>
</html>

<?php
	}
}else{
	echo "<font color= 'red'><b>bu sayfada işlem yapmaya yetkiniz yok</b></font>";
}
?>	
