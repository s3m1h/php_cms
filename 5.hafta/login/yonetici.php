<?php 
require_once "../sistem/ayar.php";

if ($_SESSION["kull_adi"] ==""){
	echo "hayırdır emmi ?";
	header("location: index.php");
	
}else{
	if($_SESSION["kull_adi"] !=""){
		header("Refresh:40;",true); // 10 sn sonra sayfayı yenile
		if(10 < time() - $_SESSION['login_zaman']){
			session_destroy(); // oturumu sonlandırır
			header("location:index.php");
		}
		
	}
	
	
	

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
			else{
				echo "okur";
			}

		?>
		<p> <b> Uye durum	<?php echo $_SESSION["uye_durum"];?>
		
		
		
		<p> <b> Hoş Geldin	<?php echo $_SESSION["login_zaman"];?>
		
		<ul>
			<li> <a href= "uyeislemleri.php"> Üyeler</a></li>
			<li> <a href= "cikisyap.php"> Çıkış Yap</a></li>
		</ul>

	</body>
</html>

<?php } ?>

