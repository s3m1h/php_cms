<?php 
require_once "../sistem/ayar.php";

if ($_SESSION["kull_adi"] ==""){
	echo "hayırdır emmi ?";
	header("location: index.php");
	
}else{
	if($_SESSION["kull_adi"] !=""){
		header("Refresh:40;",true); // 10 sn sonra sayfayı yenile
		if(6000 < time() - $_SESSION['login_zaman']){
			session_destroy(); // oturumu sonlandırır
			header("location:index.php");
		}
		
	}
$kadi = $_SESSION['kull_adi'];
?>


<html>

	<body>
		<h1> Yönetim sayfasi </h1>
		<p> <b> Hoş Geldin	<?php echo $_SESSION["kull_adi"];?>
		<p> <b> Hoş Geldin	<?php echo $_SESSION["login_zaman"];?>
		<p> <b> Uye Yetki	<?php echo $_SESSION["uye_yetki"]; ?>
		<?php
			if($_SESSION['uye_yetki'] == 1){
				
				echo "site yöneticisi";
			}else if($_SESSION['uye_yetki'] == 2){
				echo "editör";
			}else if($_SESSION['uye_yetki'] == 3){
				echo "yazar";
			}
			else if($_SESSION['uye_yetki'] == 0){
				echo "Kurucu";
			}
			else{
				echo "okur";
			}

		?>
		<p> <b> Uye durum	<?php echo $_SESSION["uye_durum"];?>
		<p> <b> Hoş Geldin	<?php echo $_SESSION["login_zaman"];?>
		
		<ul>
		<li> <a href= "yonetici.php?do=anasayfa"> anasayfa</a></li>
		<?php if($_SESSION['uye_yetki'] ==1 or $_SESSION['uye_yetki']==2 or $_SESSION['uye_yetki'] ==0){ ?>
			<li> <a href= "yonetici.php?do=uyeislemleri"> Üyeler</a></li>
		<?php } ?>
		<?php if($_SESSION['uye_yetki'] ==1 or $_SESSION['uye_yetki'] ==0 ){?>
			<li> <a href= "yonetici.php?do=sistemkayitlari"> Sistem Kayitlari</a></li>
		<?php }?>
		<?php if($_SESSION['uye_yetki'] ==1 or $_SESSION['uye_yetki'] ==0 ){?>
			<li> <a href= "yonetici.php?do=siteayarlari"> Site Ayarları</a></li>
		<?php }?>
			<li> <a href= "yonetici.php?do=cikisyap"> Çıkış Yap</a></li>
		</ul>
		<!-- SAYFA ÇEKME -->
		<?php
			$do = $_GET['do'];
			// burada yazdıgımız 'file_exists' içine yazılan dosyayı arıyor varsa if çalışıyor 
			if(file_exists("{$do}.php")){
				require_once("{$do}.php");
			}else{
				require_once "anasayfa.php";
			}
		?>
	</body>
</html>

<?php } ?>

