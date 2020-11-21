<?php 
require_once "../sistem/ayar.php";

// Kullanici oturumu yoksa login olmalısınız mesajıjnı versin ve yönlendirsin
	if ($_SESSION["kull_adi"] ==""){ 
		echo "<font color='red'> <p> Login olmalısınız</font>";
		header("Refresh:3; url=index.php",true,303);
		
	
}// Uye yetkisi yazar veya okur ise Yetkiniz yok mesajını versin ve yönlendirsin
	else if($_SESSION['uye_yetki'] == 3 or $_SESSION['uye_yetki'] == 4){
		echo "<font color='red'> <p> Yetkiniz yok</font>";
		header("Refresh:3; url=yonetici.php",true,303);
	}
	else{
		
		?>
<html>
	<head>
	</head>

	<body>
		<a href="yonetici.php" align="right"> Geri Dön</a>
		
		<h1 align="center">  Sistemde bulunan üyeler</h1>
		
		<?php require_once "../sistem/ayar.php";
			
			$uyeler = mysqli_query($baglan,"SELECT * FROM uyeler");
			$d_sorgu = mysqli_affected_rows($baglan);	
			
		?>
		<div align="center" style="padding:2rem;"> 
			<table border="1px">
			<p> Sistemde <?php echo ''.$d_sorgu ?> kullanıcı vardır</p>
			<a href="adminkayit.php"><h4 align='center'>Kullanıcı Ekle<h4></a>
				<tr align="center">
					<th>Uye ID </th>
					<th> Kullanıcı Adı </th>
					<th> Uye Eposta </th>
					<th> Uye Durumu </th>
					<th> Uye Yetki </th>
					<th> Uye Zamanı </th>
					<th> İşlemler </th>
				</tr>
				<?php while($sorgu_array = mysqli_fetch_array($uyeler)){ ?>
	
				<tr align="center">
					<td><?php echo $sorgu_array["id"];?></td>
					<td><?php echo $sorgu_array["kull_adi"];?></td>
					<td><?php echo $sorgu_array["uye_mail"];?></td>
					
					<td>
					<?php //############# Uye durumu bilgisi
						if($sorgu_array["uye_durum"] == 1) { echo "<font color='green'> <b> Aktif</font>";} 
						else{echo "<font color='red'> <b> Aktif Değil</font>";}?>	
					</td>

					<td>
					<?php //############# Uye yetki bilgisi
						if($sorgu_array["uye_yetki"] == 1){ echo "<font> <b> Yönetici</font>";}
						else if($sorgu_array["uye_yetki"] == 2){ echo "<font> <b> Editör</font>";}
						else if($sorgu_array["uye_yetki"] == 3){ echo "<font> <b> Yazar</font>";}
						else if($sorgu_array["uye_yetki"] == 0){ echo "<font> <b> Kurucu</font>";}
						else { echo "<font color='green'> <b> Okur</font>";}
					?></td>
					
					<td><?php echo $sorgu_array["uye_tarih"];?></td>
					<td>
		
						<a href="uyeduzenle.php?uyeid=<?php echo $sorgu_array["id"];?>&uyeadi=<?php echo $sorgu_array["kull_adi"];?>"><img src="images/edit_30px.png"></img></a>
						<a href="uyesil.php?uyeid=<?php echo $sorgu_array["id"];?>&uyeadi=<?php echo $sorgu_array["kull_adi"];?>&uyeyetki=<?php echo $sorgu_array["uye_yetki"];?>"> <img src="images/trash_30px.png"></img></a>
	
					</td>
				</tr>
				
				
				<?php }?>
			</table>
			
		</div>
		
	</body>
</html>
<?php }?>




