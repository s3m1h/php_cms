<?php 

if($_SESSION['uye_yetki'] == 1 or $_SESSION['uye_yetki'] == 2){
	
	$sql = "SELECT * FROM ayarlar";
	$sql_result = mysqli_query($baglan, $sql);
	$sitegelen = mysqli_fetch_array($sql_result);
	
	if($_POST){
		
		$site_baslik = $_POST["site_baslik"];
		$site_anahtar_kelimeler = $_POST["site_anahtar_kelimeler"];
		$site_aciklama = $_POST["site_aciklama"];
		$site_durum = $_POST["site_durum"];
		$site_tema = $_POST["site_tema"];
		$site_iletisim = $_POST["site_iletisim"];
		$site_email = $_POST["site_email"];
		$site_facebook = $_POST["site_facebook"];
		$site_twitter = $_POST["site_twitter"];
		$site_linkedin = $_POST["site_linkedin"];
		
		$sql2 = "
		UPDATE ayarlar SET 
		site_baslik='$site_baslik',
		site_anahtarkelimeler='$site_anahtar_kelimeler',
		site_aciklama='$site_aciklama',
		site_durum='$site_durum',
		site_tema='$site_tema',
		site_iletisimno='$site_iletisim',
		site_eposta='$site_iletisim',
		site_facebook='$site_facebook',
		site_twitter='$site_twitter',
		site_linkedin='$site_linkedin'
		";
		$sql2_update = mysqli_query($baglan, $sql2);
		
		if($sql2_update){ 
						$aciklama = "site ayarları güncellendi";
						$yapilanislem = "kayıt güncelleme";
						$sistemkayitquery = "
									INSERT INTO ayarlar SET 
									aciklama='$aciklama',
									yapilanislem='$yapilanislem',
									yapan='$kadi'
									";
									$sistemkayit = mysqli_query($baglan,$sistemkayitquery);

						echo "<font color='green'> Başarılı bir şekilde güncellendi</font>";
						header('Refresh:3;url = http://localhost/login/yonetici.php?do=siteayarlari',true);
					}
					else{echo "<font color='red'>Güncelleme Başarısız...</font>";}
	}
	
?>


<table border="1px" align="center" >
	<form action= "" method="POST">
		<tr>
			<td ><label>Site Başlığı</label></td>
			<td width="70%" ><label><input type="text" name="site_baslik" value="<?php echo $sitegelen["site_baslik"];?>"></input></label></td>
			
		</tr>
		<tr>
			<td><label>Site Anahtar kelimeler</label></td>
			<td><label><input type="text" name="site_anahtar_kelimeler" value="<?php echo $sitegelen["site_anahtarkelimeler"];?>"></input></label></td>
			
		</tr>
		<tr>
			<td><label>Site Açıklama</label></td>
			<td><label><input type="text" name="site_aciklama" value="<?php echo $sitegelen["site_aciklama"];?>"></input></label></td>
			
		</tr>
		<tr>
			<td><label>Site Durum</label></td>
			<td>
				<select name="site_durum">
					<option value="0" <?php if($sitegelen["site_durum"] ==0)echo "selected"?>>Kapalı</option>
					<option value ="1" <?php if($sitegelen["site_durum"] ==1)echo "selected"?>>Açık</option>
				</select>
			</td>
			
		</tr>
		<tr>
			<td><label>Site Tema</label></td>
			<td>
				<select name="site_tema">
					<option value="0" <?php if($sitegelen["site_durum"] =="0")echo "selected"?>>Default</option>
					<option value ="1">mavi</option>
				</select>
			</td>
			
		</tr>
		<tr>
			<td><label>Site iletisim No:</label></td>
			<td><label><input type="text" name="site_iletisim" value="<?php echo $sitegelen["site_iletisimno"];?>"></input></label></td>
			
		</tr>
		<tr>
			<td><label>Site Email</label></td>
			<td><label><input type="text" name="site_email" value="<?php echo $sitegelen["site_eposta"];?>"></input></label></td>
			
		</tr>
		<tr>
			<td><label>Site Facebook Adresi</label></td>
			<td><label><input type="text" name="site_facebook" value="<?php echo $sitegelen["site_facebook"];?>"></input></label></td>
			
		</tr>
		<tr>
			<td><label>Site Twitter Adresi</label></td>
			<td><label><input type="text" name="site_twitter" value="<?php echo $sitegelen["site_twitter"];?>"></input></label></td>
			
		</tr>
		<tr>
			<td><label>Site Linkedin Adresi</label></td>
			<td><label><input type="text" name="site_linkedin" value="<?php echo $sitegelen["site_linkedin"];?>"></input></label></td>
			
		</tr>
		<tr>
			<td colspan="2"><input style= "width:100%;" type="submit" name="site_linkedin" value="Güncelle"></input></td>
			
			
		</tr>
	</form>
</table>


<?php
}else{
	echo "bu sayfada işlem yapmaya yetkiniz yok";
	header("Refresh:3; url=yonetici.php",true,303);
} ?>